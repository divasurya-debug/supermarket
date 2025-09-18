<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

// ================== FRONTEND CONTROLLERS ================== //
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\KeranjangController; // Cart (frontend)
use App\Http\Controllers\CheckoutController;
use App\Http\Controllers\SearchController;

// ================== ADMIN CONTROLLERS ================== //
use App\Http\Controllers\Admin\AuthController; 
use App\Http\Controllers\Admin\AdminAccountController;
use App\Http\Controllers\Admin\BannerController;
use App\Http\Controllers\Admin\KategoriController;
use App\Http\Controllers\Admin\ProductController as AdminProductController;
use App\Http\Controllers\Admin\BrandController;
use App\Http\Controllers\Admin\CheckoutController as AdminCheckoutController;
use App\Http\Controllers\Admin\DiscountController;
use App\Http\Controllers\Admin\KeranjangController as AdminKeranjangController;


/*
|--------------------------------------------------------------------------
| WEB ROUTES
|--------------------------------------------------------------------------
*/

// ================== FRONTEND ================== //
Route::get('/', [HomeController::class, 'index'])->name('home');

// Produk
Route::get('/produk/{slug}', [ProductController::class, 'show'])->name('produk.show');

// Search Produk & Kategori
Route::get('/search', [SearchController::class, 'index'])->name('search');

// Keranjang (Frontend)
Route::prefix('keranjang')->name('keranjang.')->group(function () {
    Route::get('/', [KeranjangController::class, 'index'])->name('index');   // tampil keranjang
    Route::post('/tambah/{id}', [KeranjangController::class, 'add'])->name('add'); 
    Route::delete('/hapus/{id}', [KeranjangController::class, 'remove'])->name('remove'); // ganti ke DELETE biar RESTful
});

// Checkout (Frontend)
Route::prefix('checkout')->name('checkout.')->group(function () {
    Route::get('/', [CheckoutController::class, 'index'])->name('index');
    Route::post('/proses', [CheckoutController::class, 'process'])->name('process');
});


// ================== ADMIN PANEL ================== //
Route::prefix('admin')->name('admin.')->group(function () {

    // redirect ke login/dashboard
    Route::get('/', function () {
        return auth('admin')->check()
            ? redirect()->route('admin.dashboard')
            : redirect()->route('admin.login');
    });

    // ===== Auth Admin =====
    Route::middleware('guest:admin')->group(function () {
        Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
        Route::post('/login', [AuthController::class, 'login'])->name('login.post');
        Route::get('/register', [AuthController::class, 'showRegister'])->name('register');
        Route::post('/register', [AuthController::class, 'register'])->name('register.post');
    });

    // ===== Admin Area (harus login) =====
    Route::middleware('auth:admin')->group(function () {
        Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

        // Dashboard
        Route::view('/dashboard', 'admin.index')->name('dashboard');

        // Master Data
        Route::resources([
            'kategori'   => KategoriController::class,
            'akun'       => AdminAccountController::class,
            'banner'     => BannerController::class,
            'produk'     => AdminProductController::class,
            'brands'     => BrandController::class,
            'checkout'   => AdminCheckoutController::class,
            'keranjang'  => AdminKeranjangController::class,
        ]);

        // Diskon resource (pakai alias biar konsisten)
        Route::resource('diskon', DiscountController::class)
            ->parameters(['diskon' => 'discount']);

        // Pengaturan tambahan
        Route::get('/pengaturan', [AdminAccountController::class, 'index'])->name('pengaturan');
    });
});


// ========== ROUTE LOGOUT DEFAULT (Frontend) ==========
Route::post('/logout', function () {
    Auth::logout();
    request()->session()->invalidate();
    request()->session()->regenerateToken();
    return redirect('/');
})->name('logout');
