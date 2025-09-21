<?php

namespace App\Http\Controllers;

// Import model yang akan digunakan
use App\Models\Banner;
use App\Models\Product;
use App\Models\Kategori;
use App\Models\Checkout; // pastikan ada model Checkout
use App\Models\Discount; // ✅ Tambah import diskon

use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index(Request $request)
    {
        // Ambil semua banner
        $banners = Banner::all();

        // Ambil 6 produk terbaru
        $produkTerbaru = Product::latest()->take(6)->get();

        // Ambil 6 produk dari kategori 'Buah' atau 'Sayur'
        $buahSayur = Product::whereHas('kategori', function ($query) {
            $query->whereIn('nama_kategori', ['Buah', 'Sayur']);
        })->take(6)->get();

        // Ambil 6 produk terlaris berdasarkan stok paling sedikit
        $produkTerlaris = Product::where('stok', '>', 0)
            ->orderBy('stok', 'asc') // stok sedikit = terlaris
            ->take(6)
            ->get();

        // Ambil semua kategori untuk navigasi/filter
        $kategori = Kategori::all();

        // ✅ Ambil promo/diskon aktif (tanggal masih berlaku)
        $promoDiskon = Discount::with('product')
            ->whereDate('tanggal_mulai', '<=', now())
            ->whereDate('tanggal_akhir', '>=', now())
            ->take(6)
            ->get();

        // ✅ Logika pencarian produk
        $keyword = $request->input('keyword');
        $products = Product::query()
            ->when($keyword, function ($query, $keyword) {
                $query->where('nama_produk', 'LIKE', "%{$keyword}%")
                      ->orWhere('deskripsi', 'LIKE', "%{$keyword}%");
            })
            ->get();

        // Kirim semua data ke view
        return view('home', compact(
            'banners',
            'produkTerbaru',
            'buahSayur',
            'produkTerlaris',
            'kategori',
            'promoDiskon',
            'products' // ✅ kirim hasil pencarian
        ));
    }
}
