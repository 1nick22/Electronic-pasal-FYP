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
        
        $cartTotal = $cartItems->sum(function ($item) {
            return $item->price * $item->quantity;
        });
        
        return view('cart.index', compact('cartItems', 'cartTotal'));
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

    /**
     * Update the quantity of a cart item.
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'quantity' => 'required|integer|min:1'
        ]);

        $user = Auth::user();
        
        $cartItem = CartItem::whereHas('cart', function ($query) use ($user) {
            $query->where('user_id', $user->id);
        })->findOrFail($id);

        $cartItem->quantity = $request->quantity;
        $cartItem->save();

        return redirect()->back()->with('success', 'Cart quantity updated.');
    }

    /**
     * Remove an item from the cart.
     */
    public function remove($id)
    {
        $user = Auth::user();
        
        $cartItem = CartItem::whereHas('cart', function ($query) use ($user) {
            $query->where('user_id', $user->id);
        })->findOrFail($id);

        $cartItem->delete();

        return redirect()->back()->with('success', 'Item removed from cart.');
    }
}
