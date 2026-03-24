@extends('layouts.app')

@section('title', 'Your Cart – ElectronicPasal')

@section('content')
<div class="max-w-7xl mx-auto px-4 py-10" style="min-height: 60vh;">

    {{-- Page Header --}}
    <div class="mb-8">
        <h1 class="text-3xl font-bold text-gray-900">Shopping Cart</h1>
        <p class="text-gray-500 mt-1">Review your items and proceed to checkout</p>
    </div>

    {{-- Success Alert --}}
    @if(session('success'))
        <div id="flash-success" class="flex items-center gap-3 bg-green-50 border border-green-200 text-green-800 rounded-xl px-5 py-4 mb-6 shadow-sm">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-green-500 flex-shrink-0" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/>
            </svg>
            <span class="font-medium">{{ session('success') }}</span>
            <button onclick="document.getElementById('flash-success').remove()" class="ml-auto text-green-500 hover:text-green-700 transition">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/></svg>
            </button>
        </div>
    @endif

    @if($cartItems->isEmpty())
        {{-- Empty Cart State --}}
        <div class="flex flex-col items-center justify-center py-24 bg-white rounded-2xl shadow-sm border border-gray-100">
            <div class="w-24 h-24 rounded-full bg-teal-50 flex items-center justify-center mb-6">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-12 w-12 text-teal-400" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.5">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13L5.4 5M7 13l-2.293 2.293c-.63.63-.184 1.707.707 1.707H17m0 0a2 2 0 100 4 2 2 0 000-4zm-8 2a2 2 0 11-4 0 2 2 0 014 0z"/>
                </svg>
            </div>
            <h2 class="text-2xl font-bold text-gray-800 mb-2">Your cart is empty</h2>
            <p class="text-gray-500 mb-8">Looks like you haven't added anything yet.</p>
            <a href="{{ route('product.index') }}" class="inline-flex items-center gap-2 px-8 py-3 bg-teal-gradient text-white font-semibold rounded-xl shadow-md hover:shadow-lg transition-all">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"/></svg>
                Continue Shopping
            </a>
        </div>

    @else
        <div class="flex flex-col lg:flex-row gap-8">

            {{-- Cart Items Table --}}
            <div class="flex-1">
                <div class="bg-white rounded-2xl shadow-sm border border-gray-100 overflow-hidden">
                    {{-- Table Header --}}
                    <div class="hidden md:grid grid-cols-12 gap-4 px-6 py-4 bg-gray-50 border-b border-gray-100 text-xs font-semibold text-gray-500 uppercase tracking-wider">
                        <div class="col-span-5">Product</div>
                        <div class="col-span-2 text-center">Price</div>
                        <div class="col-span-3 text-center">Quantity</div>
                        <div class="col-span-2 text-right">Subtotal</div>
                    </div>

                    {{-- Cart Rows --}}
                    @foreach($cartItems as $item)
                    <div class="grid grid-cols-1 md:grid-cols-12 gap-4 px-6 py-5 border-b border-gray-50 hover:bg-gray-50 transition-colors last:border-b-0 items-center">

                        {{-- Product Info --}}
                        <div class="col-span-5 flex items-center gap-4">
                            <div class="w-20 h-20 flex-shrink-0 rounded-xl overflow-hidden bg-gray-50 border border-gray-100 flex items-center justify-center">
                                <img src="{{ asset($item->product->image) }}"
                                     alt="{{ $item->product->name }}"
                                     class="w-full h-full object-contain p-1">
                            </div>
                            <div class="min-w-0">
                                <a href="{{ route('product.show', $item->product->id) }}"
                                   class="font-semibold text-gray-800 hover:text-teal-600 transition-colors line-clamp-2 block">
                                    {{ $item->product->name }}
                                </a>
                                @if($item->product->brand)
                                    <span class="inline-block mt-1 text-xs text-gray-400 bg-gray-100 rounded-full px-2 py-0.5">{{ $item->product->brand }}</span>
                                @endif
                                {{-- Mobile remove --}}
                                <form action="{{ route('cart.remove', $item->id) }}" method="POST" class="mt-2 md:hidden">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="text-xs text-red-500 hover:text-red-700 font-medium transition">Remove</button>
                                </form>
                            </div>
                        </div>

                        {{-- Price --}}
                        <div class="col-span-2 text-center">
                            <span class="text-sm font-medium text-gray-600">Rs. {{ number_format($item->price, 2) }}</span>
                        </div>

                        {{-- Quantity --}}
                        <div class="col-span-3 flex justify-center">
                            <form action="{{ route('cart.update', $item->id) }}" method="POST" class="flex items-center gap-2">
                                @csrf
                                <div class="flex items-center border border-gray-200 rounded-xl overflow-hidden bg-gray-50">
                                    <input type="number" name="quantity"
                                           value="{{ $item->quantity }}"
                                           min="1"
                                           class="w-14 text-center text-sm font-semibold bg-transparent border-none outline-none py-2 text-gray-700"
                                           required>
                                </div>
                                <button type="submit"
                                        title="Update"
                                        class="p-2 rounded-xl bg-teal-50 hover:bg-teal-100 text-teal-600 transition">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 4v5h.582m15.356 2A8.001 8.001 0 004.582 9m0 0H9m11 11v-5h-.581m0 0a8.003 8.003 0 01-15.357-2m15.357 2H15"/>
                                    </svg>
                                </button>
                            </form>
                        </div>

                        {{-- Subtotal + Remove --}}
                        <div class="col-span-2 flex items-center justify-end gap-3">
                            <span class="font-bold text-gray-800">Rs. {{ number_format($item->price * $item->quantity, 2) }}</span>
                            {{-- Desktop remove --}}
                            <form action="{{ route('cart.remove', $item->id) }}" method="POST" class="hidden md:block flex-shrink-0">
                                @csrf
                                @method('DELETE')
                                <button type="submit"
                                        title="Remove item"
                                        class="p-2 rounded-xl text-gray-400 hover:text-red-500 hover:bg-red-50 transition">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"/>
                                    </svg>
                                </button>
                            </form>
                        </div>

                    </div>
                    @endforeach

                    {{-- Footer actions --}}
                    <div class="px-6 py-4 bg-gray-50 flex items-center justify-between">
                        <a href="{{ route('product.index') }}"
                           class="inline-flex items-center gap-2 text-sm font-medium text-gray-600 hover:text-teal-600 transition">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"/></svg>
                            Continue Shopping
                        </a>
                        <span class="text-sm text-gray-400">{{ $cartItems->count() }} {{ Str::plural('item', $cartItems->count()) }}</span>
                    </div>
                </div>
            </div>

            {{-- Order Summary --}}
            <div class="w-full lg:w-80 flex-shrink-0">
                <div class="bg-white rounded-2xl shadow-sm border border-gray-100 overflow-hidden sticky top-24">
                    <div class="px-6 py-5 border-b border-gray-100">
                        <h2 class="text-lg font-bold text-gray-900">Order Summary</h2>
                    </div>
                    <div class="px-6 py-5 space-y-4">

                        <div class="flex items-center justify-between">
                            <span class="text-gray-500">Subtotal</span>
                            <span class="font-semibold text-gray-800">Rs. {{ number_format($cartTotal, 2) }}</span>
                        </div>

                        <div class="flex items-center justify-between">
                            <span class="text-gray-500">Shipping</span>
                            <span class="flex items-center gap-1 text-green-600 font-semibold text-sm">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/></svg>
                                Free Delivery
                            </span>
                        </div>

                        <div class="border-t border-gray-100 pt-4 flex items-center justify-between">
                            <span class="text-base font-bold text-gray-900">Total</span>
                            <span class="text-xl font-bold text-teal-600">Rs. {{ number_format($cartTotal, 2) }}</span>
                        </div>

                        <form action="{{ route('checkout') }}" method="POST">
                            @csrf
                            <button type="submit" class="w-full py-3.5 bg-teal-gradient text-white font-bold rounded-xl shadow-md hover:shadow-lg hover:opacity-95 transition-all flex items-center justify-center gap-2 mt-2">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 10h18M7 15h1m4 0h1m-7 4h12a3 3 0 003-3V8a3 3 0 00-3-3H6a3 3 0 00-3 3v8a3 3 0 003 3z"/></svg>
                                Proceed to Checkout
                            </button>
                        </form>

                    </div>

                    {{-- Trust badges --}}
                    <div class="px-6 py-4 bg-gray-50 border-t border-gray-100">
                        <div class="flex items-center justify-center gap-4 text-xs text-gray-400">
                            <span class="flex items-center gap-1">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-3.5 w-3.5" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z"/></svg>
                                Secure Checkout
                            </span>
                            <span class="flex items-center gap-1">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-3.5 w-3.5" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z"/></svg>
                                Buyer Protection
                            </span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endif

    {{-- ─── Transaction History ─── --}}
    @if($payments->isNotEmpty())
    <div class="mt-12">
        <div class="mb-6">
            <h2 class="text-2xl font-bold text-gray-900 flex items-center gap-3">
                <span class="w-10 h-10 rounded-xl bg-teal-50 flex items-center justify-center">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-teal-500" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2m-6 9l2 2 4-4"/>
                    </svg>
                </span>
                Transaction History
            </h2>
            <p class="text-gray-500 mt-1 ml-13">Your past payment records</p>
        </div>

        <div class="bg-white rounded-2xl shadow-sm border border-gray-100 overflow-hidden">
            {{-- Table Header --}}
            <div class="hidden md:grid grid-cols-12 gap-4 px-6 py-4 bg-gray-50 border-b border-gray-100 text-xs font-semibold text-gray-500 uppercase tracking-wider">
                <div class="col-span-3">Date & Time</div>
                <div class="col-span-4">Products</div>
                <div class="col-span-2 text-right">Amount</div>
                <div class="col-span-3 text-center">Status</div>
            </div>

            {{-- Transaction Rows --}}
            @foreach($payments as $payment)
            <div class="grid grid-cols-1 md:grid-cols-12 gap-4 px-6 py-5 border-b border-gray-50 hover:bg-gray-50 transition-colors last:border-b-0 items-center">

                {{-- Date & Time --}}
                <div class="col-span-3">
                    <span class="font-semibold text-gray-800 text-sm">
                        {{ $payment->created_at->format('M d, Y') }}
                    </span>
                    <span class="block text-xs text-gray-400 mt-0.5">
                        {{ $payment->created_at->format('h:i A') }}
                    </span>
                </div>

                {{-- Products --}}
                <div class="col-span-4">
                    @if($payment->order && $payment->order->orderItems->isNotEmpty())
                        <div class="space-y-1">
                            @foreach($payment->order->orderItems as $item)
                                <div class="text-sm text-gray-700">
                                    <span class="font-medium">{{ $item->product->name ?? 'Deleted Product' }}</span>
                                    <span class="text-gray-400">&times; {{ $item->quantity }}</span>
                                </div>
                            @endforeach
                        </div>
                    @else
                        <span class="text-sm text-gray-400 italic">No items found</span>
                    @endif
                </div>

                {{-- Amount --}}
                <div class="col-span-2 text-right">
                    <span class="font-bold text-gray-800">Rs. {{ number_format($payment->amount, 2) }}</span>
                </div>

                {{-- Status Badge --}}
                <div class="col-span-3 flex justify-center">
                    @if($payment->status === 'completed')
                        <span class="inline-flex items-center gap-1.5 px-3 py-1.5 rounded-full text-xs font-semibold bg-green-50 text-green-700 border border-green-200">
                            <span class="w-1.5 h-1.5 rounded-full bg-green-500"></span>
                            Completed
                        </span>
                    @elseif($payment->status === 'pending')
                        <span class="inline-flex items-center gap-1.5 px-3 py-1.5 rounded-full text-xs font-semibold bg-yellow-50 text-yellow-700 border border-yellow-200">
                            <span class="w-1.5 h-1.5 rounded-full bg-yellow-500"></span>
                            Pending
                        </span>
                    @else
                        <span class="inline-flex items-center gap-1.5 px-3 py-1.5 rounded-full text-xs font-semibold bg-red-50 text-red-700 border border-red-200">
                            <span class="w-1.5 h-1.5 rounded-full bg-red-500"></span>
                            Failed
                        </span>
                    @endif
                </div>

            </div>
            @endforeach
        </div>
    </div>
    @endif

</div>
@endsection
