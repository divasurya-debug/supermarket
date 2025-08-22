<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AdminCartController extends Controller
{
    public function index()
    {
        return view('admin.keranjang.index');
    }

    public function create()
    {
        return view('admin.keranjang.create');
    }

    public function store(Request $request)
    {
        // logika simpan data keranjang admin
        return redirect()->route('admin.keranjang.index')->with('success', 'Data keranjang berhasil ditambahkan!');
    }

    public function show($id)
    {
        return view('admin.keranjang.show', compact('id'));
    }

    public function edit($id)
    {
        return view('admin.keranjang.edit', compact('id'));
    }

    public function update(Request $request, $id)
    {
        // logika update data keranjang admin
        return redirect()->route('admin.keranjang.index')->with('success', 'Data keranjang berhasil diperbarui!');
    }

    public function destroy($id)
    {
        // logika hapus data keranjang admin
        return redirect()->route('admin.keranjang.index')->with('success', 'Data keranjang berhasil dihapus!');
    }
}
