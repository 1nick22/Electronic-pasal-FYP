@extends('layouts.app')

@section('content')
<div class="container mx-auto px-4 py-8">

    <h1 class="text-2xl font-bold text-gray-800 mb-6">My Orders</h1>

    {{-- Flash Messages --}}
    @if(session('success'))
        <div class="bg-green-100 text-green-700 px-4 py-3 rounded-lg mb-6">
            {{ session('success') }}
        </div>
    @endif

    @if($orders->isEmpty())
        <div class="bg-white rounded-2xl shadow-sm border border-gray-100 p-12 text-center">
            <svg class="w-16 h-16 mx-auto text-gray-200 mb-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                    d="M9 17v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6m14 0v-6a2 2 0 00-2-2h-2a2 2 0 00-2 2v6m-6 0h12" />
            </svg>
            <h2 class="text-xl font-semibold text-gray-700 mb-2">No orders found</h2>
            <p class="text-gray-400 mb-6">You haven't placed any orders yet.</p>
            <a href="{{ route('product.index') }}"
               class="inline-block bg-gray-900 text-white px-6 py-2.5 rounded-xl font-medium hover:bg-blue-600 transition-colors">
                Start Shopping
            </a>
        </div>
    @else
        <div class="flex flex-col gap-6">
            @foreach($orders as $order)
                <div class="bg-white rounded-2xl shadow-sm border border-gray-100 overflow-hidden">

                    {{-- Order Header --}}
                    <div class="flex flex-col sm:flex-row justify-between items-start sm:items-center px-6 py-4 bg-gray-50 border-b border-gray-100 gap-2">
                        <div>
                            <span class="text-sm text-gray-500">Order ID</span>
                            <p class="font-bold text-gray-800">#{{ $order->id }}</p>
                        </div>
                        <div>
                            <span class="text-sm text-gray-500">Date</span>
                            <p class="font-medium text-gray-700">{{ $order->created_at->format('d M Y, h:i A') }}</p>
                        </div>
                        <div>
                            <span class="text-sm text-gray-500">Total Price</span>
                            <p class="font-bold text-gray-800">Rs. {{ number_format($order->total_price, 2) }}</p>
                        </div>
                        <div>
                            <span class="text-sm text-gray-500">Status</span>
                            <p>
                                <span class="inline-block px-3 py-1 rounded-full text-xs font-semibold
                                    {{ $order->status === 'paid' ? 'bg-green-100 text-green-700' : 'bg-yellow-100 text-yellow-700' }}">
                                    {{ ucfirst($order->status) }}
                                </span>
                            </p>
                        </div>
                    </div>

                    {{-- Order Items --}}
                    <div class="px-6 py-4">
                        <table class="w-full text-sm text-left">
                            <thead>
                                <tr class="text-xs text-gray-500 uppercase border-b border-gray-100">
                                    <th class="pb-3 font-semibold">Product</th>
                                    <th class="pb-3 font-semibold text-center">Quantity</th>
                                    <th class="pb-3 font-semibold text-right">Price</th>
                                    <th class="pb-3 font-semibold text-right">Subtotal</th>
                                </tr>
                            </thead>
                            <tbody class="divide-y divide-gray-50">
                                @foreach($order->orderItems as $item)
                                    <tr class="py-3">
                                        <td class="py-3 font-medium text-gray-800">
                                            {{ $item->product->name ?? 'Product Unavailable' }}
                                        </td>
                                        <td class="py-3 text-center text-gray-600">
                                            {{ $item->quantity }}
                                        </td>
                                        <td class="py-3 text-right text-gray-600">
                                            Rs. {{ number_format($item->price, 2) }}
                                        </td>
                                        <td class="py-3 text-right font-semibold text-gray-800">
                                            Rs. {{ number_format($item->price * $item->quantity, 2) }}
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>

                </div>
            @endforeach
        </div>
    @endif

</div>
@endsection
