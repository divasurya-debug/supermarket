<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Kategori;
use Illuminate\Support\Facades\Storage;

class KategoriController extends Controller
{
    /**
     * Tampilkan semua kategori
     */
    public function index()
    {
        $kategoris = Kategori::all();
        return view('admin.kategori.index', compact('kategoris'));
    }

    /**
     * Form tambah kategori
     */
    public function create()
    {
        return view('admin.kategori.create');
    }

    /**
     * Simpan kategori baru
     */
   public function store(Request $request)
{
    $request->validate([
        'nama_kategori'   => 'required|string|max:255|unique:tb_kategori,nama_kategori',
        'deskripsi'       => 'nullable|string',
        'gambar_kategori' => 'required|image|mimes:jpg,jpeg,png,gif,webp|max:2048',
    ]);

    $path = null;

    if ($request->hasFile('gambar_kategori')) {
        // Simpan file ke storage/app/public/uploads/kategori
        $path = $request->file('gambar_kategori')->store('uploads/kategori', 'public');
    }

    // Simpan ke database
    $kategori = new Kategori();
    $kategori->nama_kategori   = $request->nama_kategori;
    $kategori->deskripsi       = $request->deskripsi;
    $kategori->gambar_kategori = $path; // simpan path relatif, contoh: uploads/kategori/xxxx.png
    $kategori->save();

    return redirect()->route('admin.kategori.index')
        ->with('success', 'Kategori berhasil ditambahkan.');
}



    /**
     * Form edit kategori
     */
    public function edit(Kategori $kategori)
    {
        return view('admin.kategori.edit', compact('kategori'));
    }

    /**
     * Update kategori
     */
    public function update(Request $request, Kategori $kategori)
    {
        $request->validate([
            'nama_kategori'   => 'required|string|max:255|unique:tb_kategori,nama_kategori,' . $kategori->id_kategori . ',id_kategori',
            'deskripsi'       => 'nullable|string',
            'gambar_kategori' => 'nullable|image|mimes:jpg,jpeg,png,gif,webp|max:2048',
        ]);

        // Update file gambar jika ada upload baru
        if ($request->hasFile('gambar_kategori')) {
            // Hapus file lama kalau ada
            if ($kategori->gambar_kategori && Storage::disk('public')->exists($kategori->gambar_kategori)) {
                Storage::disk('public')->delete($kategori->gambar_kategori);
            }

            $kategori->gambar_kategori = $request->file('gambar_kategori')->store('uploads/kategori', 'public');
        }

        // Update field lain
        $kategori->nama_kategori = $request->nama_kategori;
        $kategori->deskripsi     = $request->deskripsi;
        $kategori->save();

        return redirect()->route('admin.kategori.index')->with('success', 'Kategori berhasil diperbarui');
    }

    /**
     * Hapus kategori
     */
    public function destroy(Kategori $kategori)
    {
        // Hapus file gambar kalau ada
        if ($kategori->gambar_kategori && Storage::disk('public')->exists($kategori->gambar_kategori)) {
            Storage::disk('public')->delete($kategori->gambar_kategori);
        }

        $kategori->delete();

        return redirect()->route('admin.kategori.index')->with('success', 'Kategori berhasil dihapus');
    }
}
