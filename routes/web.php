<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Seller\SellerDashboardController;
use App\Http\Controllers\Seller\ProductCategoryController;
use App\Http\Controllers\Seller\ProductController;
use App\Http\Controllers\Seller\OrderController;

Route::get('/', function () {
    return view('welcome');
});

//ini dibuat agar halaman welcome tidak bisa diakses kalo user belum login
// Route::get('/', function () {
//     return view('welcome');
// }) ->middleware('auth') ;

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    }
);
Route::get('/profile', function () {
    return view('profile'); // buat halaman ini nanti
})->name('profile')->middleware('auth');

// tambah keranjang : 
Route::post('/cart/add/{id}', function() {
    return back()->with('success', 'Produk ditambahkan ke keranjang (dummy)');
})->name('cart.add');

// tambahan fitur :
Route::get('/', [HomeController::class, 'index'])->name('home');

// tambah fitur untuk Seller
Route::prefix('seller')->name('seller.')->group(function () {
    
    // Dashboard
    Route::get('/dashboard', function () {
        return view('seller.dashboard');
    })->name('dashboard');

    // Registrasi Toko
    Route::get('/register', function () {
        return view('seller.register');
    })->name('register');

    // Manajemen Produk
    Route::get('/products', function () {
        return view('seller.products.index');
    })->name('products.index');

});

//tambah fitur : seller order
Route::middleware(['auth', 'seller'])->prefix('seller')->name('seller.')->group(function () {

    Route::get('/orders', [OrderController::class, 'index'])->name('orders.index');
    Route::get('/orders/{id}', [OrderController::class, 'show'])->name('orders.show');
    Route::post('/orders/{id}/update-status', [OrderController::class, 'updateStatus'])->name('orders.update-status');
    Route::post('/orders/{id}/update-resi', [OrderController::class, 'updateResi'])->name('orders.update-resi');

});




require __DIR__.'/auth.php';
