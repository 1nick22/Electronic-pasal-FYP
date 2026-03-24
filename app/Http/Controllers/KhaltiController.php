<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;
use App\Models\Order;
use App\Models\Payment;

class KhaltiController extends Controller
{
    private function getSecretKey()
    {
        return env('KHALTI_SANDBOX_SECRET_KEY');
    }

    private function getBaseUrl()
    {
        return env('KHALTI_BASE_URL', 'https://a.khalti.com/api/v2/');
    }

    public function initiate(Request $request)
    {
        $order = Order::findOrFail($request->order_id);

        $response = Http::withHeaders([
            'Authorization' => 'Key ' . $this->getSecretKey(),
            'Content-Type' => 'application/json',
        ])->post($this->getBaseUrl() . 'epayment/initiate/', [
            "return_url"           => route('khalti.success'),
            "website_url"          => url('/'),
            "amount"               => $order->total_price * 100, // paisa
            "purchase_order_id"    => (string) $order->id,
            "purchase_order_name"  => "ElectronicPasal Order #" . $order->id,
        ]);

        $data = $response->json();

        if ($response->successful() && isset($data['payment_url'])) {
            // Save a pending Payment record before redirecting to Khalti
            Payment::create([
                'user_id'             => $order->user_id,
                'order_id'            => $order->id,
                'pidx'                => $data['pidx'],
                'amount'              => $order->total_price,
                'purchase_order_name' => 'ElectronicPasal Order #' . $order->id,
                'status'              => 'pending',
            ]);

            return redirect($data['payment_url']);
        }

        Log::error('Khalti Initiation Error', ['data' => $data]);
        return back()->with('error', $data['detail'] ?? 'Khalti initiation failed.');
    }

    public function success(Request $request)
    {
        $pidx    = $request->query('pidx');
        $orderId = $request->query('purchase_order_id');

        $response = Http::withHeaders([
            'Authorization' => 'Key ' . $this->getSecretKey(),
            'Content-Type'  => 'application/json',
        ])->post($this->getBaseUrl() . 'epayment/lookup/', [
            "pidx" => $pidx,
        ]);

        $data = $response->json();

        if ($response->successful() && isset($data['status']) && $data['status'] === 'Completed') {
            $order = Order::find($orderId);

            if ($order) {
                $order->update([
                    'status' => 'paid',
                ]);

                // Update the pending Payment record created in initiate()
                Payment::where('pidx', $pidx)->update([
                    'transaction_id' => $data['transaction_id'] ?? null,
                    'status'         => 'completed',
                    'paid_at'        => now(),
                ]);
            }

            return redirect('/')->with('success', 'Payment Successful for Order #' . $orderId);
        }

        // Mark Payment as failed if Khalti verification did not return Completed
        Payment::where('pidx', $pidx)->update([
            'status' => 'failed',
        ]);

        return redirect('/')->with('error', 'Payment verification failed.');
    }

    public function failure()
    {
        return redirect('/')->with('error', 'Payment cancelled.');
    }
}