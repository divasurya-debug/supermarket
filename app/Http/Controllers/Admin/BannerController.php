<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Banner;
use Illuminate\Support\Facades\Storage;

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
            'gambar' => 'required|image|mimes:jpeg,png,jpg,gif,webp|max:2048',
        ]);

        // simpan file ke storage/app/public/banners
        $path = $request->file('gambar')->store('banners', 'public');

        Banner::create([
            'gambar' => 'storage/' . $path, // simpan path untuk asset()
        ]);

        return redirect()->route('admin.banner.index')->with('success', 'Banner berhasil ditambahkan.');
    }

    public function edit($id)
    {
        $banner = Banner::findOrFail($id);
        return view('admin.banner.edit', compact('banner'));
    }

    public function update(Request $request, $id)
    {
        $banner = Banner::findOrFail($id);

        $request->validate([
            'gambar' => 'nullable|image|mimes:jpeg,png,jpg,gif,webp|max:2048',
        ]);

        if ($request->hasFile('gambar')) {
            // hapus file lama jika ada
            if ($banner->gambar && Storage::exists(str_replace('storage/', 'public/', $banner->gambar))) {
                Storage::delete(str_replace('storage/', 'public/', $banner->gambar));
            }

            $path = $request->file('gambar')->store('banners', 'public');
            $banner->gambar = 'storage/' . $path;
        }

        $banner->save();

        return redirect()->route('admin.banner.index')->with('success', 'Banner berhasil diperbarui.');
    }

    public function destroy($id)
    {
        $banner = Banner::findOrFail($id);

        if ($banner->gambar && Storage::exists(str_replace('storage/', 'public/', $banner->gambar))) {
            Storage::delete(str_replace('storage/', 'public/', $banner->gambar));
        }

        $banner->delete();

        return redirect()->route('admin.banner.index')->with('success', 'Banner berhasil dihapus.');
    }
}
