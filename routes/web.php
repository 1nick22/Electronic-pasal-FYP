<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;

Route::get('/', function () {
    $dealProducts = \App\Models\Product::whereIn('id', [33, 30, 31, 32])->get()->keyBy('id');
    return view('home', compact('dealProducts'));
})->name('home');

Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');

use App\Http\Controllers\ProductController;

Route::get('/products', [ProductController::class, 'index'])->name('product.index');
Route::get('/products/{id}', [ProductController::class, 'show'])->name('product.show');

Route::get('/about', function () {
    return view('about');
})->name('about');

use App\Http\Controllers\ContactController;

Route::get('/contact', [ContactController::class, 'index'])->name('contact');
Route::post('/contact', [ContactController::class, 'store']);

Route::post('login', [LoginController::class, 'login']);
Route::post('logout', [LoginController::class, 'logout'])->name('logout');

Route::get('register', [RegisterController::class, 'showRegistrationForm'])->name('register');
Route::post('register', [RegisterController::class, 'register']);

// Placeholder for password reset route to prevent error in login.blade.php
Route::get('password/reset', function () {
    return "Password reset functionality coming soon.";
})->name('password.request');


// Dashboard route for post-login redirect - Updated to use AdminController
use App\Http\Controllers\AdminController;

Route::get('dashboard', [AdminController::class, 'index'])->middleware(['auth', 'admin'])->name('dashboard');

use App\Http\Controllers\AdminProductController;
use App\Http\Controllers\AdminContactController;

Route::prefix('admin')->middleware(['auth', 'admin'])->name('admin.')->group(function () {
    Route::resource('products', AdminProductController::class);
    
    // Contact Messages
    Route::get('contact-messages', [AdminContactController::class, 'index'])->name('contact-messages.index');
    Route::get('contact-messages/{id}', [AdminContactController::class, 'show'])->name('contact-messages.show');
    Route::delete('contact-messages/{id}', [AdminContactController::class, 'destroy'])->name('contact-messages.destroy');
});
