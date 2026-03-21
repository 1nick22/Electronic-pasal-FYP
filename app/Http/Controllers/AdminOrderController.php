<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Order;

class AdminOrderController extends Controller
{
    /**
     * Display a listing of all the orders.
     */
    public function index()
    {
        // Fetch all orders with their related users, order items, and products
        $orders = Order::with(['user', 'orderItems.product'])->latest()->get();
        
        return view('admin.orders.index', compact('orders'));
    }
}
