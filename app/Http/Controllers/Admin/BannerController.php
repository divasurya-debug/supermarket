<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Banner;
use Illuminate\Http\Request;

class BannerController extends Controller
{
    public function index()
    {
        $banners = Banner::latest()->get();
        return view('admin.banner.index', compact('banners'));
    }

    public function create()
    {
        return view('admin.banner.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'gambar' => 'required|image|mimes:jpg,jpeg,png|max:2048'
        ]);

        $path = null;
        if ($request->hasFile('gambar')) {
            $file = $request->file('gambar');
            $filename = time() . '.' . $file->getClientOriginalExtension();
            $file->move(public_path('uploads/banners'), $filename);

            $path = 'uploads/banners/' . $filename;
        }

        Banner::create([
            'gambar' => $path
        ]);

        return redirect()->route('admin.banner.index')->with('success', 'Banner berhasil ditambahkan!');
    }

    public function edit(Banner $banner)
    {
        return view('admin.banner.edit', compact('banner'));
    }

    public function update(Request $request, Banner $banner)
    {
        $request->validate([
            'gambar' => 'nullable|image|mimes:jpg,jpeg,png|max:2048'
        ]);

        if ($request->hasFile('gambar')) {
            // Hapus file lama kalau ada
            if ($banner->gambar && file_exists(public_path($banner->gambar))) {
                unlink(public_path($banner->gambar));
            }

            $file = $request->file('gambar');
            $filename = time() . '.' . $file->getClientOriginalExtension();
            $file->move(public_path('uploads/banners'), $filename);

            $banner->gambar = 'uploads/banners/' . $filename;
        }

        $banner->save();

        return redirect()->route('admin.banner.index')->with('success', 'Banner berhasil diupdate!');
    }

    public function destroy(Banner $banner)
    {
        // Hapus file dari public
        if ($banner->gambar && file_exists(public_path($banner->gambar))) {
            unlink(public_path($banner->gambar));
        }

        $banner->delete();

        return redirect()->route('admin.banner.index')->with('success', 'Banner berhasil dihapus!');
    }
}
