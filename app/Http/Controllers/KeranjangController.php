<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product; // pastikan model Produk ada di App\Models

class KeranjangController extends Controller
{
    /**
     * Tampilkan isi keranjang
     */
    public function index(Request $request)
{
    $keranjang = $request->session()->get('keranjang', []);

    // Ambil semua produk yang ada di keranjang sekaligus dari database
    $produks = Product::whereIn('id_produk', array_keys($keranjang))->get();

    return view('frontend.keranjang.index', compact('keranjang', 'produks'));
} 


    /**
     * Tambah produk ke keranjang
     */
    public function add(Request $request, $id)
    {
        $produk = Product::findOrFail($id);

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

        return redirect()
            ->route('keranjang.index')
            ->with('success', 'Produk berhasil dihapus dari keranjang!');
    }
}
