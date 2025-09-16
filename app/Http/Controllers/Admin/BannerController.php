<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Banner;
use Cloudinary\Cloudinary;

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
            $uploadedFile = $request->file('gambar')->getRealPath();

            $cloudinary = new Cloudinary(env('CLOUDINARY_URL'));

            $result = $cloudinary->uploadApi()->upload($uploadedFile, [
                'folder' => 'banners',
            ]);

            $url = $result['secure_url'];
        }

        Banner::create([
            'gambar' => $url,
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

        $cloudinary = new Cloudinary(env('CLOUDINARY_URL'));

        if ($request->hasFile('gambar')) {
            // Hapus banner lama dari Cloudinary jika ada
            if ($banner->gambar) {
                $publicId = pathinfo($banner->gambar, PATHINFO_FILENAME);
                $cloudinary->uploadApi()->destroy("banners/$publicId");
            }

            // Upload file baru
            $uploadedFile = $request->file('gambar')->getRealPath();
            $result = $cloudinary->uploadApi()->upload($uploadedFile, [
                'folder' => 'banners',
            ]);
            $data['gambar'] = $result['secure_url'];
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

        $cloudinary = new Cloudinary(env('CLOUDINARY_URL'));

        // Hapus banner dari Cloudinary jika ada
        if ($banner->gambar) {
            $publicId = pathinfo($banner->gambar, PATHINFO_FILENAME);
            $cloudinary->uploadApi()->destroy("banners/$publicId");
        }

        $banner->delete();

        return redirect()->route('admin.banner.index')->with('success', 'Banner berhasil dihapus.');
    }
}
