@extends('layouts.app')

@section('content')
    <!-- Hero Section -->
    <section class="hero-overlay py-32 text-white"
        style="background-image: url('{{ asset('images/hero-bg.png') }}');">
        <div class="max-w-7xl mx-auto px-4 hero-content text-center">
            <h1 class="text-5xl md:text-7xl font-extrabold mb-6 tracking-tight">Nepal’s #1 Home Appliances
                Store – ElectronicPasal</h1>
            <p class="text-xl md:text-2xl mb-12 max-w-3xl mx-auto opacity-90">
                Shop genuine home appliances with fast delivery across Nepal. Best prices on refrigerators,
                washing machines, ovens & more.
            </p>
            <div class="flex flex-col md:flex-row gap-4 justify-center">
                <a href="{{ route('product.index') }}"
                    class="btn-primary py-4 px-10 rounded-full text-lg shadow-lg transform hover:scale-105 transition-all">
                    Shop Home Appliances
                </a>
            </div>
        </div>
    </section>

    <!-- Featured Categories Section -->
    <section class="py-24 max-w-7xl mx-auto px-4">
        <div class="flex flex-col md:flex-row justify-between items-end mb-12">
            <div>
                <h2 class="text-4xl font-extrabold text-gray-900 mb-2">Top Categories in Nepal</h2>
                <p class="text-gray-500 text-lg">Browse our most popular home appliance categories</p>
            </div>
        </div>
        <div class="grid grid-cols-1 md:grid-cols-4 gap-6">
            <!-- Category 1 -->
            <div class="group border border-gray-200 bg-white rounded-2xl overflow-hidden hover:shadow-lg hover:border-teal-600 transition-all duration-300 flex flex-col h-full">
                <div class="aspect-[4/3] w-full bg-gray-100 relative overflow-hidden">
                    <img src="{{ asset('images/fridge.jpeg')}}"
                        alt="Refrigerators" loading="lazy" 
                        class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-300">
                </div>
                <div class="p-6 flex flex-col flex-grow">
                    <h3 class="text-xl font-bold mb-1">Refrigerators</h3>
                    <p class="text-gray-500 text-sm mb-4">Energy Efficient Models</p>
                    <a href="{{ route('product.index', ['category' => 'refrigerators']) }}" class="text-teal-600 font-medium mt-auto inline-flex items-center hover:underline transition-colors group-hover:text-teal-700">
                        Explore <span class="ml-1">&rarr;</span>
                    </a>
                </div>
            </div>
            <!-- Category 2 -->
            <div class="group border border-gray-200 bg-white rounded-2xl overflow-hidden hover:shadow-lg hover:border-teal-600 transition-all duration-300 flex flex-col h-full">
                <div class="aspect-[4/3] w-full bg-gray-100 relative overflow-hidden">
                    <img src="{{ asset('images/washingmachine.jpeg') }}"
                        alt="Washing Machines" loading="lazy"
                        class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-300">
                </div>
                <div class="p-6 flex flex-col flex-grow">
                    <h3 class="text-xl font-bold mb-1">Washing Machines</h3>
                    <p class="text-gray-500 text-sm mb-4">Advanced Cleaning Tech</p>
                    <a href="{{ route('product.index', ['category' => 'washing-machines']) }}" class="text-teal-600 font-medium mt-auto inline-flex items-center hover:underline transition-colors group-hover:text-teal-700">
                        Explore <span class="ml-1">&rarr;</span>
                    </a>
                </div>
            </div>
            <!-- Category 3 -->
            <div class="group border border-gray-200 bg-white rounded-2xl overflow-hidden hover:shadow-lg hover:border-teal-600 transition-all duration-300 flex flex-col h-full">
                <div class="aspect-[4/3] w-full bg-gray-100 relative overflow-hidden">
                    <img src="{{ asset('images/microoven.jpeg') }}" alt="Microwave Ovens"
                        loading="lazy"
                        class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-300">
                </div>
                <div class="p-6 flex flex-col flex-grow">
                    <h3 class="text-xl font-bold mb-1">Microwave Ovens</h3>
                    <p class="text-gray-500 text-sm mb-4">Modern Cooking Solutions</p>
                    <a href="{{ route('product.index', ['category' => 'microwave-ovens']) }}" class="text-teal-600 font-medium mt-auto inline-flex items-center hover:underline transition-colors group-hover:text-teal-700">
                        Explore <span class="ml-1">&rarr;</span>
                    </a>
                </div>
            </div>
            <!-- Category 4 -->
            <div class="group border border-gray-200 bg-white rounded-2xl overflow-hidden hover:shadow-lg hover:border-teal-600 transition-all duration-300 flex flex-col h-full">
                <div class="aspect-[4/3] w-full bg-gray-100 relative overflow-hidden">
                    <img src="{{ asset('images/tv.jpeg') }}" alt="Smart TVs"
                        loading="lazy"
                        class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-300">
                </div>
                <div class="p-6 flex flex-col flex-grow">
                    <h3 class="text-xl font-bold mb-1">Smart TVs</h3>
                    <p class="text-gray-500 text-sm mb-4">Immersive 4K Experience</p>
                    <a href="{{ route('product.index', ['category' => 'smart-tvs']) }}" class="text-teal-600 font-medium mt-auto inline-flex items-center hover:underline transition-colors group-hover:text-teal-700">
                        Explore <span class="ml-1">&rarr;</span>
                    </a>
                </div>
            </div>
        </div>
    </section>

    <!-- Today's Best Deals Section -->
    <section id="deals" class="py-24 bg-gray-100">
        <div class="max-w-7xl mx-auto px-4">
            <div class="text-center mb-16">
                <h2 class="text-4xl font-extrabold text-gray-900 mb-4">Today’s Best Deals</h2>
                <p class="text-gray-500 text-lg max-w-2xl mx-auto">Don't miss out on these limited-time
                    offers on top-rated home appliances.</p>
            </div>
            <div class="grid grid-cols-1 md:grid-cols-4 gap-8">
                <!-- Deal Card -->
                <div class="product-card bg-white rounded-2xl shadow-md overflow-hidden flex flex-col">
                    <div class="relative h-64">
                        <img src="{{ asset('images/refrigerator.png') }}"
                            alt="Smart Fridge" class="w-full h-full object-contain p-4" loading="lazy">
                        <div
                            class="absolute inset-0 bg-black bg-opacity-0 hover:bg-opacity-5 transition-all">
                        </div>
                    </div>
                    <div class="p-6 flex-grow">
                        <h3 class="font-bold text-lg mb-2 line-clamp-2">Premium Double-Door Smart
                            Refrigerator</h3>
                        <div class="flex items-end gap-3 mb-6">
                            <span class="price-new">Rs. 45,999</span>
                        </div>
                        <div class="flex flex-col gap-2">
                            <button class="btn-primary w-full py-2 rounded-lg">Add to Cart</button>
                            <a href="{{ route('product.index', ['category' => 'refrigerators']) }}"
                                class="btn-outline w-center text-sm py-2 rounded-lg text-center font-semibold">View
                                Details</a>
                        </div>
                    </div>
                </div>
                <!-- Repeat 3 more times with different images -->
                <div class="product-card bg-white rounded-2xl shadow-md overflow-hidden flex flex-col">
                    <div class="relative h-64">
                        <img src="{{ asset('images/washing-machine.png') }}"
                            alt="Turbo Washer" class="w-full h-full object-contain p-4" loading="lazy">
                    </div>
                    <div class="p-6 flex-grow">
                        <h3 class="font-bold text-lg mb-2 line-clamp-2">Front-load Turbo Clean Washing
                            Machine</h3>
                        <div class="flex items-end gap-3 mb-6">
                            <span class="price-new">Rs. 38,500</span>
                        </div>
                        <div class="flex flex-col gap-2">
                            <button class="btn-primary w-full py-2 rounded-lg">Add to Cart</button>
                            <a href="{{ route('product.index', ['category' => 'washing-machines']) }}"
                                class="btn-outline w-center text-sm py-2 rounded-lg text-center font-semibold">View
                                Details</a>
                        </div>
                    </div>
                </div>
                <div class="product-card bg-white rounded-2xl shadow-md overflow-hidden flex flex-col">
                    <div class="relative h-64">
                        <img src="{{ asset('images/oven.png') }}" alt="Digital Oven"
                            class="w-full h-full object-contain p-4" loading="lazy">
                    </div>
                    <div class="p-6 flex-grow">
                        <h3 class="font-bold text-lg mb-2 line-clamp-2">Multi-function Digital Microwave
                            Oven</h3>
                        <div class="flex items-end gap-3 mb-6">
                            <span class="price-new">Rs. 12,499</span>
                        </div>
                        <div class="flex flex-col gap-2">
                            <button class="btn-primary w-full py-2 rounded-lg">Add to Cart</button>
                            <a href="{{ route('product.index', ['category' => 'microwave-ovens']) }}"
                                class="btn-outline w-center text-sm py-2 rounded-lg text-center font-semibold">View
                                Details</a>
                        </div>
                    </div>
                </div>
                <div class="product-card bg-white rounded-2xl shadow-md overflow-hidden flex flex-col">
                    <div class="relative h-64">
                        <img src="{{ asset('images/smart-tv.png') }}"
                            alt="4K Android TV" class="w-full h-full object-contain p-4" loading="lazy">
                    </div>
                    <div class="p-6 flex-grow">
                        <h3 class="font-bold text-lg mb-2 line-clamp-2">55" Ultra HD 4K Android Smart TV
                        </h3>
                        <div class="flex items-end gap-3 mb-6">
                            <span class="price-new">Rs. 62,999</span>
                        </div>
                        <div class="flex flex-col gap-2">
                            <button class="btn-primary w-full py-2 rounded-lg">Add to Cart</button>
                            <a href="{{ route('product.index', ['category' => 'smart-tvs']) }}"
                                class="btn-outline w-center text-sm py-2 rounded-lg text-center font-semibold">View
                                Details</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Why ElectronicPasal Section -->
    <section class="py-24 bg-trust-section">
        <div class="max-w-7xl mx-auto px-4">
            <div class="text-center mb-20">
                <h2 class="text-4xl md:text-5xl font-extrabold text-gray-900 mb-4">Why Choose
                    ElectronicPasal?</h2>
                <p class="text-gray-500 text-lg max-w-2xl mx-auto">Experience the best in home appliance
                    shopping with our customer-first approach and commitment to quality.</p>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-8">
                <!-- Card 1: Modern Appliances -->
                <div class="trust-card text-center">
                    <div class="trust-icon grad-teal">🍳</div>
                    <h3 class="text-xl font-bold mb-3">Modern Appliances</h3>
                    <p class="text-gray-500">Premium selection of Ovens, Refrigerators, and more for your
                        modern home.</p>
                </div>

                <!-- Card 2: Genuine Products -->
                <div class="trust-card text-center">
                    <div class="trust-icon grad-green">🛡️</div>
                    <h3 class="text-xl font-bold mb-3">Genuine Products</h3>
                    <p class="text-gray-500">100% authentic products with manufacturer warranty and quality
                        assurance.</p>
                </div>

                <!-- Card 3: Secure Payment -->
                <div class="trust-card text-center">
                    <div class="trust-icon grad-orange">💳</div>
                    <h3 class="text-xl font-bold mb-3">Secure Payment</h3>
                    <p class="text-gray-500">Safe and trusted payment options including eSewa, Khalti, and
                        Cash on Delivery.</p>
                </div>

                <!-- Card 4: 24/7 Support -->
                <div class="trust-card text-center">
                    <div class="trust-icon grad-red">🎧</div>
                    <h3 class="text-xl font-bold mb-3">24/7 Support</h3>
                    <p class="text-gray-500">Our dedicated support team is available around the clock to
                        assist you with any queries.</p>
                </div>
            </div>
        </div>
    </section>
@endsection
