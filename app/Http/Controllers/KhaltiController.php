<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;
use App\Models\Order;

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
            "return_url" => route('khalti.success'),
            "website_url" => url('/'),
            "amount" => $order->total_price * 100, // paisa
            "purchase_order_id" => (string)$order->id, // cast to string
            "purchase_order_name" => "ElectronicPasal Order #" . $order->id,
        ]);

        $data = $response->json();

        if ($response->successful() && isset($data['payment_url'])) {
            return redirect($data['payment_url']);
        }

        Log::error('Khalti Initiation Error', ['data' => $data]);
        return back()->with('error', $data['detail'] ?? 'Khalti initiation failed.');
    }

    public function success(Request $request)
{
    $pidx = $request->query('pidx');

    // Get the order ID directly from the URL parameters sent by Khalti
    $orderId = $request->query('purchase_order_id'); 

    $response = Http::withHeaders([
        'Authorization' => 'Key ' . $this->getSecretKey(),
        'Content-Type' => 'application/json',
    ])->post($this->getBaseUrl() . 'epayment/lookup/', [
        "pidx" => $pidx
    ]);

    $data = $response->json();

    if ($response->successful() && isset($data['status']) && $data['status'] === 'Completed') {
        
        // Use the $orderId we got from the Request query
        $order = Order::find($orderId);
        
        if ($order) {
            $order->update([
                'status' => 'paid',
                'pidx' => $pidx
            ]);
        }

        return redirect('/')->with('success', 'Payment Successful for Order #' . $orderId);
    }

    return redirect('/')->with('error', 'Payment verification failed.');
}

    public function failure()
    {
        return redirect('/')->with('error', 'Payment cancelled.');
    }
}