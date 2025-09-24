<?php

use Illuminate\Support\Facades\Route;

// ================== FRONTEND CONTROLLERS ================== //
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\KeranjangController;
use App\Http\Controllers\CheckoutController;
use App\Http\Controllers\PromoController;

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

// ================== AUTH CONTROLLERS ================== //
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;

/*
|--------------------------------------------------------------------------
| WEB ROUTES
|--------------------------------------------------------------------------
*/

// ================== FRONTEND ================== //

// Home
Route::get('/', [HomeController::class, 'index'])->name('home');

// Produk detail pakai id, bukan slug
Route::get('/produk/{id}', [ProductController::class, 'show'])->name('produk.show');

// Lihat Semua
Route::get('/kategori', [ProductController::class, 'kategori'])->name('kategori.index');
Route::get('/promo', [PromoController::class, 'index'])->name('promo.index');
Route::get('/produk-terbaru', [ProductController::class, 'produkTerbaru'])->name('produk.terbaru');
Route::get('/buah-sayur', [ProductController::class, 'buahSayur'])->name('produk.buahsayur');
Route::get('/produk-terlaris', [ProductController::class, 'produkTerlaris'])->name('produk.terlaris');

// ================== AUTH FRONTEND (User) ================== //
Route::middleware('guest')->group(function () {
    Route::get('/login', [LoginController::class, 'showLoginForm'])->name('user.login');
    Route::post('/login', [LoginController::class, 'login'])->name('user.login.post');

    Route::get('/register', [RegisterController::class, 'showRegistrationForm'])->name('user.register');
    Route::post('/register', [RegisterController::class, 'register'])->name('user.register.post');
});

Route::post('/logout', [LoginController::class, 'logout'])->name('user.logout');

// ================== KERANJANG (FRONTEND) ================== //
// Hapus middleware auth supaya bisa diakses tanpa login
Route::prefix('keranjang')->name('keranjang.')->group(function () {
    Route::get('/', [KeranjangController::class, 'index'])->name('index');
    Route::post('/tambah/{id}', [KeranjangController::class, 'add'])->name('add');
    Route::delete('/hapus/{id}', [KeranjangController::class, 'remove'])->name('remove');
});

// ================== CHECKOUT (FRONTEND) ================== //
// Kalau checkout tetap harus login, biarkan middleware auth
Route::middleware('auth')->prefix('checkout')->name('checkout.')->group(function () {
    Route::get('/', [CheckoutController::class, 'index'])->name('index');
    Route::post('/proses', [CheckoutController::class, 'process'])->name('process');
});

// ================== ADMIN PANEL ================== //
Route::prefix('admin')->name('admin.')->group(function () {

    // Redirect root admin
    Route::get('/', function () {
        return auth('admin')->check()
            ? redirect()->route('admin.dashboard')
            : redirect()->route('admin.login');
    });

    // ===== Auth Admin (guest) =====
    Route::middleware('guest:admin')->group(function () {
        Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
        Route::post('/login', [AuthController::class, 'login'])->name('login.post');

        Route::get('/register', [AuthController::class, 'showRegister'])->name('register');
        Route::post('/register', [AuthController::class, 'register'])->name('register.post');
    });

    // ===== Admin Area (auth:admin) =====
    Route::middleware('auth:admin')->group(function () {
        Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

        // Dashboard
        Route::view('/dashboard', 'admin.index')->name('dashboard');

        // Master Data
        Route::resources([
            'kategori'  => KategoriController::class,
            'akun'      => AdminAccountController::class,
            'banner'    => BannerController::class,
            'produk'    => AdminProductController::class,
            'brands'    => BrandController::class,
            'checkout'  => AdminCheckoutController::class,
            'keranjang' => AdminKeranjangController::class,
        ]);

        // Diskon
        Route::resource('diskon', DiscountController::class)
            ->parameters(['diskon' => 'discount']);

        // Pengaturan
        Route::get('/pengaturan', [AdminAccountController::class, 'index'])->name('pengaturan');
    });
});
