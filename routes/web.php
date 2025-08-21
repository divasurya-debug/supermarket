<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\Admin\BannerController;

// ================== FRONTEND ================== //
Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/produk/{slug}', [ProductController::class, 'show'])->name('produk.show');

// ================== ADMIN PANEL ================== //
Route::prefix('admin')->name('admin.')->group(function () {

    // Dashboard Admin
    Route::view('/', 'admin.index')->name('dashboard');

    // Brands
    Route::view('/brands', 'admin.brands')->name('brands');

    // Produk
    Route::view('/produk', 'admin.produk')->name('produk');

    // Diskon
    Route::view('/diskon', 'admin.diskon')->name('diskon');

    // Banner (CRUD pakai controller)
    Route::resource('banner', BannerController::class);
});
