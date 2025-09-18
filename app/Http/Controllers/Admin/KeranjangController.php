<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Keranjang;
use App\Models\Akun;
use App\Models\Produk;
use Illuminate\Http\Request;

class KeranjangController extends Controller
{
    public function index()
    {
        $keranjang = Keranjang::with(['akun', 'produk'])->get();
        return view('admin.keranjang.index', compact('keranjang'));
    }

    public function create()
    {
        $akun = Akun::all();
        $produk = Produk::all();
        return view('admin.keranjang.create', compact('akun', 'produk'));
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'id_akun'   => 'required|exists:tb_akun,id_akun',
            'id_produk' => 'required|exists:tb_produk,id_produk',
            'jumlah'    => 'required|integer|min:1',
        ]);

        Keranjang::create($data);

        return redirect()->route('admin.keranjang.index')
                         ->with('success', 'Data keranjang berhasil ditambahkan!');
    }

    public function edit($id)
    {
        $keranjang = Keranjang::findOrFail($id);
        $akun = Akun::all();
        $produk = Produk::all();

        return view('admin.keranjang.edit', compact('keranjang', 'akun', 'produk'));
    }

    public function update(Request $request, $id)
    {
        $keranjang = Keranjang::findOrFail($id);

        $data = $request->validate([
            'id_akun'   => 'required|exists:tb_akun,id_akun',
            'id_produk' => 'required|exists:tb_produk,id_produk',
            'jumlah'    => 'required|integer|min:1',
        ]);

        $keranjang->update($data);

        return redirect()->route('admin.keranjang.index')
                         ->with('success', 'Data keranjang berhasil diperbarui!');
    }

    public function destroy($id)
    {
        try {
            $keranjang = Keranjang::findOrFail($id);
            $keranjang->delete();

            return redirect()->route('admin.keranjang.index')
                             ->with('success', 'Data keranjang berhasil dihapus!');
        } catch (\Exception $e) {
            return redirect()->route('admin.keranjang.index')
                             ->with('error', 'Gagal menghapus data keranjang!');
        }
    }
}
