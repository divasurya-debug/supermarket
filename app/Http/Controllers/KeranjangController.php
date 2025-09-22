<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Keranjang;
use App\Models\Produk; // pastikan nama model produk sesuai (Produk.php)

class KeranjangController extends Controller
{
    /**
     * Tampilkan isi keranjang
     */
    public function index()
    {
        $id_akun = auth()->id(); // ambil id user yang login
        $keranjang = Keranjang::with('produk')
                        ->where('id_akun', $id_akun)
                        ->get();

        return view('frontend.keranjang.index', compact('keranjang'));
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
        $id_akun = auth()->id();

        // Cek apakah produk ada
        $produk = Produk::findOrFail($id);

        // Cek apakah produk sudah ada di keranjang user ini
        $keranjang = Keranjang::where('id_akun', $id_akun)
                            ->where('id_produk', $id)
                            ->first();

        if ($keranjang) {
            // Jika sudah ada, update jumlah
            $keranjang->jumlah += $jumlah;
            $keranjang->save();
        } else {
            // Jika belum ada, buat baru
            Keranjang::create([
                'id_akun'   => $id_akun,
                'id_produk' => $id,
                'jumlah'    => $jumlah,
            ]);
        }

        return redirect()->route('keranjang.index')
            ->with('success', 'Produk berhasil ditambahkan ke keranjang!');
    }

    /**
     * Hapus produk dari keranjang
     */
    public function remove($id)
    {
        $id_akun = auth()->id();

        Keranjang::where('id_akun', $id_akun)
                 ->where('id_produk', $id)
                 ->delete();

        return redirect()->route('keranjang.index')
            ->with('success', 'Produk berhasil dihapus dari keranjang!');
    }
}
