<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Banner;

class BannerController extends Controller
{
    // Tampilkan semua banner
    public function index()
    {
        $banners = Banner::all();
        return view('admin.banner.index', compact('banners'));
    }

    // Form tambah banner
    public function create()
    {
        return view('admin.banner.create');
    }

    // Simpan banner baru
    public function store(Request $request)
    {
        $request->validate([
            'gambar' => 'required|image|max:2048',
        ]);

        // simpan path relatif ke storage/app/public/images
        $path = $request->file('gambar')->store('banners', 'public');

        Banner::create([
            'gambar' => $path, // simpan hanya path relatif
        ]);

        return redirect()->route('admin.banner.index')->with('success', 'Banner berhasil ditambahkan');
    }

    // Form edit banner
    public function edit(Banner $banner)
    {
        return view('admin.banner.edit', compact('banner'));
    }

    // Update banner
    public function update(Request $request, Banner $banner)
    {
        $request->validate([
            'gambar' => 'nullable|image|max:2048',
        ]);

        if ($request->hasFile('gambar')) {
            $path = $request->file('gambar')->store('banners', 'public');
            $banner->update(['gambar' => $path]);
        }

        return redirect()->route('admin.banner.index')->with('success', 'Banner berhasil diupdate');
    }

    // Hapus banner
    public function destroy(Banner $banner)
    {
        $banner->delete();
        return redirect()->route('admin.banner.index')->with('success', 'Banner berhasil dihapus');
    }
}
