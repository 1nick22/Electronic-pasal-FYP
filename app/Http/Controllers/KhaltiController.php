<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;

class KhaltiController extends Controller
{
    /**
     * Initiate payment via Khalti.
     */
    public function initiate(Request $request)
    {
        $request->validate([
            'order_id' => 'required|exists:orders,id'
        ]);

        $order = Order::findOrFail($request->order_id);

        // Khalti expects amount in paisa (100 paisa = 1 Rupee)
        $amountInPaisa = $order->total_price * 100;

        $response = Http::withHeaders([
            'Authorization' => 'Key ' . env('KHALTI_SECRET_KEY'),
            'Content-Type' => 'application/json',
        ])->post(env('KHALTI_BASE_URL') . 'epayment/initiate/', [
            'return_url' => route('khalti.success'),
            'website_url' => env('APP_URL', 'http://127.0.0.1:8000'),
            'amount' => (int) $amountInPaisa,
            'purchase_order_id' => (string) $order->id,
            'purchase_order_name' => 'Order #' . $order->id,
            'customer_info' => [
                'name' => $order->user->name,
                'email' => $order->user->email,
            ]
        ]);

        if ($response->successful()) {
            $data = $response->json();
            return redirect($data['payment_url']);
        }

        Log::error('Khalti Initiation Failed', [
            'order_id' => $order->id,
            'response' => $response->body()
        ]);

        return redirect()->back()->with('error', 'Failed to initiate Khalti payment. Please try again.');
    }

    /**
     * Handle payment success callback.
     */
    public function success(Request $request)
    {
        $pidx = $request->query('pidx');
        $orderId = $request->query('purchase_order_id');

        if (!$pidx) {
            return redirect()->route('orders.index')->with('error', 'Payment verification failed: No pidx received.');
        }

        // Verify payment status with Khalti lookup
        $response = Http::withHeaders([
            'Authorization' => 'Key ' . env('KHALTI_SECRET_KEY'),
            'Content-Type' => 'application/json',
        ])->post(env('KHALTI_BASE_URL') . 'epayment/lookup/', [
            'pidx' => $pidx,
        ]);

        if ($response->successful()) {
            $data = $response->json();

            if ($data['status'] === 'Completed') {
                $order = Order::findOrFail($orderId);
                $order->status = 'paid';
                $order->save();

                return redirect()->route('orders.index')->with('success', 'Payment successful! Order #' . $orderId . ' has been paid.');
            }
        }

        Log::error('Khalti Verification Failed', [
            'pidx' => $pidx,
            'response' => $response->body()
        ]);

        return redirect()->route('orders.index')->with('error', 'Payment verification failed. If money was deducted, please contact support.');
    }

    /**
     * Handle payment failure callback.
     */
    public function failure()
    {
        return redirect()->route('orders.index')->with('error', 'Payment was cancelled or failed.');
    }
}
