<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>ElectronicPasal - Welcome</title>
    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;600;700&display=swap" rel="stylesheet">
    <style>
        body {
            font-family: 'Inter', sans-serif;
            margin: 0;
            display: flex;
            align-items: center;
            justify-content: center;
            min-height: 100vh;
            background: linear-gradient(135deg, #0f172a 0%, #1e293b 100%);
            color: #f8fafc;
        }
        .container {
            text-align: center;
            padding: 2rem;
            background: rgba(255, 255, 255, 0.05);
            backdrop-filter: blur(10px);
            border-radius: 1.5rem;
            border: 1px solid rgba(255, 255, 255, 0.1);
            box-shadow: 0 25px 50px -12px rgba(0, 0, 0, 0.5);
            max-width: 600px;
        }
        h1 {
            font-size: 3rem;
            margin-bottom: 1rem;
            background: linear-gradient(to right, #2dd4bf, #3b82f6);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
        }
        p {
            font-size: 1.25rem;
            color: #94a3b8;
            margin-bottom: 2rem;
        }
        .links {
            display: flex;
            gap: 1rem;
            justify-content: center;
        }
        .btn {
            padding: 0.75rem 1.5rem;
            border-radius: 0.5rem;
            font-weight: 600;
            text-decoration: none;
            transition: all 0.3s ease;
        }
        .btn-primary {
            background: #3b82f6;
            color: white;
        }
        .btn-primary:hover {
            background: #2563eb;
            transform: translateY(-2px);
        }
        .btn-secondary {
            background: transparent;
            color: #f8fafc;
            border: 1px solid #475569;
        }
        .btn-secondary:hover {
            background: rgba(255, 255, 255, 0.1);
            transform: translateY(-2px);
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>ElectronicPasal</h1>
        <p>Your one-stop destination for the latest electronics.</p>
        <div class="links">
            @if (Route::has('login'))
                @auth
                    <a href="{{ url('/home') }}" class="btn btn-primary">Home</a>
                @else
                    <a href="{{ route('login') }}" class="btn btn-primary">Login</a>
                    @if (Route::has('register'))
                        <a href="{{ route('register') }}" class="btn btn-secondary">Register</a>
                    @endif
                @endauth
            @endif
        </div>
    </div>
</body>
</html>
