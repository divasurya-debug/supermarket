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
        // Ambil keranjang dari session (array id_produk => jumlah)
        $keranjang = $request->session()->get('keranjang', []);

        // Ambil data produk dari DB sesuai id_produk
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

        // Ambil keranjang dari session
        $keranjang = $request->session()->get('keranjang', []);

        // Jika produk sudah ada, tambahkan jumlahnya
        if (isset($keranjang[$id])) {
            $keranjang[$id] += $jumlah;
        } else {
            $keranjang[$id] = $jumlah;
        }

        // Simpan kembali ke session
        $request->session()->put('keranjang', $keranjang);

        // Redirect balik ke halaman sebelumnya agar user tetap di "lihat semua"
        return redirect()->back()->with('success', 'Produk berhasil ditambahkan ke keranjang!');
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
