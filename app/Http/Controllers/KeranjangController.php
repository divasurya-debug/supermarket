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
        $keranjang = $request->session()->get('keranjang', []);
        $produks   = Product::whereIn('id_produk', array_keys($keranjang))->get();

        return view('frontend.keranjang.index', compact('keranjang', 'produks'));
    }

    /**
     * Tambah produk ke keranjang
     */
    public function add(Request $request, $id)
    {
        $produk    = Product::findOrFail($id);
        $keranjang = $request->session()->get('keranjang', []);

        if (isset($keranjang[$id])) {
            $keranjang[$id]['jumlah']++;
        } else {
            $keranjang[$id] = [
                'nama_produk' => $produk->nama_produk,
                'harga'       => $produk->harga,
                'gambar'      => $produk->gambar,
                'jumlah'      => 1,
            ];
        }

        $request->session()->put('keranjang', $keranjang);

        // Hitung total item
        $total = array_sum(array_column($keranjang, 'jumlah'));
        $request->session()->put('cart_total', $total);

        // Kalau AJAX, balikin JSON
        if ($request->ajax()) {
            return response()->json([
                'success' => true,
                'message' => $produk->nama_produk . ' ditambahkan ke keranjang!',
                'total'   => $total
            ]);
        }

        // Kalau bukan AJAX, redirect biasa
        return redirect()
            ->route('keranjang.index')
            ->with('success', $produk->nama_produk . ' berhasil ditambahkan ke keranjang!');
    }

    /**
     * Hapus produk dari keranjang
     */
    public function remove(Request $request, $id)
    {
        $keranjang = $request->session()->get('keranjang', []);

        if (isset($keranjang[$id])) {
            unset($keranjang[$id]);
            $request->session()->put('keranjang', $keranjang);
        }

        $total = array_sum(array_column($keranjang, 'jumlah'));
        $request->session()->put('cart_total', $total);

        return redirect()
            ->route('keranjang.index')
            ->with('success', 'Produk berhasil dihapus dari keranjang!');
    }
}
