<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\CheckoutController;

// Homepage
Route::get('/', [HomeController::class, 'index'])->name('home');

// Dashboard
Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');
Route::get('/products', [ProductController::class, 'index'])->name('products.index');
Route::get('/products/category/{slug}', [ProductController::class, 'byCategory'])->name('products.by-category');
Route::get('/products/{id}', [ProductController::class, 'detail'])->name('products.detail');

// Checkout
Route::get('/checkout/{id}', [CheckoutController::class, 'index'])->name('checkout.index');
Route::post('/checkout/process', [CheckoutController::class, 'process'])->name('checkout.process');
Route::post('/checkout/process', [CheckoutController::class, 'process'])->middleware('auth');
Route::get('/checkout/{id}/success', [CheckoutController::class, 'success'])->name('checkout.success');

// Upload gambar produk
Route::post('/products/{product}/images', 
    [ProductController::class, 'storeImage'])
    ->name('products.images.store');

// Profile
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

// Keranjang dummy
Route::post('/cart/add/{id}', function() {
    return back()->with('success', 'Produk ditambahkan ke keranjang (dummy)');
})->name('cart.add');

// Route auth
require __DIR__.'/auth.php';
