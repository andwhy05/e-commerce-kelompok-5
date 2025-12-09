<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProfileController;

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
// Route::get('login', [AuthController::class, 'login']);
// Route::get('register', [AuthController::class, 'login']);
Route::get('/', [HomeController::class, 'index'])->name('home');

require __DIR__.'/auth.php';
