<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Discount;
use App\Models\Product;
use Illuminate\Http\Request;

class DiscountController extends Controller
{
    public function index()
    {
        // Ambil data diskon & produk terkait untuk efisiensi
        $discounts = Discount::with('product')->latest()->paginate(10);
        return view('admin.diskon.index', compact('discounts'));
    }

    public function create()
    {
        // Ambil semua produk untuk pilihan di form
        $products = Product::orderBy('nama_produk')->get();
        return view('admin.diskon.create', compact('products'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'id_produk'           => 'required|exists:tb_produk,id_produk',
            'persentase_diskon'   => 'required|integer|min:1|max:100',
            'tanggal_mulai'       => 'required|date',
            'tanggal_akhir'       => 'required|date|after_or_equal:tanggal_mulai',
        ]);

        Discount::create($validated);

        return redirect()->route('admin.diskon.index')->with('success', 'Diskon berhasil ditambahkan.');
    }

    public function edit(Discount $discount)
    {
        $products = Product::orderBy('nama_produk')->get();
        return view('admin.diskon.edit', compact('discount', 'products'));
    }

    public function update(Request $request, Discount $discount)
    {
        $validated = $request->validate([
            'id_produk'           => 'required|exists:tb_produk,id_produk',
            'persentase_diskon'   => 'required|integer|min:1|max:100',
            'tanggal_mulai'       => 'required|date',
            'tanggal_akhir'       => 'required|date|after_or_equal:tanggal_mulai',
        ]);

        $discount->update($validated);

        return redirect()->route('admin.diskon.index')->with('success', 'Diskon berhasil diperbarui.');
    }

    public function destroy(Discount $discount)
    {
        $discount->delete();
        return redirect()->route('admin.diskon.index')->with('success', 'Diskon berhasil dihapus.');
    }
}