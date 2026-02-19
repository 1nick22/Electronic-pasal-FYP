<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Buy Home Appliances in Nepal – ElectronicPasal')</title>
    <meta name="description"
        content="@yield('meta_description', 'Shop genuine home appliances in Nepal at the best prices. Refrigerators, washing machines, ovens, TVs and more from ElectronicPasal.')">
    <meta name="keywords"
        content="Buy Home Appliances in Nepal, Electronics Store in Nepal, Refrigerators Nepal, Washing Machines Nepal">
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;600;700;800&display=swap"
        rel="stylesheet">
</head>

<body class="bg-white flex flex-col min-h-screen">

    <!-- Include Header -->
    @include('partials.header')

    <main class="flex-grow">
        @yield('content')
    </main>

    <!-- Include Footer -->
    @include('partials.footer')

    @stack('scripts')

    <!-- Login Required Modal -->
    <div id="loginModal" class="login-modal-overlay" style="display: none;" onclick="if(event.target===this) closeLoginModal()">
        <div class="login-modal-card">
            <!-- Lock Icon -->
            <div class="login-modal-icon">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8 text-teal-600" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z" />
                </svg>
            </div>
            <!-- Message -->
            <h3 class="text-xl font-bold text-gray-900 mb-2">Login Required</h3>
            <p class="text-gray-500 mb-6 text-sm">Please login to add items to your cart.</p>
            <!-- Action Buttons -->
            <div class="flex gap-3 w-full">
                <button onclick="closeLoginModal()" class="flex-1 px-4 py-2.5 border border-gray-300 text-gray-700 rounded-xl font-medium hover:bg-gray-50 transition-colors">
                    Cancel
                </button>
                <a href="{{ route('login') }}" class="flex-1 px-4 py-2.5 bg-teal-600 text-white rounded-xl font-bold text-center hover:bg-teal-700 transition-colors shadow-lg shadow-teal-200">
                    Login
                </a>
            </div>
        </div>
    </div>

    <script>
        // Auth state from Laravel Blade
        var isLoggedIn = @auth true @else false @endauth;

        function handleAddToCart(event) {
            if (!isLoggedIn) {
                event.preventDefault();
                event.stopPropagation();
                document.getElementById('loginModal').style.display = 'flex';
                return false;
            }
            // If logged in, allow normal behavior (future cart logic)
        }

        function closeLoginModal() {
            document.getElementById('loginModal').style.display = 'none';
        }
    </script>

</body>

</html>
