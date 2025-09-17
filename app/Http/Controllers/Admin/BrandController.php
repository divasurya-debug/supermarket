<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Brand;
use Illuminate\Http\Request;
use CloudinaryLabs\CloudinaryLaravel\Facades\Cloudinary;

class BrandController extends Controller
{
    // Tampilkan semua brand
    public function index()
    {
        $brands = Brand::paginate(10);
        return view('admin.brands.index', compact('brands'));
    }

    // Form tambah brand
    public function create()
    {
        return view('admin.brands.create');
    }

    // Simpan brand baru
    public function store(Request $request)
    {
        $request->validate([
            'nama_merek' => 'required|string|max:255',
            'negara_asal' => 'nullable|string|max:255',
            'gambar' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
        ]);

        $brand = new Brand();
        $brand->nama_merek = $request->nama_merek;
        $brand->negara_asal = $request->negara_asal;

        // Upload gambar ke Cloudinary
        if ($request->hasFile('gambar')) {
            $upload = Cloudinary::upload(
                $request->file('gambar')->getRealPath(),
                ['folder' => 'brands']
            );

            $brand->gambar = $upload->getSecurePath(); // URL untuk ditampilkan
            $brand->gambar_public_id = $upload->getPublicId(); // simpan public_id
        }

        $brand->save();

        return redirect()->route('admin.brands.index')->with('success', 'Brand berhasil ditambahkan');
    }

    // Form edit brand
    public function edit($id)
    {
        $brand = Brand::findOrFail($id);
        return view('admin.brands.edit', compact('brand'));
    }

    // Update brand
    public function update(Request $request, $id)
    {
        $request->validate([
            'nama_merek' => 'required|string|max:255',
            'negara_asal' => 'nullable|string|max:255',
            'gambar' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
        ]);

        $brand = Brand::findOrFail($id);
        $brand->nama_merek = $request->nama_merek;
        $brand->negara_asal = $request->negara_asal;

        // Upload gambar baru ke Cloudinary (hapus lama jika ada)
        if ($request->hasFile('gambar')) {
            // Hapus gambar lama dari Cloudinary
            if ($brand->gambar_public_id) {
                try {
                    Cloudinary::destroy($brand->gambar_public_id);
                } catch (\Exception $e) {
                    // biarin aja kalau gagal hapus
                }
            }

            $upload = Cloudinary::upload(
                $request->file('gambar')->getRealPath(),
                ['folder' => 'brands']
            );

            $brand->gambar = $upload->getSecurePath();
            $brand->gambar_public_id = $upload->getPublicId();
        }

        $brand->save();

        return redirect()->route('admin.brands.index')->with('success', 'Brand berhasil diperbarui');
    }

    // Hapus brand
    public function destroy($id)
    {
        $brand = Brand::findOrFail($id);

        // Hapus gambar di Cloudinary
        if ($brand->gambar_public_id) {
            try {
                Cloudinary::destroy($brand->gambar_public_id);
            } catch (\Exception $e) {
                // biarkan jika gagal hapus
            }
        }

        $brand->delete();

        return redirect()->route('admin.brands.index')->with('success', 'Brand berhasil dihapus');
    }
}
