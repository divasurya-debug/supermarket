<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;

class KeranjangController extends Controller
{
    /**
     * Tampilkan isi keranjang.
     */
    public function index(Request $request)
    {
        // Ambil keranjang dari session (array: id_produk => jumlah)
        $keranjang = $request->session()->get('keranjang', []);

        // Ambil data produk dari DB sesuai id_produk
        $produks = [];
        if (!empty($keranjang)) {
            $produks = Product::whereIn('id_produk', array_keys($keranjang))->get();
        }

        return view('frontend.keranjang.index', compact('keranjang', 'produks'));
    }

    /**
     * Tambah produk ke keranjang.
     */
    public function add(Request $request, $id)
    {
        $request->validate([
            'jumlah' => 'nullable|integer|min:1'
        ]);

        $jumlah = (int) $request->input('jumlah', 1);

        // Ambil keranjang dari session
        $keranjang = $request->session()->get('keranjang', []);

        // Jika produk sudah ada, tambahkan jumlahnya
        if (array_key_exists($id, $keranjang)) {
            $keranjang[$id] += $jumlah;
        } else {
            $keranjang[$id] = $jumlah;
        }

        // Simpan kembali ke session
        $request->session()->put('keranjang', $keranjang);

        // Redirect balik agar tetap di halaman asal (home / lihat semua)
        return back()->with('success', 'Produk berhasil ditambahkan ke keranjang!');
    }

    /**
     * Hapus produk dari keranjang.
     */
    public function remove(Request $request, $id)
    {
        $keranjang = $request->session()->get('keranjang', []);

        if (array_key_exists($id, $keranjang)) {
            unset($keranjang[$id]);
            $request->session()->put('keranjang', $keranjang);
        }

        return redirect()
            ->route('keranjang.index')
            ->with('success', 'Produk berhasil dihapus dari keranjang!');
    }
}
