<?php

namespace App\Http\Controllers;

// Import model yang akan digunakan
use App\Models\Banner;
use App\Models\Product;
use App\Models\Kategori;
use App\Models\Checkout; // pastikan ada model Checkout

use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        // Ambil semua banner
        $banners = Banner::all();

        // Ambil 6 produk terbaru
        $produkTerbaru = Product::latest()->take(6)->get();

        // Ambil 6 produk dari kategori 'Buah' atau 'Sayur'
        $buahSayur = Product::whereHas('kategori', function ($query) {
            $query->whereIn('nama_kategori', ['Buah', 'Sayur']);
        })->take(6)->get();

        // Ambil 6 produk terlaris yang pernah di-checkout
        // Ambil 6 produk terlaris berdasarkan jumlah_terjual di tb_produk
$produkTerlaris = Product::where('jumlah_terjual', '>', 0)
    ->orderBy('jumlah_terjual', 'desc')
    ->take(6)
    ->get();


        // Ambil semua kategori untuk navigasi/filter
        $kategori = Kategori::all();

        // Kirim semua data ke view
        return view('home', compact(
            'banners',
            'produkTerbaru',
            'buahSayur',
            'produkTerlaris',
            'kategori'
        ));
    }
}
