<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Kategori;
use App\Models\Promo;

class ProductController extends Controller
{
    // ==== Kategori ====
    public function kategori()
    {
        $kategori = Kategori::all();

        return view('frontend.kategori.index', compact('kategori'));
    }

    // ==== Promo ====
    public function promo()
    {
        $promo = Promo::with('product')->latest()->paginate(12);

        return view('frontend.promo.index', compact('promo'));
    }

    // ==== Produk Terbaru ====
    public function produkTerbaru()
    {
        $produk = Product::latest()->paginate(12);

        return view('frontend.produk.terbaru', compact('produk'));
    }

    // ==== Buah & Sayur ====
    public function buahSayur()
    {
        $produk = Product::whereHas('kategori', function ($q) {
            $q->where('nama_kategori', 'Buah & Sayur');
        })->paginate(12);

        return view('frontend.produk.buahsayur', compact('produk'));
    }

    // ==== Produk Terlaris ====
    public function produkTerlaris()
    {
        $produk = Product::orderBy('terjual', 'desc')->paginate(12);

        return view('frontend.produk.terlaris', compact('produk'));
    }

    // ==== Detail Produk (sudah ada di route show) ====
    public function show($slug)
    {
        $produk = Product::where('slug', $slug)->firstOrFail();

        return view('frontend.produk.show', compact('produk'));
    }
}
