@extends('layouts.admin')

@section('header', 'Overview')

@section('content')
<div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6 mb-6">
    <!-- Total Products Card -->
    <div class="bg-white rounded-lg shadow p-6 flex items-center">
        <div class="p-3 rounded-full bg-blue-100 text-blue-500 mr-4">
            <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10M4 7v10l8 4"></path>
            </svg>
        </div>
        <div>
            <p class="text-sm font-medium text-gray-500">Total Products</p>
            <p class="text-2xl font-bold text-gray-800">{{ $totalProducts }}</p>
        </div>
    </div>

    <!-- Total Categories Card -->
    <div class="bg-white rounded-lg shadow p-6 flex items-center">
        <div class="p-3 rounded-full bg-green-100 text-green-500 mr-4">
            <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24">
               <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 7h.01M7 3h5c.512 0 1.024.195 1.414.586l7 7a2 2 0 010 2.828l-7 7a2 2 0 01-2.828 0l-7-7A1.994 1.994 0 013 12V7a4 4 0 014-4z"></path>
            </svg>
        </div>
        <div>
            <p class="text-sm font-medium text-gray-500">Total Categories</p>
            <p class="text-2xl font-bold text-gray-800">{{ $totalCategories }}</p>
        </div>
    </div>

    <!-- Total Orders Card (Placeholder) -->
    <div class="bg-white rounded-lg shadow p-6 flex items-center">
        <div class="p-3 rounded-full bg-purple-100 text-purple-500 mr-4">
            <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 11V7a4 4 0 00-8 0v4M5 9h14l1 12H4L5 9z"></path>
            </svg>
        </div>
        <div>
            <p class="text-sm font-medium text-gray-500">Total Orders</p>
            <p class="text-2xl font-bold text-gray-800">{{ $totalOrders }}</p>
            <span class="text-xs text-gray-400 block mt-1">(Coming Soon)</span>
        </div>
    </div>
</div>

<!-- Recent Products Section -->
<div class="bg-white shadow rounded-lg overflow-hidden">
    <div class="px-6 py-4 border-b border-gray-200 flex justify-between items-center">
        <h3 class="text-lg font-medium text-gray-900">Recent Products</h3>
        <a href="{{ route('admin.products.index') }}" class="text-sm text-blue-600 hover:text-blue-800">View All</a>
    </div>
    <div class="overflow-x-auto">
        <table class="min-w-full divide-y divide-gray-200">
            <thead class="bg-gray-50">
                <tr>
                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Image</th>
                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Name</th>
                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Price</th>
                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Category</th>
                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Actions</th>
                </tr>
            </thead>
            <tbody class="bg-white divide-y divide-gray-200">
                @forelse($recentProducts as $product)
                <tr>
                    <td class="px-6 py-4 whitespace-nowrap">
                        <img src="{{ asset($product->image) }}" alt="{{ $product->name }}" class="h-10 w-10 rounded-full object-cover border border-gray-200">
                    </td>
                    <td class="px-6 py-4 whitespace-nowrap">
                        <div class="text-sm font-medium text-gray-900">{{ $product->name }}</div>
                    </td>
                    <td class="px-6 py-4 whitespace-nowrap">
                        <div class="text-sm text-gray-900">Rs. {{ number_format($product->price, 2) }}</div>
                    </td>
                    <td class="px-6 py-4 whitespace-nowrap">
                        <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-blue-100 text-blue-800">
                            {{ $product->category->name }}
                        </span>
                    </td>
                    <td class="px-6 py-4 whitespace-nowrap text-sm font-medium">
                        <a href="{{ route('admin.products.edit', $product->id) }}" class="text-indigo-600 hover:text-indigo-900">Edit</a>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="5" class="px-6 py-4 whitespace-nowrap text-center text-sm text-gray-500">
                        No products found.
                    </td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
@endsection
