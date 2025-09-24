<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product; // model Product

class KeranjangController extends Controller
{
    /**
     * Tampilkan isi keranjang
     */
    public function index(Request $request)
    {
        $keranjang = $request->session()->get('keranjang', []);

        // ambil data produk berdasarkan id_produk
        $produks = Product::whereIn('id_produk', array_keys($keranjang))->get();

        return view('frontend.keranjang.index', compact('keranjang', 'produks'));
    }

    /**
     * Tambah produk ke keranjang
     */
    public function add(Request $request, $id)
    {
        $request->validate([
            'jumlah' => 'nullable|integer|min:1'
        ]);

        $jumlah = $request->input('jumlah', 1);

        $keranjang = $request->session()->get('keranjang', []);

        if (isset($keranjang[$id])) {
            $keranjang[$id] += $jumlah;
        } else {
            $keranjang[$id] = $jumlah;
        }

        $request->session()->put('keranjang', $keranjang);

        // Jika request dari AJAX
        if ($request->ajax()) {
            return response()->json([
                'success' => true,
                'message' => 'Produk berhasil ditambahkan ke keranjang!',
                'id'      => $id,
                'jumlah'  => $keranjang[$id]
            ]);
        }

        return redirect()->route('keranjang.index')
            ->with('success', 'Produk berhasil ditambahkan ke keranjang!');
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

        return redirect()->route('keranjang.index')
            ->with('success', 'Produk berhasil dihapus dari keranjang!');
    }
}
