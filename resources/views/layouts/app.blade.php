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

</body>

</html>
