<header class="bg-white shadow sticky top-0 z-50">
    <div class="max-w-7xl mx-auto px-4 py-4">
        <div class="grid grid-cols-3 items-center gap-4">
            <!-- Logo (Left) -->
            <div class="flex justify-start">
                <a href="{{ route('home') }}" class="text-2xl font-bold text-gray-800 flex items-center gap-2">
                    <span class="text-teal-600">⚡</span> ElectronicPasal
                </a>
            </div>

            <!-- Main Navigation Links (Center) -->
            <nav class="flex justify-center">
                <ul class="flex items-center gap-8 m-0 p-0">
                    <li class="m-0 p-0"><a href="{{ route('home') }}" class="text-gray-600 hover:text-teal-600 font-medium transition">Home</a></li>
                    <li class="m-0 p-0"><a href="{{ route('product.index') }}" class="text-gray-600 hover:text-teal-600 font-medium transition">Products</a></li>
                    <li class="m-0 p-0"><a href="{{ route('contact') }}" class="text-gray-600 hover:text-teal-600 font-medium transition">Contact</a></li>
                    <li class="m-0 p-0"><a href="{{ route('about') }}" class="text-gray-600 hover:text-teal-600 font-medium transition">About Us</a></li>
                </ul>
            </nav>

            <!-- Action Buttons (Right) -->
            <div class="flex items-center justify-end gap-4">
                <!-- Shopping Cart Icon with Badge (Visible to all users) -->
                <a href="#" class="relative flex items-center text-gray-600 hover:text-teal-600 font-medium transition">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13L5.4 5M7 13l-2.293 2.293c-.63.63-.184 1.707.707 1.707H17m0 0a2 2 0 100 4 2 2 0 000-4zm-8 2a2 2 0 11-4 0 2 2 0 014 0z" />
                    </svg>
                    <!-- Notification Badge -->
                    <span class="absolute -top-2 -right-2 bg-red-500 text-white text-xs font-bold rounded-full h-5 w-5 flex items-center justify-center">0</span>
                </a>
                
                @guest
                    <a href="{{ route('login') }}" class="flex items-center text-gray-600 hover:text-teal-600 font-medium transition whitespace-nowrap">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 16l-4-4m0 0l4-4m-4 4h14m-5 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h7a3 3 0 013 3v1" />
                        </svg>
                        Login
                    </a>
                    <a href="{{ route('register') }}" class="flex items-center btn-primary px-4 py-2 rounded-lg text-white font-bold hover:shadow-lg transition whitespace-nowrap">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M18 9v3m0 0v3m0-3h3m-3 0h-3m-2-5a4 4 0 11-8 0 4 4 0 018 0zM3 20a6 6 0 0112 0v1H3v-1z" />
                        </svg>
                        Register
                    </a>
                @endguest

                @auth
                    @if(Auth::user()->role === 'admin')
                        <a href="{{ route('dashboard') }}" class="text-gray-600 hover:text-teal-600 font-medium transition whitespace-nowrap">Dashboard</a>
                        <a href="{{ route('admin.products.index') }}" class="text-gray-600 hover:text-teal-600 font-medium transition whitespace-nowrap">Manage Products</a>
                    @endif
                    <form action="{{ route('logout') }}" method="POST" class="inline m-0">
                        @csrf
                        <button type="submit" class="flex items-center text-red-500 hover:text-red-700 font-medium transition whitespace-nowrap">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1" />
                            </svg>
                            Logout
                        </button>
                    </form>
                @endauth
            </div>
        </div>
    </div>
</header>

<style>
    /* Add this locally if style.css isn't loading or doesn't have these utils yet */
    .btn-primary {
        background: linear-gradient(135deg, #0d9488 0%, #0f766e 100%);
    }
</style>
