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
    // 1️⃣ Validasi input
    $request->validate([
        'nama_kategori'   => 'required|string|max:255',
        'deskripsi'       => 'nullable|string',
        'gambar_kategori' => 'required|image|mimes:jpg,jpeg,png,gif,webp|max:2048',
    ]);

    // 2️⃣ Cek file upload
    if (!$request->hasFile('gambar_kategori') || !$request->file('gambar_kategori')->isValid()) {
        return back()->with('error', 'File tidak valid atau tidak ditemukan!');
    }

    $file = $request->file('gambar_kategori');
    $namaFile = time() . '_' . $file->getClientOriginalName();

    // 3️⃣ Path tujuan
    $destinationPath = storage_path('app/public/uploads/kategori');

    // 4️⃣ Pastikan folder ada
    if (!is_dir($destinationPath)) {
        mkdir($destinationPath, 0777, true);
    }

    // 5️⃣ Pastikan folder writable
    if (!is_writable($destinationPath)) {
        return back()->with('error', 'Folder storage tidak bisa ditulis! Periksa permission folder: '.$destinationPath);
    }

    // 6️⃣ Coba pindahkan file manual dan debug
    try {
        $fileMoved = $file->move($destinationPath, $namaFile);
    } catch (\Exception $e) {
        return back()->with('error', 'Gagal memindahkan file: ' . $e->getMessage());
    }

    if (!$fileMoved || !file_exists($destinationPath.'/'.$namaFile)) {
        return back()->with('error', 'File gagal disimpan di storage!');
    }

    // 7️⃣ Simpan data ke database
    $gambarPath = 'uploads/kategori/'.$namaFile; // path relatif untuk asset

    Kategori::create([
        'nama_kategori'   => $request->nama_kategori,
        'deskripsi'       => $request->deskripsi,
        'gambar_kategori' => $gambarPath,
    ]);

    return redirect()->route('admin.kategori.index')->with('success', 'Kategori berhasil ditambahkan!');
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
