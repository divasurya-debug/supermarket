<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;

class KeranjangController extends Controller
{
    /**
     * Tampilkan isi keranjang
     */
    public function index(Request $request)
    {
        $cart = session()->get('cart', []); // ambil cart dari session
        return view('frontend.keranjang.index', compact('cart'));
    }

    /**
     * Tambah produk ke keranjang
     */
    public function add(Request $request)
    {
        $request->validate([
            'id_produk' => 'required|exists:products,id_produk',
            'jumlah'    => 'nullable|integer|min:1'
        ]);

        $product = Product::findOrFail($request->id_produk);

        // Ambil keranjang dari session
        $cart = session()->get('cart', []);

        // Kalau produk sudah ada, tambah jumlahnya
        if (isset($cart[$product->id_produk])) {
            $cart[$product->id_produk]['jumlah'] += $request->input('jumlah', 1);
        } else {
            // Kalau belum ada, buat baru
            $cart[$product->id_produk] = [
                'nama'   => $product->nama_produk,
                'harga'  => $product->harga,
                'gambar' => $product->gambar,
                'jumlah' => $request->input('jumlah', 1)
            ];
        }

        // Simpan lagi ke session
        session()->put('cart', $cart);

        return redirect()->back()->with('success', 'Produk berhasil ditambahkan ke keranjang!');
    }

    /**
     * Hapus produk dari keranjang
     */
    public function remove($id)
    {
        $cart = session()->get('cart', []);

        if (isset($cart[$id])) {
            unset($cart[$id]);
            session()->put('cart', $cart);
        }

        return redirect()->back()->with('success', 'Produk berhasil dihapus dari keranjang!');
    }
}
