<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

// Impor controller frontend
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\CheckoutController;

// Impor controller admin
use App\Http\Controllers\Admin\AdminAccountController;
use App\Http\Controllers\Admin\BannerController;
use App\Http\Controllers\Admin\KategoriController;
use App\Http\Controllers\Admin\ProductController as AdminProductController;
use App\Http\Controllers\Admin\BrandController;
use App\Http\Controllers\Admin\CheckoutController as AdminCheckoutController;
use App\Http\Controllers\Admin\DiscountController; // ✅ Tambah import DiscountController

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Di sini Anda dapat mendaftarkan rute web untuk aplikasi Anda. 
| Rute-rute ini dimuat oleh RouteServiceProvider dalam sebuah grup 
| yang berisi grup middleware "web".
|
*/

// ================== FRONTEND ================== //

Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/produk/{slug}', [ProductController::class, 'show'])->name('produk.show');

// ✅ Keranjang (Frontend) - Dikelompokkan agar lebih rapi
Route::prefix('keranjang')->name('cart.')->group(function () {
    Route::get('/', [CartController::class, 'index'])->name('index');
    Route::post('/tambah/{id}', [CartController::class, 'add'])->name('add');
    Route::post('/hapus/{id}', [CartController::class, 'remove'])->name('remove');
});

// ✅ Checkout (Frontend) - Dikelompokkan agar lebih rapi
Route::prefix('checkout')->name('checkout.')->group(function () {
    Route::get('/', [CheckoutController::class, 'index'])->name('index');
    Route::post('/proses', [CheckoutController::class, 'process'])->name('process');
});

// ================== ADMIN PANEL ================== //
Route::prefix('admin')->name('admin.')->group(function () {

    // Dashboard Admin
    Route::view('/', 'admin.index')->name('dashboard');

    // Resource Controllers untuk CRUD
    Route::resource('kategori', KategoriController::class);
    Route::resource('akun', AdminAccountController::class);
    Route::resource('banner', BannerController::class);
    Route::resource('produk', AdminProductController::class);
    Route::resource('brands', BrandController::class); 
    Route::resource('checkout', AdminCheckoutController::class); // ✅ CRUD Checkout Admin
    Route::resource('diskon', DiscountController::class);        // ✅ CRUD Diskon Produk

    // Halaman statis (jika belum ada Controller)
    Route::view('/pengaturan', 'admin.pengaturan')->name('pengaturan');
    Route::view('/keranjang', 'admin.keranjang')->name('keranjang');
});

// ========== ROUTE LOGOUT ========== //
Route::post('/logout', function () {
    Auth::logout();
    request()->session()->invalidate();
    request()->session()->regenerateToken();
    return redirect('/');
})->name('logout');
