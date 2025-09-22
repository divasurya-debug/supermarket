<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Produk;

class KeranjangController extends Controller
{
    /**
     * Tampilkan isi keranjang
     */
    public function index(Request $request)
    {
        // Ambil keranjang dari session, default kosong
        $keranjang = $request->session()->get('keranjang', []);

        // Ambil detail produk dari database
        $produk_ids = array_keys($keranjang);
        $produks = Produk::whereIn('id', $produk_ids)->get();

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

        if (isset($keranjang[$id])) {
            // Jika sudah ada, update jumlah
            $keranjang[$id] += $jumlah;
        } else {
            // Jika belum ada, buat baru
            $keranjang[$id] = $jumlah;
        }

        // Simpan kembali ke session
        $request->session()->put('keranjang', $keranjang);

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
