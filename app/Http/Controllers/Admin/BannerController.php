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

            $cloudinary = new Cloudinary([
                'cloud' => [
                    'cloud_name' => env('CLOUDINARY_CLOUD_NAME'),
                    'api_key'    => env('CLOUDINARY_API_KEY'),
                    'api_secret' => env('CLOUDINARY_API_SECRET'),
                ],
            ]);

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

        if ($request->hasFile('gambar')) {
            $uploadedFile = $request->file('gambar')->getRealPath();

            $cloudinary = new Cloudinary([
                'cloud' => [
                    'cloud_name' => env('CLOUDINARY_CLOUD_NAME'),
                    'api_key'    => env('CLOUDINARY_API_KEY'),
                    'api_secret' => env('CLOUDINARY_API_SECRET'),
                ],
            ]);

            // Hapus banner lama jika ada
            if ($banner->gambar) {
                // Extract public_id dari URL
                $parsed = pathinfo($banner->gambar);
                $publicId = 'banners/' . $parsed['filename'];
                try {
                    $cloudinary->uploadApi()->destroy($publicId);
                } catch (\Exception $e) {
                    // Tidak gagal jika file lama tidak ada
                }
            }

            // Upload file baru
            $result = $cloudinary->uploadApi()->upload($uploadedFile, [
                'folder' => 'banners',
            ]);

            $banner->update([
                'gambar' => $result['secure_url'],
            ]);
        }

        return redirect()->route('admin.banner.index')->with('success', 'Banner berhasil diperbarui.');
    }

    /**
     * Hapus banner
     */
    public function destroy($id)
    {
        $banner = Banner::findOrFail($id);

        // Hapus file dari Cloudinary jika ada
        if ($banner->gambar) {
            $cloudinary = new Cloudinary([
                'cloud' => [
                    'cloud_name' => env('CLOUDINARY_CLOUD_NAME'),
                    'api_key'    => env('CLOUDINARY_API_KEY'),
                    'api_secret' => env('CLOUDINARY_API_SECRET'),
                ],
            ]);

            $parsed = pathinfo($banner->gambar);
            $publicId = 'banners/' . $parsed['filename'];
            try {
                $cloudinary->uploadApi()->destroy($publicId);
            } catch (\Exception $e) {
                // Tidak gagal jika file tidak ada
            }
        }

        $banner->delete();

        return redirect()->route('admin.banner.index')->with('success', 'Banner berhasil dihapus.');
    }
}
