<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Banner;

class BannerController extends Controller
{
    public function index()
    {
        $banners = Banner::all();
        return view('admin.banner.index', compact('banners'));
    }

    public function create()
    {
        return view('admin.banner.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'gambar' => 'required|image|max:2048',
        ]);

        // simpan file
        $fileName = time().'_'.$request->file('gambar')->getClientOriginalName();
        $request->file('gambar')->move(public_path('images/banners'), $fileName);

        Banner::create([
            'gambar' => 'images/banners/' . $fileName,
        ]);

        return redirect()->route('admin.banner.index')->with('success', 'Banner berhasil ditambahkan');
    }

    public function edit(Banner $banner)
    {
        return view('admin.banner.edit', compact('banner'));
    }

    public function update(Request $request, Banner $banner)
    {
        $request->validate([
            'gambar' => 'nullable|image|max:2048',
        ]);

        if ($request->hasFile('gambar')) {
            $fileName = time().'_'.$request->file('gambar')->getClientOriginalName();
            $request->file('gambar')->move(public_path('images/banners'), $fileName);

            $banner->update([
                'gambar' => 'images/banners/' . $fileName,
            ]);
        }

        return redirect()->route('admin.banner.index')->with('success', 'Banner berhasil diupdate');
    }

    public function destroy(Banner $banner)
    {
        $banner->delete();
        return redirect()->route('admin.banner.index')->with('success', 'Banner berhasil dihapus');
    }
}
