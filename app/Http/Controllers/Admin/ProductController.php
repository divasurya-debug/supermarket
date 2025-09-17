<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use CloudinaryLabs\CloudinaryLaravel\Facades\Cloudinary;

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
        $brands = Brand::all();
        $kategori = Kategori::all();
        return view('admin.produk.create', compact('brands', 'kategori'));
    }

    /**
     * Menyimpan produk baru ke dalam database.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'nama_produk'    => 'required|string|max:255',
            'id_brands'      => 'required|exists:tb_brands,id_brands',
            'id_kategori'    => 'required|exists:tb_kategori,id_kategori',
            'harga'          => 'required|numeric|min:0',
            'stok'           => 'required|integer|min:0',
            'jumlah_terjual' => 'nullable|integer|min:0',
            'deskripsi'      => 'nullable|string',
            'gambar'         => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        if (!isset($validated['jumlah_terjual'])) {
            $validated['jumlah_terjual'] = 0;
        }

        // ✅ Upload ke Cloudinary
        if ($request->hasFile('gambar')) {
            $upload = Cloudinary::upload(
                $request->file('gambar')->getRealPath(),
                ['folder' => 'produk']
            );
            $validated['gambar'] = $upload->getSecurePath(); // URL gambar
        }

        Product::create($validated);

        return redirect()->route('admin.produk.index')->with('success', 'Produk berhasil ditambahkan!');
    }

    /**
     * Menampilkan form untuk mengedit produk.
     */
    public function edit(Product $produk)
    {
        $brands = Brand::all();
        $kategori = Kategori::all();
        return view('admin.produk.edit', compact('produk', 'brands', 'kategori'));
    }

    /**
     * Mengupdate data produk di database.
     */
    public function update(Request $request, Product $produk)
    {
        $validated = $request->validate([
            'nama_produk'    => 'required|string|max:255',
            'id_brands'      => 'required|exists:tb_brands,id_brands',
            'id_kategori'    => 'required|exists:tb_kategori,id_kategori',
            'harga'          => 'required|numeric|min:0',
            'stok'           => 'required|integer|min:0',
            'jumlah_terjual' => 'nullable|integer|min:0',
            'deskripsi'      => 'nullable|string',
            'gambar'         => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        if ($request->hasFile('gambar')) {
            // ✅ Hapus gambar lama dari Cloudinary
            if ($produk->gambar) {
                $publicId = pathinfo($produk->gambar, PATHINFO_FILENAME);
                Cloudinary::destroy('produk/' . $publicId);
            }

            // Upload gambar baru
            $upload = Cloudinary::upload(
                $request->file('gambar')->getRealPath(),
                ['folder' => 'produk']
            );
            $validated['gambar'] = $upload->getSecurePath();
        }

        $produk->update($validated);

        return redirect()->route('admin.produk.index')->with('success', 'Produk berhasil diperbarui!');
    }

    /**
     * Menghapus produk dari database.
     */
    public function destroy(Product $produk)
    {
        // ✅ Hapus gambar dari Cloudinary
        if ($produk->gambar) {
            $publicId = pathinfo($produk->gambar, PATHINFO_FILENAME);
            Cloudinary::destroy('produk/' . $publicId);
        }

        $produk->delete();

        return redirect()->route('admin.produk.index')->with('success', 'Produk berhasil dihapus!');
    }
}
