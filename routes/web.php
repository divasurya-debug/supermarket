<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\Admin\BannerController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
*/

// ================== FRONTEND ================== //

// Halaman Utama (Home) - dengan $banners agar bisa dipanggil di Blade
Route::get('/', [HomeController::class, 'index'])->name('home');

// Produk detail (slug)
Route::get('/produk/{slug}', [ProductController::class, 'show'])->name('produk.show');


// ================== ADMIN PANEL ================== //
Route::prefix('admin')->name('admin.')->group(function () {

    // Dashboard Admin (pakai resources/views/admin/index.blade.php)
    Route::view('/', 'admin.index')->name('dashboard');

    // Menu Admin (Brands, Produk, Diskon)
    Route::view('/brands', 'admin.brands')->name('brands');
    Route::view('/produk', 'admin.produk')->name('produk');
    Route::view('/diskon', 'admin.diskon')->name('diskon');

    // Banner pakai Controller CRUD (resources/views/admin/banner/*.blade.php)
    Route::resource('banner', BannerController::class);
});
