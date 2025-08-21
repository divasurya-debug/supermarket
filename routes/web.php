<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProductController;

// Impor controller admin
use App\Http\Controllers\Admin\BannerController;
use App\Http\Controllers\Admin\ProductController as AdminProductController;

// ================== FRONTEND ================== //
Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/produk/{slug}', [ProductController::class, 'show'])->name('produk.show');

// ================== ADMIN PANEL ================== //
Route::prefix('admin')->name('admin.')->group(function () {

    // Dashboard Admin
    Route::view('/', 'admin.index')->name('dashboard');

    // Brands (Sementara masih view statis)
    Route::view('/brands', 'admin.brands')->name('brands');
    
    // Diskon (Sementara masih view statis)
    Route::view('/diskon', 'admin.diskon')->name('diskon');

    // Banner (CRUD pakai controller)
    Route::resource('banner', BannerController::class);

    // Produk (CRUD pakai controller) - INI BAGIAN YANG DIPERBAIKI
    Route::resource('produk', AdminProductController::class);
});