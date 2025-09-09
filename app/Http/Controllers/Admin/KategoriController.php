<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Kategori;
use Illuminate\Support\Facades\Storage;

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
    // DEBUG 1: cek isi request
    dd([
        'all_request' => $request->all(),
        'file_present' => $request->hasFile('gambar_kategori'),
    ]);

    $request->validate([
        'nama_kategori'   => 'required|string|max:255',
        'deskripsi'       => 'nullable|string',
        'gambar_kategori' => 'required|image|mimes:jpg,jpeg,png,gif,webp|max:2048',
    ]);

    $gambarPath = null;

    if ($request->hasFile('gambar_kategori')) {
        $file = $request->file('gambar_kategori');

        // DEBUG 2: cek apakah file valid
        if (!$file->isValid()) {
            dd('File upload tidak valid!');
        }

        $namaFile = time().'_'.$file->getClientOriginalName();

        // Simpan file ke storage/app/public/uploads/kategori
        $gambarPath = $file->storeAs('uploads/kategori', $namaFile, 'public');

        // DEBUG 3: cek hasil penyimpanan
        dd([
            'uploaded'   => $file->getClientOriginalName(),
            'saved_path' => $gambarPath,
            'full_path'  => storage_path('app/public/'.$gambarPath),
            'exists_in_storage' => file_exists(storage_path('app/public/'.$gambarPath)),
        ]);
    } else {
        dd('Tidak ada file di request!');
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
            // Hapus file lama kalau ada
            if ($kategori->gambar_kategori && Storage::disk('public')->exists($kategori->gambar_kategori)) {
                Storage::disk('public')->delete($kategori->gambar_kategori);
            }

            $kategori->gambar_kategori = $request->file('gambar_kategori')->store('uploads/kategori', 'public');
        }

        $kategori->nama_kategori = $request->nama_kategori;
        $kategori->deskripsi     = $request->deskripsi;
        $kategori->save();

        return redirect()->route('admin.kategori.index')->with('success', 'Kategori berhasil diperbarui');
    }

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
