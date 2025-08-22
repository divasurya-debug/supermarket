<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Kategori;

class KategoriController extends Controller
{
    public function index()
    {
        $kategoris = Kategori::all();
        return view('admin.kategori.index', compact('kategoris'));
    }

    public function create()
    {
        return view('admin.kategori.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama_kategori'   => 'required|string|max:255',
            'deskripsi'       => 'nullable|string',
            'gambar_kategori' => 'nullable|image|mimes:jpg,jpeg,png,gif,webp|max:2048',
        ]);

        $gambarPath = null;
        if ($request->hasFile('gambar_kategori')) {
            $file = $request->file('gambar_kategori');
            $ext = $file->getClientOriginalExtension();

            // nama file aman → timestamp + uniqid + ekstensi
            $fileName = time() . '_' . uniqid() . '.' . $ext;
            $file->move(public_path('images/kategori'), $fileName);

            $gambarPath = 'images/kategori/' . $fileName;
        }

        Kategori::create([
            'nama_kategori'   => $request->nama_kategori,
            'deskripsi'       => $request->deskripsi,
            'gambar_kategori' => $gambarPath,
        ]);

        return redirect()->route('admin.kategori.index')->with('success', 'Kategori berhasil ditambahkan');
    }

    public function edit(Kategori $kategori)
    {
        return view('admin.kategori.edit', compact('kategori'));
    }

    public function update(Request $request, Kategori $kategori)
    {
        $request->validate([
            'nama_kategori'   => 'required|string|max:255',
            'deskripsi'       => 'nullable|string',
            'gambar_kategori' => 'nullable|image|mimes:jpg,jpeg,png,gif,webp|max:2048',
        ]);

        if ($request->hasFile('gambar_kategori')) {
            // hapus gambar lama kalau ada
            if ($kategori->gambar_kategori && file_exists(public_path($kategori->gambar_kategori))) {
                unlink(public_path($kategori->gambar_kategori));
            }

            $file = $request->file('gambar_kategori');
            $ext = $file->getClientOriginalExtension();

            $fileName = time() . '_' . uniqid() . '.' . $ext;
            $file->move(public_path('images/kategori'), $fileName);

            $kategori->gambar_kategori = 'images/kategori/' . $fileName;
        }

        $kategori->nama_kategori = $request->nama_kategori;
        $kategori->deskripsi     = $request->deskripsi;
        $kategori->save();

        return redirect()->route('admin.kategori.index')->with('success', 'Kategori berhasil diperbarui');
    }

    public function destroy(Kategori $kategori)
    {
        if ($kategori->gambar_kategori && file_exists(public_path($kategori->gambar_kategori))) {
            unlink(public_path($kategori->gambar_kategori));
        }

        $kategori->delete();
        return redirect()->route('admin.kategori.index')->with('success', 'Kategori berhasil dihapus');
    }
}
