<?php

use App\Http\Controllers\ProductController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\ProductCategoryController;
use App\Http\Controllers\CheckoutController;
use App\Http\Controllers\TransactionController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

// Homepage
Route::get('/', [HomeController::class, 'index'])->name('home');

// Category
Route::get('/category/{slug}', [ProductCategoryController::class, 'show'])->name('category.show');

// Product Detail
Route::get('/product/{slug}', [ProductController::class, 'show'])->name('product.show');

// Cart
Route::post('/cart/add/{product}', [CartController::class, 'addToCart'])->name('cart.add');
Route::get('/cart', [CartController::class, 'viewCart'])->name('cart.view');
Route::post('/cart/update/{product}', [CartController::class, 'updateCart'])->name('cart.update');
Route::delete('/cart/remove/{product}', [CartController::class, 'removeFromCart'])->name('cart.remove');

// Checkout + Transaction (auth)
Route::middleware('auth')->group(function () {
    Route::get('/checkout', [CheckoutController::class, 'index'])->name('checkout.index');
    Route::post('/checkout/process', [CheckoutController::class, 'process'])->name('checkout.process');

    Route::get('/transactions', [TransactionController::class, 'index'])->name('transaction.index');
    Route::get('/transaction/{id}', [TransactionController::class, 'show'])->name('transaction.show');
    Route::get('/transaction/{id}/success', [TransactionController::class, 'success'])->name('transaction.success');

    // Profile
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';

