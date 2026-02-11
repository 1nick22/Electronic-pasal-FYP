<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard - ElectronicPasal</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
        body {
            background-color: #f3f4f6;
            font-family: 'Inter', sans-serif;
        }
    </style>
</head>
<body class="bg-gray-100">
    <nav class="bg-white shadow-lg">
        <div class="max-w-7xl mx-auto px-4">
            <div class="flex justify-between h-16">
                <div class="flex items-center">
                    <span class="text-2xl font-bold text-blue-600">ElectronicPasal</span>
                </div>
                <div class="flex items-center space-x-4">
                    <span class="text-gray-700">Welcome, {{ Auth::user()->name }}</span>
                    <form action="{{ route('logout') }}" method="POST">
                        @csrf
                        <button type="submit" class="flex items-center gap-2 bg-red-500 hover:bg-red-600 text-white px-4 py-2 rounded-md text-sm font-medium transition-colors duration-200">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1" />
                            </svg>
                            Logout
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </nav>

    <main class="max-w-7xl mx-auto py-12 px-4 sm:px-6 lg:px-8">
        <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg p-8 text-center">
            <h1 class="text-4xl font-extrabold text-gray-900 mb-4">Dashboard</h1>
            <p class="text-lg text-gray-600">You are logged in! This is your protected area.</p>
            
            <div class="mt-10 grid grid-cols-1 gap-6 sm:grid-cols-2 lg:grid-cols-3">
                <div class="p-6 bg-blue-50 rounded-lg border border-blue-100">
                    <h3 class="text-lg font-semibold text-blue-800">My Orders</h3>
                    <p class="text-blue-600 mt-2">View and track your purchases.</p>
                </div>
                <div class="p-6 bg-green-50 rounded-lg border border-green-100">
                    <h3 class="text-lg font-semibold text-green-800">My Profile</h3>
                    <p class="text-green-600 mt-2">Update your personal information.</p>
                </div>
                <div class="p-6 bg-purple-50 rounded-lg border border-purple-100">
                    <h3 class="text-lg font-semibold text-purple-800">Support</h3>
                    <p class="text-purple-600 mt-2">Get help with your queries.</p>
                </div>
            </div>
        </div>
    </main>
</body>
</html>
