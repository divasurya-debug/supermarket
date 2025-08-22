<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller; // ✅ pastikan ada baris ini
use App\Models\Brand;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class BrandController extends Controller
{
    // Tampilkan semua brand
   public function index()
{
    $brands = Brand::paginate(10); // atau simplePaginate(10)
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
            'negara_asal' => 'required|string|max:255',
            'gambar' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
        ]);

        $brand = new Brand();
        $brand->nama_merek = $request->nama_merek;
        $brand->negara_asal = $request->negara_asal;

        // Upload gambar ke public/images/brands
        if ($request->hasFile('gambar')) {
            $file = $request->file('gambar');
            $filename = time() . '_' . $file->getClientOriginalName();
            $file->move(public_path('images/brands'), $filename);
            $brand->gambar = 'images/brands/' . $filename;
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
            'negara_asal' => 'required|string|max:255',
            'gambar' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
        ]);

        $brand = Brand::findOrFail($id);
        $brand->nama_merek = $request->nama_merek;
        $brand->negara_asal = $request->negara_asal;

        // Upload gambar baru kalau ada
        if ($request->hasFile('gambar')) {
            $file = $request->file('gambar');
            $filename = time() . '_' . $file->getClientOriginalName();
            $file->move(public_path('images/brands'), $filename);
            $brand->gambar = 'images/brands/' . $filename;
        }

        $brand->save();

        return redirect()->route('admin.brands.index')->with('success', 'Brand berhasil diperbarui');
    }

    // Hapus brand
    public function destroy($id)
    {
        $brand = Brand::findOrFail($id);

        // Hapus file gambar dari public/images/brands jika ada
        if ($brand->gambar && file_exists(public_path($brand->gambar))) {
            unlink(public_path($brand->gambar));
        }

        $brand->delete();

        return redirect()->route('admin.brands.index')->with('success', 'Brand berhasil dihapus');
    }
}
