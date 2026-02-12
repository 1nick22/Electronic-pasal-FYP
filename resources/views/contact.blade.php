@extends('layouts.app')

@section('title', 'Contact Us - ElectronicPasal')

@section('content')
<div class="bg-gradient-to-br from-blue-50 to-indigo-50 py-16">
    <div class="container mx-auto px-4">
        <div class="max-w-6xl mx-auto">
            <!-- Header -->
            <div class="text-center mb-12">
                <h1 class="text-4xl font-bold text-gray-900 mb-4">Get In Touch</h1>
                <p class="text-lg text-gray-600">We'd love to hear from you. Send us a message and we'll respond as soon as possible.</p>
            </div>

            <div class="grid grid-cols-1 lg:grid-cols-2 gap-8">
                <!-- Contact Information -->
                <div class="bg-white rounded-2xl shadow-lg p-8 border border-gray-100">
                    <h2 class="text-2xl font-bold text-gray-900 mb-6">Contact Information</h2>
                    
                    <div class="space-y-6">
                        <!-- Email -->
                        <div class="flex items-start space-x-4">
                            <div class="flex-shrink-0 w-12 h-12 bg-blue-100 rounded-lg flex items-center justify-center">
                                <svg class="w-6 h-6 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"></path>
                                </svg>
                            </div>
                            <div>
                                <h3 class="font-semibold text-gray-900 mb-1">Email</h3>
                                <a href="mailto:admin@electronicpasal.com" class="text-blue-600 hover:underline">admin@electronicpasal.com</a>
                            </div>
                        </div>

                        <!-- Phone -->
                        <div class="flex items-start space-x-4">
                            <div class="flex-shrink-0 w-12 h-12 bg-green-100 rounded-lg flex items-center justify-center">
                                <svg class="w-6 h-6 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"></path>
                                </svg>
                            </div>
                            <div>
                                <h3 class="font-semibold text-gray-900 mb-1">Phone</h3>
                                <a href="tel:+9779806699719" class="text-blue-600 hover:underline">+977 980-669-9719</a>
                            </div>
                        </div>

                        <!-- Address -->
                        <div class="flex items-start space-x-4">
                            <div class="flex-shrink-0 w-12 h-12 bg-purple-100 rounded-lg flex items-center justify-center">
                                <svg class="w-6 h-6 text-purple-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"></path>
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"></path>
                                </svg>
                            </div>
                            <div>
                                <h3 class="font-semibold text-gray-900 mb-1">Office Address</h3>
                                <p class="text-gray-600">Gharipatan-17, Pokhara<br>Nepal - 44600</p>
                            </div>
                        </div>

                        <!-- Business Hours -->
                        <div class="flex items-start space-x-4">
                            <div class="flex-shrink-0 w-12 h-12 bg-orange-100 rounded-lg flex items-center justify-center">
                                <svg class="w-6 h-6 text-orange-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                </svg>
                            </div>
                            <div>
                                <h3 class="font-semibold text-gray-900 mb-1">Business Hours</h3>
                                <p class="text-gray-600">Sunday - Friday: 10:00 AM - 6:00 PM<br>Saturday: Closed</p>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Contact Form -->
                <div class="bg-white rounded-2xl shadow-lg p-8 border border-gray-100">
                    <h2 class="text-2xl font-bold text-gray-900 mb-6">Send Us a Message</h2>

                    @if(session('success'))
                        <div class="mb-6 bg-green-50 border border-green-200 text-green-800 px-4 py-3 rounded-lg flex items-start">
                            <svg class="w-5 h-5 mr-2 flex-shrink-0 mt-0.5" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"></path>
                            </svg>
                            <span>{{ session('success') }}</span>
                        </div>
                    @endif

                    <form id="contact-form" action="{{ route('contact') }}" method="POST" class="space-y-5">
                        @csrf

                        <!-- Name -->
                        <div>
                            <label for="name" class="block text-sm font-semibold text-gray-700 mb-2">Full Name *</label>
                            <input type="text" id="name" name="name" value="{{ old('name') }}" required
                                class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent transition @error('name') border-red-500 @enderror">
                            @error('name')
                                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>

                        <!-- Email -->
                        <div>
                            <label for="email" class="block text-sm font-semibold text-gray-700 mb-2">Email Address *</label>
                            <input type="email" id="email" name="email" value="{{ old('email') }}" required
                                class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent transition @error('email') border-red-500 @enderror">
                            <p id="email-error" class="mt-1 text-sm text-red-600 hidden">Please enter a valid email address (e.g., name@example.com)</p>
                            @error('email')
                                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>

                        <!-- Subject -->
                        <div>
                            <label for="subject" class="block text-sm font-semibold text-gray-700 mb-2">Subject *</label>
                            <input type="text" id="subject" name="subject" value="{{ old('subject') }}" required
                                class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent transition @error('subject') border-red-500 @enderror">
                            @error('subject')
                                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>

                        <!-- Message -->
                        <div>
                            <label for="message" class="block text-sm font-semibold text-gray-700 mb-2">Message *</label>
                            <textarea id="message" name="message" rows="5" required
                                class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent transition resize-none @error('message') border-red-500 @enderror">{{ old('message') }}</textarea>
                            @error('message')
                                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>

                        <!-- Submit Button -->
                        <button type="submit" id="submit-btn"
                            class="w-full bg-gradient-to-r from-blue-600 to-indigo-600 text-white font-semibold py-3 px-6 rounded-lg hover:from-blue-700 hover:to-indigo-700 transform hover:scale-[1.02] transition-all duration-200 shadow-lg disabled:opacity-50 disabled:cursor-not-allowed">
                            Send Message
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@push('scripts')
<script>
    document.addEventListener('DOMContentLoaded', function() {
        const form = document.getElementById('contact-form');
        const emailInput = document.getElementById('email');
        const emailError = document.getElementById('email-error');
        const submitBtn = document.getElementById('submit-btn');

        // Regex for strict email validation
        // user name section: allow dots, underscores, plus, hyphens
        // @ symbol
        // domain name section: allow hyphens
        // . symbol
        // extension: 2 or more letters
        const emailPattern = /^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$/;

        function validateEmail() {
            // Trim whitespace automatically
            const email = emailInput.value.trim();
            emailInput.value = email;
            
            if (email === '') {
                // Reset styling for empty field (required attribute will handle empty on submit)
                resetError();
                return false;
            }

            if (!emailPattern.test(email)) {
                showError();
                return false;
            } else {
                resetError();
                return true;
            }
        }

        function showError() {
            emailInput.classList.add('border-red-500', 'focus:ring-red-500', 'focus:border-red-500');
            emailInput.classList.remove('border-gray-300', 'focus:ring-blue-500', 'focus:border-transparent');
            emailError.classList.remove('hidden');
            submitBtn.disabled = true;
        }

        function resetError() {
            emailInput.classList.remove('border-red-500', 'focus:ring-red-500', 'focus:border-red-500');
            emailInput.classList.add('border-gray-300', 'focus:ring-blue-500', 'focus:border-transparent');
            emailError.classList.add('hidden');
            submitBtn.disabled = false;
        }

        // Validate on input
        emailInput.addEventListener('input', validateEmail);

        // Validate on blur (when user leaves the field)
        emailInput.addEventListener('blur', validateEmail);

        // Prevent submission if invalid
        form.addEventListener('submit', function(e) {
            if (!validateEmail()) {
                e.preventDefault();
                showError(); // Ensure error is visible
                emailInput.focus();
            }
        });
    });
</script>
@endpush
