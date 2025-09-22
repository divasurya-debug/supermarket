<?php

namespace App\Http\Controllers;

use App\Models\Banner;
use App\Models\Product;
use App\Models\Kategori;
use App\Models\Checkout;
use App\Models\Discount;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    public function index(Request $request)
    {
        // Ambil keyword pencarian
        $keyword = $request->input('keyword');

        // Query hasil pencarian (jika ada keyword)
        $products = DB::table('tb_produk')
            ->join('tb_brands', 'tb_produk.id_brands', '=', 'tb_brands.id_brands')
            ->join('tb_kategori', 'tb_produk.id_kategori', '=', 'tb_kategori.id_kategori')
            ->select('tb_produk.*', 'tb_brands.nama_merek', 'tb_kategori.nama_kategori')
            ->when($keyword, function ($query, $keyword) {
                return $query->where('tb_produk.nama_produk', 'ILIKE', "%{$keyword}%")
                             ->orWhere('tb_produk.deskripsi', 'ILIKE', "%{$keyword}%");
            })
            ->get();

        return view('home', [
            'banners'        => Banner::all(),
            'produkTerbaru'  => Product::latest()->take(6)->get(),
            'buahSayur'      => Product::whereHas('kategori', function ($query) {
                                        $query->whereIn('nama_kategori', ['Buah', 'Sayur']);
                                    })->take(6)->get(),
            'produkTerlaris' => Product::where('stok', '>', 0)
                                    ->orderBy('stok', 'asc')
                                    ->take(6)
                                    ->get(),
            'kategori'       => Kategori::all(),
            'promoDiskon'    => Discount::with('product')
                                    ->whereDate('tanggal_mulai', '<=', now())
                                    ->whereDate('tanggal_akhir', '>=', now())
                                    ->take(6)
                                    ->get(),
            'products'       => $products,   // hasil search
            'keyword'        => $keyword,    // biar bisa ditampilkan di view
        ]);
    }
}
