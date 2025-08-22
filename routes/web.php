<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;  // Jangan lupa import Auth
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\CheckoutController;

// Impor controller admin
use App\Http\Controllers\Admin\BannerController;
use App\Http\Controllers\Admin\ProductController as AdminProductController;
use App\Http\Controllers\Admin\AdminAccountController;

// ================== FRONTEND ================== //
Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/produk/{slug}', [ProductController::class, 'show'])->name('produk.show');

// ✅ Keranjang (Frontend)
Route::get('/keranjang', [CartController::class, 'index'])->name('cart.index');
Route::post('/keranjang/tambah/{id}', [CartController::class, 'add'])->name('cart.add');
Route::post('/keranjang/hapus/{id}', [CartController::class, 'remove'])->name('cart.remove');

// ✅ Checkout (Frontend)
Route::get('/checkout', [CheckoutController::class, 'index'])->name('checkout.index');
Route::post('/checkout/proses', [CheckoutController::class, 'process'])->name('checkout.process');

// ================== ADMIN PANEL ================== //
Route::prefix('admin')->name('admin.')->group(function () {

    // Dashboard Admin (sementara view statis)
    Route::view('/', 'admin.index')->name('dashboard');

    // Brands (sementara statis)
    Route::view('/brands', 'admin.brands')->name('brands');
    
    // Diskon (sementara statis)
    Route::view('/diskon', 'admin.diskon')->name('diskon');

    // Kategori (sementara statis)
    Route::view('/kategori', 'admin.kategori')->name('kategori');

    // Pengaturan (sementara statis)
    Route::view('/pengaturan', 'admin.pengaturan')->name('pengaturan');

    // ✅ Halaman Keranjang Admin (tampilan saja, tanpa CRUD)
    Route::view('/keranjang', 'admin.keranjang')->name('keranjang');

    // ✅ Akun Admin (CRUD Resource)
    Route::resource('akun', AdminAccountController::class);

    // ✅ Banner (CRUD Resource)
    Route::resource('banner', BannerController::class);

    // ✅ Produk (CRUD Resource)
    Route::resource('produk', AdminProductController::class);

    // ✅ Checkout Admin (sementara view statis)
    Route::view('/checkout', 'admin.checkout')->name('checkout');
});

// ========== ROUTE LOGOUT ========== //
Route::post('/logout', function () {
    Auth::logout();
    return redirect('/'); // Redirect ke homepage setelah logout
})->name('logout');
