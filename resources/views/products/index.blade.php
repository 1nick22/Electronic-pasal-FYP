@extends('layouts.app')

@section('content')
<div class="container mx-auto px-4 py-8">
    <form action="{{ route('product.index') }}" method="GET" class="w-full">
        <!-- Preserve existing query parameters that might be hidden if needed, usually handled by inputs -->
        
        <div class="flex flex-col gap-6">
            <!-- Top Filter Bar -->
            <div class="bg-white p-4 rounded-2xl shadow-sm border border-gray-100">
                <div class="flex flex-col md:flex-row justify-between items-center gap-4">
                    <!-- Categories (Horizontal Scroll) -->
                    <div class="w-full md:flex-1 overflow-x-auto no-scrollbar">
                        <ul class="flex space-x-2 items-center">
                            <li>
                                <span class="text-sm font-bold text-gray-700 mr-2">Categories:</span>
                            </li>
                            <li>
                                <a href="{{ route('product.index') }}" 
                                   class="inline-block whitespace-nowrap px-4 py-2 rounded-full text-sm font-medium transition-colors {{ !request('category') ? 'bg-gray-900 text-white' : 'bg-gray-100 text-gray-600 hover:bg-gray-200' }}">
                                    All
                                </a>
                            </li>
                            @foreach($categories as $category)
                                <li>
                                    <a href="{{ route('product.index', array_merge(request()->except('category', 'page'), ['category' => $category->slug])) }}" 
                                       class="inline-block whitespace-nowrap px-4 py-2 rounded-full text-sm font-medium transition-colors {{ request('category') == $category->slug ? 'bg-gray-900 text-white' : 'bg-gray-100 text-gray-600 hover:bg-gray-200' }}">
                                        {{ $category->name }} <span class="ml-1 text-xs opacity-70">({{ $category->products_count }})</span>
                                    </a>
                                </li>
                            @endforeach
                        </ul>
                        @if(request('category'))
                            <input type="hidden" name="category" value="{{ request('category') }}">
                        @endif
                    </div>

                    <!-- Price Filter (Inline) -->
                    <div class="flex items-center gap-2 flex-shrink-0 border-l border-gray-100 pl-0 md:pl-4 pt-4 md:pt-0 w-full md:w-auto border-t md:border-t-0">
                        <span class="text-sm font-medium text-gray-600 whitespace-nowrap">Price:</span>
                        <div class="flex items-center gap-2">
                            <input type="number" name="min_price" value="{{ request('min_price') }}" placeholder="Min"
                                class="w-20 px-3 py-1.5 border border-gray-200 rounded-lg text-sm focus:outline-none focus:border-blue-500 focus:ring-1 focus:ring-blue-500">
                            <span class="text-gray-400">-</span>
                            <input type="number" name="max_price" value="{{ request('max_price') }}" placeholder="Max"
                                class="w-20 px-3 py-1.5 border border-gray-200 rounded-lg text-sm focus:outline-none focus:border-blue-500 focus:ring-1 focus:ring-blue-500">
                            <button type="submit" class="bg-gray-900 text-white p-2 rounded-lg hover:bg-gray-800 transition-colors" title="Apply Filter">
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3"></path></svg>
                            </button>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Main Product Grid -->
            <div class="w-full">
                <!-- Toolbar -->
                <div class="flex flex-col sm:flex-row justify-between items-center mb-6 bg-white p-4 rounded-xl shadow-sm border border-gray-100">
                    <div class="mb-4 sm:mb-0">
                        <h1 class="text-2xl font-bold text-gray-800">{{ $categoryName }}</h1>
                        <p class="text-sm text-gray-500 mt-1">Showing {{ $products->count() }} results</p>
                    </div>
                    
                    <div class="flex items-center space-x-3 w-full sm:w-auto">
                        <!-- Search Form -->
                        <div class="relative w-full sm:w-64">
                            <input type="text" name="search" value="{{ request('search') }}" placeholder="Search products..." 
                                class="w-full pl-10 pr-4 py-2 border border-gray-200 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent text-sm">
                            <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                <svg class="h-4 w-4 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
                                </svg>
                            </div>
                        </div>

                        <div class="hidden sm:block h-6 w-px bg-gray-200"></div>

                        <label for="sort" class="text-sm text-gray-600 font-medium whitespace-nowrap">Sort by:</label>
                        <select name="sort" id="sort" onchange="this.form.submit()"
                            class="border-gray-200 rounded-lg text-sm focus:ring-blue-500 focus:border-blue-500 py-2 pl-3 pr-8 bg-gray-50 hover:bg-white transition-colors cursor-pointer">
                            <option value="newest" {{ request('sort') == 'newest' ? 'selected' : '' }}>Newest Items</option>
                            <option value="price_asc" {{ request('sort') == 'price_asc' ? 'selected' : '' }}>Price: Low to High</option>
                            <option value="price_desc" {{ request('sort') == 'price_desc' ? 'selected' : '' }}>Price: High to Low</option>
                            <option value="popular" {{ request('sort') == 'popular' ? 'selected' : '' }}>Most Popular</option>
                        </select>
                    </div>
                </div>

                <!-- Products Grid -->
                @if($products->isEmpty())
                    <div class="bg-white rounded-2xl shadow-sm border border-gray-100 p-12 text-center">
                        <div class="mb-4 text-gray-200">
                            <svg class="w-16 h-16 mx-auto" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9.172 16.172a4 4 0 015.656 0M9 10h.01M15 10h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                            </svg>
                        </div>
                        <h2 class="text-xl font-bold text-gray-800 mb-2">
                            @if(request('search'))
                                No results found for "{{ request('search') }}"
                            @else
                                No products found
                            @endif
                        </h2>
                        <p class="text-gray-500 mb-6">Try adjusting your filters or search criteria.</p>
                        
                        @if(request('search') || request('category') || request('min_price') || request('max_price'))
                            <a href="{{ route('product.index') }}" class="inline-flex items-center px-4 py-2 bg-blue-600 text-white rounded-lg hover:bg-blue-700 transition-colors">
                                Clear All Filters & Search
                            </a>
                        @endif
                    </div>
                @else
                    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                        @foreach($products as $product)
                            <div class="group bg-white rounded-2xl border border-gray-100 overflow-hidden hover:shadow-xl transition-all duration-300 flex flex-col">
                                <div class="relative h-64 bg-gray-50 p-6 flex items-center justify-center">
                                    <img src="{{ asset($product->image) }}" 
                                         alt="{{ $product->name }}" 
                                         class="max-w-full max-h-full object-contain group-hover:scale-110 transition-transform duration-300">
                                    
                                    @if($product->stock <= 0)
                                        <div class="absolute top-4 right-4 bg-red-500 text-white text-xs font-bold px-2 py-1 rounded">
                                            OUT OF STOCK
                                        </div>
                                    @endif
                                </div>
                                <div class="p-5 flex-grow flex flex-col">
                                    <div class="mb-2">
                                        <p class="text-xs text-blue-600 font-semibold uppercase tracking-wider">{{ $product->brand ?? 'Generic' }}</p>
                                    </div>
                                    <h3 class="font-bold text-gray-800 mb-2 line-clamp-2 min-h-[3rem] group-hover:text-blue-600 transition-colors">
                                        {{ $product->name }}
                                    </h3>
                                    
                                    <div class="flex items-center mb-2">
                                        @php $rating = $product->rating ?? 0; @endphp
                                        @for($i = 1; $i <= 5; $i++)
                                            <svg class="w-4 h-4 {{ $i <= $rating ? 'text-yellow-400' : 'text-gray-300' }}" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                                <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"/>
                                            </svg>
                                        @endfor
                                        <span class="text-xs text-gray-500 ml-1">({{ number_format($rating, 1) }})</span>
                                    </div>
                                    <div class="mt-auto pt-4 border-t border-gray-50">
                                        <div class="flex items-center justify-between mb-4">
                                            <span class="text-xl font-bold text-gray-900">Rs. {{ number_format($product->price) }}</span>
                                        </div>
                                        <a href="{{ route('product.show', $product->id) }}" 
                                           class="block w-full text-center bg-gray-900 text-white py-2.5 rounded-xl font-medium hover:bg-blue-600 shadow-lg shadow-gray-200 hover:shadow-blue-200 transition-all duration-300 transform active:scale-95">
                                            View Details
                                        </a>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                    
                    <div class="mt-8">
                        {{ $products->links() }}
                    </div>
                @endif
            </div>
        </div>
    </form>
</div>
@endsection
