<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use CloudinaryLabs\CloudinaryLaravel\Facades\Cloudinary;
use App\Models\Brand;

class BrandController extends Controller
{
    public function index()
    {
        $brands = Brand::latest()->paginate(10);
        return view('admin.brands.index', compact('brands'));
    }

    public function create()
    {
        return view('admin.brands.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'nama_brand' => 'required|string|max:255',
            'negara_asal' => 'nullable|string|max:255',
            'gambar' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        if ($request->hasFile('gambar')) {
            // ✅ Upload ke Cloudinary
            $upload = Cloudinary::upload(
                $request->file('gambar')->getRealPath(),
                ['folder' => 'brands']
            );

            $validated['gambar'] = $upload->getSecurePath(); // URL Cloudinary
        }

        Brand::create($validated);

        return redirect()->route('admin.brands.index')
            ->with('success', 'Brand berhasil ditambahkan!');
    }

    public function edit(Brand $brand)
    {
        return view('admin.brands.edit', compact('brand'));
    }

    public function update(Request $request, Brand $brand)
    {
        $validated = $request->validate([
            'nama_brand' => 'required|string|max:255',
            'negara_asal' => 'nullable|string|max:255',
            'gambar' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        if ($request->hasFile('gambar')) {
            // ✅ Hapus gambar lama di Cloudinary
            if ($brand->gambar) {
                $publicId = pathinfo($brand->gambar, PATHINFO_FILENAME);
                Cloudinary::destroy('brands/' . $publicId);
            }

            // ✅ Upload gambar baru
            $upload = Cloudinary::upload(
                $request->file('gambar')->getRealPath(),
                ['folder' => 'brands']
            );

            $validated['gambar'] = $upload->getSecurePath();
        }

        $brand->update($validated);

        return redirect()->route('admin.brands.index')
            ->with('success', 'Brand berhasil diperbarui!');
    }

    public function destroy(Brand $brand)
    {
        if ($brand->gambar) {
            $publicId = pathinfo($brand->gambar, PATHINFO_FILENAME);
            Cloudinary::destroy('brands/' . $publicId);
        }

        $brand->delete();

        return redirect()->route('admin.brands.index')
            ->with('success', 'Brand berhasil dihapus!');
    }
}
