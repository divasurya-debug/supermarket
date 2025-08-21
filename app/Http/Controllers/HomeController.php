<?php

namespace App\Http\Controllers;

// 1. Import model yang akan kita gunakan
use App\Models\Banner;   // Asumsi Anda juga membuat model Banner
use App\Models\Product;
use App\Models\Kategori; // Asumsi Anda juga membuat model Kategori

use Illuminate\Http\Request;
// DB Facade tidak perlu lagi jika semua query pakai model
// use Illuminate\Support\Facades\DB; 

class HomeController extends Controller
{
    public function index()
    {
        // Ambil data banner (dengan asumsi ada model Banner)
        $banners = Banner::all(); // Jauh lebih singkat!

        // Ambil 6 produk terbaru
        $produkTerbaru = Product::latest()->take(6)->get();

        // Ambil 6 produk dari kategori 'Buah & Sayur' (Cara Eloquent)
        $buahSayur = Product::whereHas('kategori', function ($query) {
            $query->where('nama_kategori', 'Buah & Sayur');
        })->take(6)->get();
        
        // Ambil 6 produk terlaris (contoh: stok paling sedikit)
        $produkTerlaris = Product::orderBy('stok', 'asc')->take(6)->get();

        // Kirim semua data ke view
        return view('home', compact('banners', 'produkTerbaru', 'buahSayur', 'produkTerlaris'));
    }
}