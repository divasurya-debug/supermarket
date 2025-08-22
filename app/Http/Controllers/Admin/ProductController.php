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
            'nama_produk'       => 'required|string|max:255',
            'id_brands'         => 'required|exists:tb_brands,id_brands',
            'id_kategori'       => 'required|exists:tb_kategori,id_kategori',
            'harga'             => 'required|numeric|min:0',
            'stok'              => 'required|integer|min:0',
            'jumlah_terjual'    => 'nullable|integer|min:0', // ✅ tambah validasi
            'deskripsi'         => 'nullable|string',
            'gambar'            => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        // Set default jumlah_terjual jika tidak diisi
        if (!isset($validated['jumlah_terjual'])) {
            $validated['jumlah_terjual'] = 0;
        }

        // 2. Proses upload gambar ke public/images/produk
        if ($request->hasFile('gambar')) {
            $filename = time() . '_' . $request->file('gambar')->getClientOriginalName();
            $request->file('gambar')->move(public_path('images/produk'), $filename);
            $validated['gambar'] = 'images/produk/' . $filename;
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
            'nama_produk'       => 'required|string|max:255',
            'id_brands'         => 'required|exists:tb_brands,id_brands',
            'id_kategori'       => 'required|exists:tb_kategori,id_kategori',
            'harga'             => 'required|numeric|min:0',
            'stok'              => 'required|integer|min:0',
            'jumlah_terjual'    => 'nullable|integer|min:0', // ✅ tambah validasi
            'deskripsi'         => 'nullable|string',
            'gambar'            => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        // 2. Proses update gambar jika ada gambar baru
        if ($request->hasFile('gambar')) {
            // Hapus gambar lama jika ada
            if ($produk->gambar && file_exists(public_path($produk->gambar))) {
                unlink(public_path($produk->gambar));
            }

            // Upload gambar baru ke public/images/produk
            $filename = time() . '_' . $request->file('gambar')->getClientOriginalName();
            $request->file('gambar')->move(public_path('images/produk'), $filename);
            $validated['gambar'] = 'images/produk/' . $filename;
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
        // Hapus gambar dari public/images/produk
        if ($produk->gambar && file_exists(public_path($produk->gambar))) {
            unlink(public_path($produk->gambar));
        }

        // Hapus data dari database
        $produk->delete();

        // Redirect dengan pesan sukses
        return redirect()->route('admin.produk.index')->with('success', 'Produk berhasil dihapus!');
    }
}
