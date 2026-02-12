<header class="bg-white shadow sticky top-0 z-50">
    <div class="max-w-7xl mx-auto px-4 py-4 flex items-center justify-between">
        <!-- Logo -->
        <a href="{{ route('home') }}" class="text-2xl font-bold text-gray-800 flex items-center gap-2">
            <span class="text-teal-600">⚡</span> ElectronicPasal
        </a>

        <!-- Main Navigation Links (Centered) -->
        <nav class="flex-1 flex justify-center">
            <ul class="flex items-center gap-8 m-0 p-0">
                <li class="m-0 p-0"><a href="{{ route('home') }}" class="text-gray-600 hover:text-teal-600 font-medium transition">Home</a></li>
                <li class="m-0 p-0"><a href="{{ route('product.index') }}" class="text-gray-600 hover:text-teal-600 font-medium transition">Products</a></li>
                <li class="m-0 p-0"><a href="{{ route('contact') }}" class="text-gray-600 hover:text-teal-600 font-medium transition">Contact</a></li>
                <li class="m-0 p-0"><a href="{{ route('about') }}" class="text-gray-600 hover:text-teal-600 font-medium transition">About Us</a></li>
            </ul>
        </nav>

        <!-- Action Buttons (Right Side) -->
        <div class="flex items-center gap-4">
            @guest
                <a href="{{ route('login') }}" class="flex items-center text-gray-600 hover:text-teal-600 font-medium transition">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 16l-4-4m0 0l4-4m-4 4h14m-5 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h7a3 3 0 013 3v1" />
                    </svg>
                    Login
                </a>
                <a href="{{ route('register') }}" class="flex items-center btn-primary px-4 py-2 rounded-lg text-white font-bold hover:shadow-lg transition">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M18 9v3m0 0v3m0-3h3m-3 0h-3m-2-5a4 4 0 11-8 0 4 4 0 018 0zM3 20a6 6 0 0112 0v1H3v-1z" />
                    </svg>
                    Register
                </a>
            @endguest

            @auth
                @if(Auth::user()->role === 'admin')
                    <a href="{{ route('dashboard') }}" class="text-gray-600 hover:text-teal-600 font-medium transition">Dashboard</a>
                    <a href="{{ route('admin.products.index') }}" class="text-gray-600 hover:text-teal-600 font-medium transition">Manage Products</a>
                @endif
                <form action="{{ route('logout') }}" method="POST" class="inline m-0">
                    @csrf
                    <button type="submit" class="flex items-center text-red-500 hover:text-red-700 font-medium transition">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1" />
                        </svg>
                        Logout
                    </button>
                </form>
            @endauth
        </div>
    </div>
</header>

<style>
    /* Add this locally if style.css isn't loading or doesn't have these utils yet */
    .btn-primary {
        background: linear-gradient(135deg, #0d9488 0%, #0f766e 100%);
    }
</style>
