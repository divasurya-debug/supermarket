<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

// Impor controller frontend
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\KeranjangController; // Frontend cart
use App\Http\Controllers\CheckoutController;

// Impor controller admin
use App\Http\Controllers\Admin\AdminAccountController;
use App\Http\Controllers\Admin\BannerController;
use App\Http\Controllers\Admin\KategoriController;
use App\Http\Controllers\Admin\ProductController as AdminProductController;
use App\Http\Controllers\Admin\BrandController;
use App\Http\Controllers\Admin\CheckoutController as AdminCheckoutController;
use App\Http\Controllers\Admin\DiscountController;
use App\Http\Controllers\Admin\KeranjangController as AdminKeranjangController; // Admin cart
use App\Http\Controllers\Admin\AuthController; // Admin auth

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
*/

// ================== FRONTEND ================== //

Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/produk/{slug}', [ProductController::class, 'show'])->name('produk.show');

// ✅ Keranjang (Frontend)
Route::prefix('keranjang')->name('keranjang.')->group(function () {
    Route::get('/', [KeranjangController::class, 'index'])->name('index');
    Route::post('/tambah/{id}', [KeranjangController::class, 'add'])->name('add');
    Route::post('/hapus/{id}', [KeranjangController::class, 'remove'])->name('remove');
});

// ✅ Checkout (Frontend)
Route::prefix('checkout')->name('checkout.')->group(function () {
    Route::get('/', [CheckoutController::class, 'index'])->name('index');
    Route::post('/proses', [CheckoutController::class, 'process'])->name('process');
});

// ================== ADMIN PANEL ================== //
Route::prefix('admin')->name('admin.')->group(function () {

    // Jika buka /admin, otomatis cek login
    Route::get('/', function () {
        // Kalau admin sudah login, langsung ke dashboard
        if (auth('admin')->check()) {
            return redirect()->route('admin.dashboard');
        }
        // Kalau belum login, ke halaman login
        return redirect()->route('admin.login');
    });

    // ===== Auth Admin =====
    Route::middleware('guest:admin')->group(function () {
        Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
        Route::post('/login', [AuthController::class, 'login'])->name('login.post');
        Route::get('/register', [AuthController::class, 'showRegister'])->name('register');
        Route::post('/register', [AuthController::class, 'register'])->name('register.post');
    });

    Route::middleware('auth:admin')->group(function () {
        Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

        // Dashboard Admin
        Route::view('/dashboard', 'admin.index')->name('dashboard');
        // Resource Controllers
        Route::resource('kategori', KategoriController::class);
        Route::resource('akun', AdminAccountController::class);
        Route::resource('banner', BannerController::class);
        Route::resource('produk', AdminProductController::class);
        Route::resource('brands', BrandController::class);
        Route::resource('checkout', AdminCheckoutController::class);
        Route::resource('diskon', DiscountController::class)->parameters([ 'diskon' => 'discount']);
        Route::resource('keranjang', AdminKeranjangController::class);

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
