<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product; // ✅ ini yang benar, karena modelmu Product.php
use App\Models\Kategori;

class SearchController extends Controller
{
    public function index(Request $request)
    {
        $keyword = $request->input('q');

        $produk = Product::where('nama', 'LIKE', "%{$keyword}%")
            ->orWhere('deskripsi', 'LIKE', "%{$keyword}%")
            ->paginate(12);

        $kategori = Kategori::all();

        return view('search.index', compact('produk', 'kategori', 'keyword'));
    }
}
