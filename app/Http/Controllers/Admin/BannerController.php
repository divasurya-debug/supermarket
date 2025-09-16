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

        $url = null;

        if ($request->hasFile('gambar')) {
            // Upload ke Cloudinary, folder 'banners'
            $uploadedFile = $request->file('gambar');
            $cloudinaryPath = $uploadedFile->storeOnCloudinary('banners');
            $url = $cloudinaryPath->getSecurePath(); // ambil URL HTTPS
        }

        Banner::create([
            'gambar' => $url, // simpan URL Cloudinary
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
            // Optional: hapus file lama di Cloudinary
            // Jika mau hapus, bisa pakai Cloudinary SDK deleteByPublicId
            // Contoh:
            // \Cloudinary\Uploader::destroy($banner->public_id);

            // Upload file baru ke Cloudinary
            $uploadedFile = $request->file('gambar');
            $cloudinaryPath = $uploadedFile->storeOnCloudinary('banners');
            $data['gambar'] = $cloudinaryPath->getSecurePath();
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

        // Optional: hapus file di Cloudinary jika mau
        // \Cloudinary\Uploader::destroy($banner->public_id);

        $banner->delete();

        return redirect()->route('admin.banner.index')->with('success', 'Banner berhasil dihapus.');
    }
}
