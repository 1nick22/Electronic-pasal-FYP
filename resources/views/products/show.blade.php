@extends('layouts.app')

@section('content')
<style>
    /* Hide number input spinners */
    input[type=number]::-webkit-inner-spin-button, 
    input[type=number]::-webkit-outer-spin-button { 
      -webkit-appearance: none; 
      margin: 0; 
    }
    input[type=number] {
      -moz-appearance: textfield;
    }
</style>

<div class="container mx-auto px-4 py-12">
    <div class="bg-white rounded-3xl shadow-sm border border-gray-100 overflow-hidden max-w-6xl mx-auto">
        <div class="grid grid-cols-1 md:grid-cols-2 gap-12 p-8 md:p-12">
            <!-- Product Image Section (Left) -->
            <div class="flex items-center justify-center p-4">
                <img src="{{ asset($product->image) }}" 
                     alt="{{ $product->name }}" 
                     class="w-full h-auto max-h-[600px] object-contain rounded-2xl transition-transform duration-300 hover:scale-105">
            </div>

            <!-- Product Details Section (Right) -->
            <div class="flex flex-col justify-center space-y-4">
                
                <!-- Category -->
                <div>
                    <span class="text-xs font-bold text-gray-500 uppercase tracking-widest">
                        {{ $product->category->name }}
                    </span>
                    <h1 class="text-3xl md:text-4xl font-bold text-gray-900 leading-tight mt-1">
                        {{ $product->name }}
                    </h1>
                </div>

                <!-- Price & Stock Status (Same Line) -->
                <div class="flex items-center gap-4">
                    <p class="text-2xl font-bold text-indigo-600">
                        Rs. {{ number_format($product->price) }}
                    </p>
                    <div class="h-6 w-px bg-gray-300"></div> <!-- Vertical Divider -->
                    @if($product->stock > 0)
                        <span class="inline-flex items-center text-sm font-medium text-green-700">
                            <span class="w-2 h-2 mr-2 bg-green-500 rounded-full"></span>
                            In Stock
                        </span>
                    @else
                        <span class="inline-flex items-center text-sm font-medium text-red-700">
                            <span class="w-2 h-2 mr-2 bg-red-500 rounded-full"></span>
                            Out of Stock
                        </span>
                    @endif
                </div>

                <!-- Description -->
                <div class="prose prose-sm text-gray-600 pt-2">
                    <p>{{ $product->description }}</p>
                </div>

                <!-- Actions: Quantity & Add to Cart -->
                <div class="pt-6 border-t border-gray-100">
                    <form action="#" method="POST" class="flex flex-col items-start gap-4">
                        @csrf
                        
                        <!-- Quantity Stepper -->
                        <div class="flex flex-col gap-1">
                            <label for="quantity-input" class="text-xs font-semibold text-gray-500 uppercase tracking-wide">Quantity</label>
                            <div class="flex items-center border border-gray-300 rounded-lg overflow-hidden w-fit">
                                <button type="button" onclick="decrementQuantity()"
                                    class="w-10 h-10 flex items-center justify-center bg-gray-50 hover:bg-gray-100 text-gray-600 transition-colors focus:outline-none active:bg-gray-200">
                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 12H4"></path>
                                    </svg>
                                </button>
                                <input type="number" name="quantity" id="quantity-input" value="1" min="1" max="{{ $product->stock }}" readonly
                                    class="w-12 h-10 border-x border-gray-300 text-center text-gray-900 font-semibold focus:outline-none bg-white">
                                <button type="button" onclick="incrementQuantity({{ $product->stock }})"
                                    class="w-10 h-10 flex items-center justify-center bg-gray-50 hover:bg-gray-100 text-gray-600 transition-colors focus:outline-none active:bg-gray-200">
                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"></path>
                                    </svg>
                                </button>
                            </div>
                        </div>

                        <!-- Add to Cart Button -->
                        <input type="hidden" name="product_id" value="{{ $product->id }}">
                        <button type="button" onclick="handleAddToCart(event)" data-product-id="{{ $product->id }}"
                            class="bg-indigo-600 text-white font-bold py-3 px-8 rounded-xl hover:bg-indigo-700 focus:ring-4 focus:ring-indigo-200 transition-all transform active:scale-95 shadow-lg shadow-indigo-200 flex items-center justify-center gap-2">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 11V7a4 4 0 00-8 0v4M5 9h14l1 12H4L5 9z"></path>
                            </svg>
                            Add to Cart
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    function incrementQuantity(maxStock) {
        const input = document.getElementById('quantity-input');
        let value = parseInt(input.value);
        if (value < maxStock) {
            input.value = value + 1;
        }
    }

    function decrementQuantity() {
        const input = document.getElementById('quantity-input');
        let value = parseInt(input.value);
        if (value > 1) {
            input.value = value - 1;
        }
    }
</script>
@endsection
