<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Register - ElectronicPasal</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
</head>

<body>

    <main class="container mx-auto py-8 px-4">
        <div class="auth-form max-w-md mx-auto bg-white p-8 rounded shadow">
            <h2 class="text-2xl font-bold mb-6 text-center">Create an Account</h2>

            <form action="{{ route('register') }}" method="POST">
                @csrf

                <div class="grid grid-cols-2 gap-4 mb-4">
                    <div class="form-group">
                        <label for="first_name" class="block text-sm font-medium text-gray-700">First Name</label>
                        <input type="text" id="first_name" name="first_name"
                            class="mt-1 block w-full border border-gray-300 rounded shadow-sm py-2 px-3 focus:outline-none focus:ring-primary focus:border-primary @error('first_name') border-red-500 @enderror" required
                            value="{{ old('first_name') }}">
                        @error('first_name')
                            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="last_name" class="block text-sm font-medium text-gray-700">Last Name</label>
                        <input type="text" id="last_name" name="last_name"
                            class="mt-1 block w-full border border-gray-300 rounded shadow-sm py-2 px-3 focus:outline-none focus:ring-primary focus:border-primary @error('last_name') border-red-500 @enderror" required
                            value="{{ old('last_name') }}">
                        @error('last_name')
                            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>
                </div>

                <div class="form-group mb-4">
                    <label for="email" class="block text-sm font-medium text-gray-700">Email</label>
                    <input type="email" id="email" name="email"
                        class="mt-1 block w-full border border-gray-300 rounded shadow-sm py-2 px-3 focus:outline-none focus:ring-primary focus:border-primary @error('email') border-red-500 @enderror" required
                        value="{{ old('email') }}">
                    @error('email')
                        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <div class="form-group mb-4">
                    <label for="password" class="block text-sm font-medium text-gray-700">Password</label>
                    <input type="password" id="password" name="password"
                        class="mt-1 block w-full border border-gray-300 rounded shadow-sm py-2 px-3 focus:outline-none focus:ring-primary focus:border-primary @error('password') border-red-500 @enderror" required>
                    @error('password')
                        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <div class="form-group mb-6">
                    <label for="password_confirmation" class="block text-sm font-medium text-gray-700">Confirm Password</label>
                    <input type="password" id="password_confirmation" name="password_confirmation"
                        class="mt-1 block w-full border border-gray-300 rounded shadow-sm py-2 px-3 focus:outline-none focus:ring-primary focus:border-primary" required>
                </div>

                <button type="submit" class="w-full bg-blue-600 text-white py-2 px-4 rounded hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2">Register</button>
            </form>

            <div class="text-center mt-4">
                <p class="text-sm text-gray-600">Already have an account? <a href="{{ route('login') }}" class="text-blue-600 hover:text-blue-500">Login</a></p>
            </div>
        </div>
    </main>

</body>

</html>
