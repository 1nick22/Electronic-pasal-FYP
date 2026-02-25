@extends('layouts.admin')

@section('header', 'Add New Product')

@section('content')
<div class="container mx-auto px-4 py-8">
    <div class="max-w-2xl mx-auto bg-white p-8 rounded-lg shadow-lg">
        <h1 class="text-3xl font-bold mb-6 text-gray-800">Add New Product</h1>
        
        @if ($errors->any())
            <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative mb-4">
                <ul class="list-disc pl-5">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('admin.products.store') }}" method="POST" enctype="multipart/form-data">
            @csrf

            <!-- Product Name -->
            <div class="mb-4">
                <label for="name" class="block text-gray-700 font-bold mb-2">Product Name</label>
                <input type="text" name="name" id="name" class="w-full px-3 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500" value="{{ old('name') }}" required>
            </div>

            <!-- Category -->
            <div class="mb-4">
                <label for="category_id" class="block text-gray-700 font-bold mb-2">Category</label>
                <select name="category_id" id="category_id" class="w-full px-3 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500" required>
                    <option value="">Select a Category</option>
                    @foreach($categories as $category)
                        <option value="{{ $category->id }}" {{ old('category_id') == $category->id ? 'selected' : '' }}>
                            {{ $category->name }}
                        </option>
                    @endforeach
                </select>
            </div>

            <!-- Brand -->
            <div class="mb-4">
                <label for="brand" class="block text-gray-700 font-bold mb-2">Brand</label>
                <input type="text" name="brand" id="brand" class="w-full px-3 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500" value="{{ old('brand') }}">
            </div>

            <!-- Price & Stock Row -->
            <div class="flex gap-4 mb-4">
                <div class="w-1/2">
                    <label for="price" class="block text-gray-700 font-bold mb-2">Price (Rs.)</label>
                    <input type="number" name="price" id="price" class="w-full px-3 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500" value="{{ old('price') }}" step="0.01" min="0" required>
                </div>
                <div class="w-1/2">
                    <label for="stock" class="block text-gray-700 font-bold mb-2">Stock Quantity</label>
                    <input type="number" name="stock" id="stock" class="w-full px-3 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500" value="{{ old('stock', 0) }}" min="0" required>
                </div>
            </div>

            <!-- Description -->
            <div class="mb-4">
                <label for="description" class="block text-gray-700 font-bold mb-2">Description</label>
                <textarea name="description" id="description" rows="5" class="w-full px-3 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500" required>{{ old('description') }}</textarea>
            </div>

            <!-- Image Upload -->
            <div class="mb-6">
                <label for="image" class="block text-gray-700 font-bold mb-2">Product Image</label>
                <input type="file" name="image" id="image" class="w-full px-3 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500" accept="image/*" required>
                <p class="text-sm text-gray-500 mt-1">Accepted formats: JPEG, PNG, JPG, GIF. Max size: 2MB.</p>
            </div>

            <!-- Buttons -->
            <div class="flex justify-end gap-4">
                <a href="{{ route('admin.products.index') }}" class="px-6 py-2 bg-gray-500 text-white rounded-lg hover:bg-gray-600 transition">Cancel</a>
                <button type="submit" class="px-6 py-2 bg-blue-600 text-white rounded-lg hover:bg-blue-700 transition">Create Product</button>
            </div>
        </form>
    </div>
</div>
@endsection
