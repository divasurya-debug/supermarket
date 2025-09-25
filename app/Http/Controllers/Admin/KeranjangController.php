<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller; // ✅ Tambahkan baris ini
use App\Models\Produk;
use Illuminate\Http\Request;

class KeranjangController extends Controller
{
    /**
     * Tampilkan isi keranjang
     */
    public function index()
    {
        $keranjang = session()->get('keranjang', []);
        return view('frontend.keranjang.index', compact('keranjang'));
    }

    /**
     * Tambah produk ke keranjang
     */
    public function add(Request $request, $id)
    {
        $produk = Produk::findOrFail($id);

        // Ambil keranjang dari session
        $keranjang = session()->get('keranjang', []);

        if (isset($keranjang[$id])) {
            // Jika sudah ada, tambah jumlah
            $keranjang[$id]['jumlah']++;
        } else {
            // Jika belum ada, buat baru
            $keranjang[$id] = [
                'nama_produk' => $produk->nama_produk,
                'harga'       => $produk->harga,
                'gambar'      => $produk->gambar,
                'jumlah'      => 1,
            ];
        }

        // Simpan ke session
        session()->put('keranjang', $keranjang);

        return redirect()
            ->route('keranjang.index')
            ->with('success', $produk->nama_produk . ' berhasil ditambahkan ke keranjang!');
    }

    /**
     * Hapus produk dari keranjang
     */
    public function remove(Request $request, $id)
    {
        $keranjang = session()->get('keranjang', []);

        if (isset($keranjang[$id])) {
            unset($keranjang[$id]);
            session()->put('keranjang', $keranjang);
        }

        return redirect()
            ->route('keranjang.index')
            ->with('success', 'Produk berhasil dihapus dari keranjang!');
    }
}
