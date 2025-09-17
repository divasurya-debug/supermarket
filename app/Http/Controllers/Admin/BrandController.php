<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Brand;
use Cloudinary\Cloudinary;

class BrandController extends Controller
{
    /**
     * Tampilkan semua brand
     */
    public function index()
    {
        $brands = Brand::latest()->paginate(10);
        return view('admin.brands.index', compact('brands'));
    }

    /**
     * Form tambah brand
     */
    public function create()
    {
        return view('admin.brands.create');
    }

    /**
     * Simpan brand baru
     */
    public function store(Request $request)
    {
        $request->validate([
            'nama_merek'   => 'required|string|max:255',
            'negara_asal'  => 'nullable|string|max:255',
            'gambar'       => 'nullable|image|mimes:jpeg,png,jpg,gif,webp|max:2048',
        ]);

        $url = null;

        if ($request->hasFile('gambar')) {
            $uploadedFile = $request->file('gambar')->getRealPath();

            $cloudinary = new Cloudinary(env('CLOUDINARY_URL'));

            $result = $cloudinary->uploadApi()->upload($uploadedFile, [
                'folder' => 'brands',
            ]);

            $url = $result['secure_url'];
        }

        Brand::create([
            'nama_merek'  => $request->nama_merek,
            'negara_asal' => $request->negara_asal,
            'gambar'      => $url,
        ]);

        return redirect()->route('admin.brands.index')->with('success', 'Brand berhasil ditambahkan.');
    }

    /**
     * Form edit brand
     */
    public function edit($id)
    {
        $brand = Brand::findOrFail($id);
        return view('admin.brands.edit', compact('brand'));
    }

    /**
     * Update brand
     */
    public function update(Request $request, $id)
    {
        $brand = Brand::findOrFail($id);

        $request->validate([
            'nama_merek'   => 'required|string|max:255',
            'negara_asal'  => 'nullable|string|max:255',
            'gambar'       => 'nullable|image|mimes:jpeg,png,jpg,gif,webp|max:2048',
        ]);

        $data = [
            'nama_merek'  => $request->nama_merek,
            'negara_asal' => $request->negara_asal,
        ];

        $cloudinary = new Cloudinary(env('CLOUDINARY_URL'));

        if ($request->hasFile('gambar')) {
            // Hapus gambar lama jika ada
            if ($brand->gambar) {
                $publicId = pathinfo($brand->gambar, PATHINFO_FILENAME);
                $cloudinary->uploadApi()->destroy("brands/$publicId");
            }

            // Upload gambar baru
            $uploadedFile = $request->file('gambar')->getRealPath();
            $result = $cloudinary->uploadApi()->upload($uploadedFile, [
                'folder' => 'brands',
            ]);
            $data['gambar'] = $result['secure_url'];
        }

        $brand->update($data);

        return redirect()->route('admin.brands.index')->with('success', 'Brand berhasil diperbarui.');
    }

    /**
     * Hapus brand
     */
    public function destroy($id)
    {
        $brand = Brand::findOrFail($id);

        $cloudinary = new Cloudinary(env('CLOUDINARY_URL'));

        if ($brand->gambar) {
            $publicId = pathinfo($brand->gambar, PATHINFO_FILENAME);
            $cloudinary->uploadApi()->destroy("brands/$publicId");
        }

        $brand->delete();

        return redirect()->route('admin.brands.index')->with('success', 'Brand berhasil dihapus.');
    }
}
