<?php

use Illuminate\Support\Facades\Route;

// Halaman utama (Home)
Route::get('/', function () {
    return view('home'); // arahkan ke resources/views/home.blade.php
});

// Halaman Admin Panel & Submenu
Route::view('/admin', 'admin')->name('admin');
Route::view('/brands', 'brands')->name('brands');
Route::view('/produk', 'produk')->name('produk');
Route::view('/diskon', 'diskon')->name('diskon');
Route::view('/banner', 'banner')->name('banner');
Route::get('/produk/{slug}', [ProductController::class, 'show'])->name('produk.show');

Route::prefix('admin')->name('admin.')->group(function () {
    Route::resource('banner', \App\Http\Controllers\Admin\BannerController::class);
});
