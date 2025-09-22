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

        // arahkan ke resources/views/kategori/index.blade.php
        return view('kategori.index', compact('kategori'));
    }

    // ==== Promo ====
    public function promo()
    {
        $promo = Promo::with('product')->latest()->paginate(12);

        // arahkan ke resources/views/promo/index.blade.php
        return view('promo.index', compact('promo'));
    }

    // ==== Produk Terbaru ====
    public function produkTerbaru()
    {
        $produk = Product::latest()->paginate(12);

        // arahkan ke resources/views/produk/terbaru.blade.php
        return view('produk.terbaru', compact('produk'));
    }

    // ==== Buah & Sayur ====
    public function buahSayur()
    {
        $produk = Product::whereHas('kategori', function ($q) {
            $q->where('nama_kategori', 'Buah')
              ->orWhere('nama_kategori', 'Sayur');
        })->paginate(12);

        // arahkan ke resources/views/produk/buahsayur.blade.php
        return view('produk.buahsayur', compact('produk'));
    }

    // ==== Produk Terlaris ====
    public function produkTerlaris()
    {
        $produk = Product::orderBy('terjual', 'desc')->paginate(12);

        // arahkan ke resources/views/produk/terlaris.blade.php
        return view('produk.terlaris', compact('produk'));
    }

    // ==== Detail Produk ====
    public function show($slug)
    {
        $produk = Product::where('slug', $slug)->firstOrFail();

        // arahkan ke resources/views/produk/show.blade.php
        return view('produk.show', compact('produk'));
    }
}
