<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use App\Models\Order;
use App\Models\OrderItem;

class KhaltiController extends Controller
{
    public function initiate(Request $request)
    {
        $orderId = $request->order_id;
        $order = Order::find($orderId);

        if (!$order) {
            return back()->with('error', 'Order not found');
        }

        $response = Http::withHeaders([
            'Authorization' => 'Key ' . env('KHALTI_SECRET_KEY'),
            'Content-Type' => 'application/json',
        ])->post('https://dev.khalti.com/api/v2/epayment/initiate/', [
            "return_url" => route('khalti.success'),
            "website_url" => url('/'),
            "amount" => $order->total_price * 100,
            "purchase_order_id" => $order->id,
            "purchase_order_name" => "Order #" . $order->id,
        ]);

        $data = $response->json();

        if (isset($data['payment_url'])) {
            return redirect($data['payment_url']);
        }

        return back()->with('error', 'Payment initiation failed');
    }

    public function success(Request $request)
    {
        $pidx = $request->query('pidx');

        $response = Http::withHeaders([
            'Authorization' => 'Key ' . env('KHALTI_SECRET_KEY'),
            'Content-Type' => 'application/json',
        ])->post('https://dev.khalti.com/api/v2/epayment/lookup/', [
            "pidx" => $pidx
        ]);

        $data = $response->json();

        if (isset($data['status']) && $data['status'] == 'Completed') {
            $order = Order::find($data['purchase_order_id']);
            if ($order) {
                $order->status = 'paid';
                $order->pidx = $pidx;
                $order->save();
            }

            return redirect('/')->with('success', 'Payment successful');
        }

        return redirect('/')->with('error', 'Payment verification failed');
    }

    public function failure()
    {
        return redirect('/')->with('error', 'Payment failed or cancelled');
    }
}
