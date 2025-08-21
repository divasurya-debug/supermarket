<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\Admin\BannerController;

// Halaman utama (Home)
Route::get('/', [HomeController::class, 'index']); // diganti supaya $banners tersedia di Blade

// Halaman Admin Panel & Submenu
Route::view('/admin', 'admin')->name('admin');
Route::view('/brands', 'brands')->name('brands');
Route::view('/produk', 'produk')->name('produk');
Route::view('/diskon', 'diskon')->name('diskon');
Route::view('/banner', 'banner')->name('banner');
Route::get('/produk/{slug}', [ProductController::class, 'show'])->name('produk.show');

// Route CRUD Banner Admin
Route::prefix('admin')->name('admin.')->group(function () {
    Route::resource('banner', BannerController::class);
});
