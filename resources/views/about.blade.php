<!DOCTYPE html>
<html lang="en" class="scroll-smooth">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>About Us - ElectronicPasal</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;600;700;800&display=swap" rel="stylesheet">
</head>

<body class="bg-white flex flex-col min-h-screen text-gray-800">

    <!-- Header -->
    @include('partials.header')

    <main class="flex-grow">
        <!-- 1. Hero Section -->
        <section class="relative bg-teal-gradient py-32 md:py-48 overflow-hidden">
            <div
                class="absolute inset-0 opacity-10 bg-[url('https://www.transparenttextures.com/patterns/cubes.png')] pointer-events-none">
            </div>
            <div class="container mx-auto px-4 relative z-10 text-center">
                <h1 class="text-5xl md:text-7xl font-extrabold text-white mb-6 tracking-tight fade-in-up">
                    About <span class="text-teal-300">ElectronicPasal</span>
                </h1>
                <p class="text-xl md:text-2xl text-teal-50 max-w-3xl mx-auto font-medium fade-in-up delay-200">
                    Nepal’s Trusted Partner for Premium Home Appliances
                </p>
            </div>
        </section>

        <!-- 2. Statistics Section -->
        <section class="py-20 bg-white">
            <div class="container mx-auto px-4">
                <div class="grid grid-cols-2 lg:grid-cols-4 gap-8">
                    <!-- Stat 1 -->
                    <div class="stat-card text-center fade-in-up">
                        <div class="stat-circle mx-auto mb-4">
                            <svg class="w-10 h-10 text-teal-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z">
                                </path>
                            </svg>
                        </div>
                        <h3 class="text-3xl font-extrabold text-gray-900">5000+</h3>
                        <p class="text-gray-500 font-medium">Happy Customers</p>
                    </div>
                    <!-- Stat 2 -->
                    <div class="stat-card text-center fade-in-up delay-100">
                        <div class="stat-circle mx-auto mb-4">
                            <svg class="w-10 h-10 text-teal-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z">
                                </path>
                            </svg>
                        </div>
                        <h3 class="text-3xl font-extrabold text-gray-900">10+ Years</h3>
                        <p class="text-gray-500 font-medium">Experience</p>
                    </div>
                    <!-- Stat 3 -->
                    <div class="stat-card text-center fade-in-up delay-200">
                        <div class="stat-circle mx-auto mb-4">
                            <svg class="w-10 h-10 text-teal-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10">
                                </path>
                            </svg>
                        </div>
                        <h3 class="text-3xl font-extrabold text-gray-900">50+</h3>
                        <p class="text-gray-500 font-medium">Product Varieties</p>
                    </div>
                    <!-- Stat 4 -->
                    <div class="stat-card text-center fade-in-up delay-300">
                        <div class="stat-circle mx-auto mb-4">
                            <svg class="w-10 h-10 text-teal-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M14.828 14.828a4 4 0 01-5.656 0M9 10h.01M15 10h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z">
                                </path>
                            </svg>
                        </div>
                        <h3 class="text-3xl font-extrabold text-gray-900">99%</h3>
                        <p class="text-gray-500 font-medium">Satisfaction</p>
                    </div>
                </div>
            </div>
        </section>

        <!-- 3. Our Story Section -->
        <section class="py-24 bg-gray-50">
            <div class="container mx-auto px-4">
                <div class="flex flex-col lg:flex-row items-center gap-16">
                    <div class="lg:w-1/2">
                        <h2 class="text-4xl font-extrabold text-gray-900 mb-6">Our Journey</h2>
                        <p class="text-lg text-gray-600 leading-relaxed mb-6">
                            Founded with a vision to redefine home appliance shopping in Nepal, ElectronicPasal
                            has evolved from a small retail outlet into a leading destination for premium
                            electronics. Our story is one of unwavering commitment to excellence and a passion
                            for bringing the latest global innovations to Nepali households.
                        </p>
                        <p class="text-lg text-gray-600 leading-relaxed mb-8">
                            We specialize in curated selections of high-performance ovens, microwaves,
                            refrigerators, and washing machines from world renowned brands. Every product in
                            our catalog undergoes rigorous quality checks to ensure it meets our standards of
                            durability and efficiency.
                        </p>
                        <div class="flex gap-4">
                            <div class="w-1 bg-teal-600"></div>
                            <p class="italic text-gray-500 text-lg">"We don't just sell appliances; we provide
                                the comfort and technology that makes a house a home."</p>
                        </div>
                    </div>
                    <div class="lg:w-1/2">
                        <div class="relative group">
                            <div
                                class="absolute -inset-4 bg-teal-100 rounded-2xl transform rotate-2 transition group-hover:rotate-0">
                            </div>
                            <img src="{{ asset('images/showroom.png') }}" alt="ElectronicPasal Showroom"
                                class="relative rounded-2xl shadow-2xl w-full h-[500px] object-cover">
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- 4. Core Values Section -->
        <section class="py-24 bg-white">
            <div class="container mx-auto px-4">
                <h2 class="text-center text-4xl font-extrabold mb-16 px-4">Our Core Values</h2>
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-8">
                    <!-- Value 1 -->
                    <div class="core-value-card p-8 rounded-2xl bg-white text-center">
                        <div class="w-16 h-16 bg-teal-50 rounded-2xl flex items-center justify-center mx-auto mb-6">
                            <svg class="w-8 h-8 text-teal-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z">
                                </path>
                            </svg>
                        </div>
                        <h3 class="text-xl font-extrabold mb-3">Quality Assurance</h3>
                        <p class="text-gray-500">Genuine certified products with multi-level quality checks
                            before delivery.</p>
                    </div>
                    <!-- Value 2 -->
                    <div class="core-value-card p-8 rounded-2xl bg-white text-center">
                        <div class="w-16 h-16 bg-teal-50 rounded-2xl flex items-center justify-center mx-auto mb-6">
                            <svg class="w-8 h-8 text-teal-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M17 8h2a2 2 0 012 2v6a2 2 0 01-2 2h-2v4l-4-4H9a1.994 1.994 0 01-1.414-.586m0 0L11 14h4a2 2 0 002-2V6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2v4l.586-.586z">
                                </path>
                            </svg>
                        </div>
                        <h3 class="text-xl font-extrabold mb-3 text-teal-600">Customer First</h3>
                        <p class="text-gray-500">Dedicated 24/7 support team always ready to assist with your
                            appliance needs.</p>
                    </div>
                    <!-- Value 3 -->
                    <div class="core-value-card p-8 rounded-2xl bg-white text-center">
                        <div
                            class="w-16 h-16 bg-orange-50 rounded-2xl flex items-center justify-center mx-auto mb-6 text-orange-600">
                            <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z">
                                </path>
                            </svg>
                        </div>
                        <h3 class="text-xl font-extrabold mb-3">Best Prices</h3>
                        <p class="text-gray-500">Unbeatable competitive pricing without compromising on premium
                            quality.</p>
                    </div>
                    <!-- Value 4 -->
                    <div class="core-value-card p-8 rounded-2xl bg-white text-center border-teal-500">
                        <div class="w-16 h-16 bg-teal-50 rounded-2xl flex items-center justify-center mx-auto mb-6">
                            <svg class="w-8 h-8 text-teal-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M13 10V3L4 14h7v7l9-11h-7z"></path>
                            </svg>
                        </div>
                        <h3 class="text-xl font-extrabold mb-3">Fast Delivery</h3>
                        <p class="text-gray-500">Quick and reliable delivery network covering all major cities
                            across Nepal.</p>
                    </div>
                </div>
            </div>
        </section>

        <!-- 5. Meet Our Team Section -->
        <section class="py-24 bg-teal-50">
    <div class="container mx-auto px-4">
        <h2 class="text-center text-4xl font-extrabold mb-16">Meet Our Visionary</h2>
        <div class="max-w-4xl mx-auto">
            <div class="team-card bg-white rounded-3xl shadow-xl overflow-hidden flex flex-col md:flex-row items-center">
                <div class="md:w-2/5 overflow-hidden">
                    <img src="{{ asset('images/Nikesh.png') }}" 
                        alt="Nikesh Chaudhary" 
                        class="team-portrait w-full h-[400px] object-cover">
                </div>
                <div class="md:w-3/5 p-12">
                    <div class="inline-block px-4 py-1 bg-teal-100 text-teal-700 rounded-full text-sm font-bold mb-4">
                        Founder & Owner</div>
                    <h3 class="text-3xl font-extrabold text-gray-900 mb-4">Nikesh Chaudhary</h3>
                    <p class="text-lg text-gray-600 leading-relaxed mb-6">
                        As the founder of ElectronicPasal, Nikesh leads with a passion for innovation 
                        and a deep understanding of the Nepali market. His vision is to make world-class 
                        home appliances accessible to every home in Nepal through transparent business 
                        practices and superior service.
                    </p>
                    <div class="flex space-x-4">
    <a href="https://www.instagram.com/_nickkk23_" target="_blank" class="text-teal-600 hover:text-pink-600 transition">
        <svg class="h-6 w-6" fill="currentColor" viewBox="0 0 24 24">
            <path d="M12 2.163c3.204 0 3.584.012 4.85.07 3.252.148 4.771 1.691 4.919 4.919.058 1.265.069 1.645.069 4.849 0 3.205-.012 3.584-.069 4.849-.149 3.225-1.664 4.771-4.919 4.919-1.266.058-1.644.07-4.85.07-3.204 0-3.584-.012-4.849-.07-3.26-.149-4.771-1.699-4.919-4.92-.058-1.265-.07-1.644-.07-4.849 0-3.204.013-3.583.07-4.849.149-3.227 1.664-4.771 4.919-4.919 1.266-.057 1.645-.069 4.849-.069zm0-2.163c-3.259 0-3.667.014-4.947.072-4.358.2-6.78 2.618-6.98 6.98-.059 1.281-.073 1.689-.073 4.948 0 3.259.014 3.668.072 4.948.2 4.358 2.618 6.78 6.98 6.98 1.281.058 1.689.072 4.948.072 3.259 0 3.668-.014 4.948-.072 4.354-.2 6.782-2.618 6.979-6.98.059-1.28.073-1.689.073-4.948 0-3.259-.014-3.667-.072-4.947-.196-4.354-2.617-6.78-6.979-6.98-1.281-.059-1.69-.073-4.949-.073zm0 5.838c-3.403 0-6.162 2.759-6.162 6.162s2.759 6.163 6.162 6.163 6.162-2.759 6.162-6.163c0-3.403-2.759-6.162-6.162-6.162zm0 10.162c-2.209 0-4-1.79-4-4 0-2.209 1.791-4 4-4s4 1.791 4 4c0 2.21-1.791 4-4 4zm6.406-11.845c-.796 0-1.441.645-1.441 1.44s.645 1.44 1.441 1.44c.795 0 1.439-.645 1.439-1.44s-.644-1.44-1.439-1.44z" />
        </svg>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

        <!-- 6. Mission & Vision Section -->
        <section class="py-24 bg-white">
            <div class="container mx-auto px-4">
                <div class="grid grid-cols-1 md:grid-cols-2 gap-12">
                    <!-- Mission Card -->
                    <div class="mission-card p-12 rounded-2xl">
                        <div class="text-teal-600 font-extrabold text-sm uppercase tracking-widest mb-4">Our
                            Mission</div>
                        <h3 class="text-3xl font-extrabold mb-6">Empowering Households through Quality
                            Technology</h3>
                        <p class="text-lg text-gray-600 leading-relaxed text-left">
                            Our mission is to empower every household in Nepal by providing access to premium,
                            energy-efficient home appliances at competitive prices, backed by a service
                            experience that exceeds expectations.
                        </p>
                    </div>
                    <!-- Vision Card -->
                    <div class="vision-card p-12 rounded-2xl">
                        <div class="text-orange-600 font-extrabold text-sm uppercase tracking-widest mb-4">Our
                            Vision</div>
                        <h3 class="text-3xl font-extrabold mb-6">Becoming Nepal’s Most Trusted Destination</h3>
                        <p class="text-lg text-gray-600 leading-relaxed text-left">
                            We envision becoming the foremost trusted destination for home appliances in Nepal,
                            recognized for our commitment to authenticity, service innovation, and sustainable
                            business growth.
                        </p>
                    </div>
                </div>
            </div>
        </section>
    </main>

    <!-- Footer -->
    @include('partials.footer')

</body>

</html>
