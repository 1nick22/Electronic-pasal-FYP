<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cart;
use App\Models\CartItem;
use App\Models\Product;
use Illuminate\Support\Facades\Auth;

class CartController extends Controller
{
    /**
     * Display a listing of the cart items.
     */
    public function index()
    {
        $user = Auth::user();
        
        // Retrieve the cart with cart items and associated products
        $cart = Cart::with('items.product')->where('user_id', $user->id)->first();
        
        $cartItems = $cart ? $cart->items : collect();
        
        return view('cart.index', compact('cartItems'));
    }

    /**
     * Add a product to the cart.
     */
    public function add(Request $request, $productId)
    {
        $user = Auth::user();
        $product = Product::findOrFail($productId);

        // Retrieve or create a cart for the user
        $cart = Cart::firstOrCreate(['user_id' => $user->id]);

        // Check if the product already exists in the cart
        $cartItem = CartItem::where('cart_id', $cart->id)
                            ->where('product_id', $product->id)
                            ->first();

        if ($cartItem) {
            // Increment the quantity
            $cartItem->quantity += 1;
            $cartItem->save();
            
            return redirect()->back()->with('success', 'Product quantity updated in cart.');
        } else {
            // Create a new cart item
            CartItem::create([
                'cart_id' => $cart->id,
                'product_id' => $product->id,
                'quantity' => 1,
                'price' => $product->price,
            ]);
            
            return redirect()->back()->with('success', 'Product added to cart successfully.');
        }
    }
}
