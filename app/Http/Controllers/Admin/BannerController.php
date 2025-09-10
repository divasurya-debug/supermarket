<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Banner;
use Illuminate\Support\Facades\Storage;

class BannerController extends Controller
{
    /**
     * Tampilkan semua banner
     */
    public function index()
    {
        $banners = Banner::latest()->get();
        return view('admin.banner.index', compact('banners'));
    }

    /**
     * Form create banner
     */
    public function create()
    {
        return view('admin.banner.create');
    }

    /**
     * Simpan banner baru
     */
    public function store(Request $request)
    {
        $request->validate([
            'gambar' => 'required|image|mimes:jpeg,png,jpg,gif,webp|max:2048',
        ]);

        // simpan ke storage/app/public/banners
        $path = $request->file('gambar')->store('banners', 'public');

        Banner::create([
            'gambar' => $path, // sesuai nama kolom di tabel
        ]);

        return redirect()->route('admin.banner.index')->with('success', 'Banner berhasil ditambahkan.');
    }

    /**
     * Form edit banner
     */
    public function edit($id)
    {
        $banner = Banner::findOrFail($id);
        return view('admin.banner.edit', compact('banner'));
    }

    /**
     * Update banner
     */
    public function update(Request $request, $id)
    {
        $banner = Banner::findOrFail($id);

        $request->validate([
            'gambar' => 'nullable|image|mimes:jpeg,png,jpg,gif,webp|max:2048',
        ]);

        $data = [];

        if ($request->hasFile('gambar')) {
            // hapus file lama jika ada
            if ($banner->gambar && Storage::disk('public')->exists($banner->gambar)) {
                Storage::disk('public')->delete($banner->gambar);
            }

            // simpan file baru
            $path = $request->file('gambar')->store('banners', 'public');
            $data['gambar'] = $path;
        }

        $banner->update($data);

        return redirect()->route('admin.banner.index')->with('success', 'Banner berhasil diperbarui.');
    }

    /**
     * Hapus banner
     */
    public function destroy($id)
    {
        $banner = Banner::findOrFail($id);

        // hapus file jika ada
        if ($banner->gambar && Storage::disk('public')->exists($banner->gambar)) {
            Storage::disk('public')->delete($banner->gambar);
        }

        $banner->delete();

        return redirect()->route('admin.banner.index')->with('success', 'Banner berhasil dihapus.');
    }
}
