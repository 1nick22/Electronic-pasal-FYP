<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Login - ElectronicPasal</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
</head>

<body>

    <main class="container mx-auto py-8 px-4">
        <div class="auth-form">
            <h2 class="text-2xl font-bold mb-6 text-center">Login to Your Account</h2>

            @if(session('error'))
                <div
                    class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded mb-4 text-center">
                    {{ session('error') }}
                </div>
            @endif

            @if(session('signup_success'))
                <div
                    class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded mb-4 text-center">
                    Signup successful! Please login with your new credentials.
                </div>
            @endif

            <form action="{{ route('login') }}" method="POST">
                @csrf

                <div class="form-group">
                    <label for="email" class="form-label">Email</label>
                    <input type="email" id="email" name="email"
                        class="form-input @error('email') border-red-500 @enderror" required
                        value="{{ old('email') }}">
                    @error('email')
                        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <div class="form-group mt-4">
                    <label for="password" class="form-label">Password</label>
                    <input type="password" id="password" name="password"
                        class="form-input @error('password') border-red-500 @enderror" required>
                    @error('password')
                        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <div class="flex justify-between items-center mb-6 mt-4">
                    <div>
                        <input type="checkbox" id="remember" name="remember" {{ old('remember') ? 'checked' : '' }}>
                        <label for="remember" class="ml-1">Remember me</label>
                    </div>
                    <a href="{{ route('password.request') }}" class="text-primary">Forgot Password?</a>
                </div>

                <button type="submit" class="btn-primary w-full">Login</button>
            </form>

            <div class="text-center mt-4">
                <p>Don't have an account? <a href="{{ route('register') }}" class="text-primary">Register</a></p>
            </div>
        </div>
    </main>

</body>

</html>
