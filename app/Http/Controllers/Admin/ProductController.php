<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

// Import Model yang dibutuhkan
use App\Models\Product;
use App\Models\Brand;
use App\Models\Kategori;

class ProductController extends Controller
{
    /**
     * Menampilkan halaman daftar produk.
     */
    public function index()
    {
        // Ambil semua data produk dengan relasi brand dan kategori
        $products = Product::with('brand', 'kategori')->latest()->paginate(10);
        return view('admin.produk.index', compact('products'));
    }

    /**
     * Menampilkan form untuk membuat produk baru.
     */
    public function create()
    {
        // Ambil data brands dan kategori untuk pilihan di form
        $brands = Brand::all();
        $kategori = Kategori::all();
        return view('admin.produk.create', compact('brands', 'kategori'));
    }

    /**
     * Menyimpan produk baru ke dalam database.
     */
    public function store(Request $request)
    {
        // 1. Validasi input
        $validated = $request->validate([
            'nama_produk'   => 'required|string|max:255',
            'id_brands'     => 'required|exists:tb_brands,id_brands',
            'id_kategori'   => 'required|exists:tb_kategori,id_kategori',
            'harga'         => 'required|numeric|min:0',
            'stok'          => 'required|integer|min:0',
            'deskripsi'     => 'nullable|string',
            'gambar'        => 'required|image|mimes:jpeg,png,jpg,gif|max:2048', // max 2MB
        ]);

        // 2. Proses upload gambar
        if ($request->hasFile('gambar')) {
            // Simpan gambar ke storage/app/public/products
            $path = $request->file('gambar')->store('products', 'public');
            $validated['gambar'] = $path;
        }

        // 3. Simpan data ke database
        Product::create($validated);

        // 4. Redirect dengan pesan sukses
        return redirect()->route('admin.produk.index')->with('success', 'Produk berhasil ditambahkan!');
    }

    /**
     * Menampilkan form untuk mengedit produk.
     */
    public function edit(Product $produk)
    {
        // Ambil data brands dan kategori untuk pilihan di form
        $brands = Brand::all();
        $kategori = Kategori::all();
        return view('admin.produk.edit', compact('produk', 'brands', 'kategori'));
    }

    /**
     * Mengupdate data produk di database.
     */
    public function update(Request $request, Product $produk)
    {
        // 1. Validasi input
        $validated = $request->validate([
            'nama_produk'   => 'required|string|max:255',
            'id_brands'     => 'required|exists:tb_brands,id_brands',
            'id_kategori'   => 'required|exists:tb_kategori,id_kategori',
            'harga'         => 'required|numeric|min:0',
            'stok'          => 'required|integer|min:0',
            'deskripsi'     => 'nullable|string',
            'gambar'        => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048', // Gambar tidak wajib diupdate
        ]);

        // 2. Proses update gambar jika ada gambar baru
        if ($request->hasFile('gambar')) {
            // Hapus gambar lama jika ada
            if ($produk->gambar) {
                Storage::disk('public')->delete($produk->gambar);
            }
            // Upload gambar baru
            $path = $request->file('gambar')->store('products', 'public');
            $validated['gambar'] = $path;
        }

        // 3. Update data di database
        $produk->update($validated);

        // 4. Redirect dengan pesan sukses
        return redirect()->route('admin.produk.index')->with('success', 'Produk berhasil diperbarui!');
    }

    /**
     * Menghapus produk dari database.
     */
    public function destroy(Product $produk)
    {
        // Hapus gambar dari storage
        if ($produk->gambar) {
            Storage::disk('public')->delete($produk->gambar);
        }

        // Hapus data dari database
        $produk->delete();

        // Redirect dengan pesan sukses
        return redirect()->route('admin.produk.index')->with('success', 'Produk berhasil dihapus!');
    }
}