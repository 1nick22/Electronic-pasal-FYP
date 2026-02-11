<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Category;

class AdminController extends Controller
{
    /**
     * Display the admin dashboard with stats and recent products.
     */
    public function index()
    {
        // Fetch stats
        $totalProducts = Product::count();
        $totalCategories = Category::count();
        // Placeholder for orders since the model doesn't exist yet
        $totalOrders = 0; 

        // Fetch recent products with their category
        $recentProducts = Product::with('category')
                                 ->latest()
                                 ->take(5)
                                 ->get();

        return view('admin.dashboard', compact('totalProducts', 'totalCategories', 'totalOrders', 'recentProducts'));
    }
}
