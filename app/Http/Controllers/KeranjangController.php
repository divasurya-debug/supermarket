<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;

class KeranjangController extends Controller
{
    public function index(Request $request)
    {
        $keranjang = $request->session()->get('keranjang', []);
        $produks = !empty($keranjang) 
            ? Product::whereIn('id_produk', array_keys($keranjang))->get()
            : [];

        return view('frontend.keranjang.index', compact('keranjang', 'produks'));
    }

    public function add(Request $request, $id)
    {
        $jumlah = (int) $request->input('jumlah', 1);
        $keranjang = $request->session()->get('keranjang', []);

        $keranjang[$id] = ($keranjang[$id] ?? 0) + $jumlah;
        $request->session()->put('keranjang', $keranjang);

        return back()->with('success', 'Produk berhasil ditambahkan ke keranjang!');
    }

    public function remove(Request $request, $id)
    {
        $keranjang = $request->session()->get('keranjang', []);
        unset($keranjang[$id]);
        $request->session()->put('keranjang', $keranjang);

        return redirect()->route('keranjang.index')
            ->with('success', 'Produk berhasil dihapus dari keranjang!');
    }
}
