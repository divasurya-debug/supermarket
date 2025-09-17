<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Cloudinary\Cloudinary;
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
        $products = Product::with('brand', 'kategori')->latest()->paginate(10);
        return view('admin.produk.index', compact('products'));
    }

    /**
     * Form tambah produk baru.
     */
    public function create()
    {
        $brands = Brand::all();
        $kategori = Kategori::all();
        return view('admin.produk.create', compact('brands', 'kategori'));
    }

    /**
     * Simpan produk baru.
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
            'gambar'         => 'required|image|mimes:jpeg,png,jpg,gif,webp|max:2048',
        ]);

        $validated['jumlah_terjual'] = $validated['jumlah_terjual'] ?? 0;

        $url = null;
        if ($request->hasFile('gambar')) {
            $uploadedFile = $request->file('gambar')->getRealPath();
            $cloudinary = new Cloudinary(env('CLOUDINARY_URL'));

            $result = $cloudinary->uploadApi()->upload($uploadedFile, [
                'folder' => 'produk',
            ]);

            $url = $result['secure_url'];
        }

        $validated['gambar'] = $url;

        Product::create($validated);

        return redirect()->route('admin.produk.index')->with('success', 'Produk berhasil ditambahkan!');
    }

    /**
     * Form edit produk.
     */
    public function edit(Product $produk)
    {
        $brands = Brand::all();
        $kategori = Kategori::all();
        return view('admin.produk.edit', compact('produk', 'brands', 'kategori'));
    }

    /**
     * Update produk.
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
            'gambar'         => 'nullable|image|mimes:jpeg,png,jpg,gif,webp|max:2048',
        ]);

        $data = $validated;

        $cloudinary = new Cloudinary(env('CLOUDINARY_URL'));

        if ($request->hasFile('gambar')) {
            // Hapus gambar lama dari Cloudinary jika ada
            if ($produk->gambar) {
                $publicId = pathinfo($produk->gambar, PATHINFO_FILENAME);
                $cloudinary->uploadApi()->destroy("produk/$publicId");
            }

            // Upload file baru
            $uploadedFile = $request->file('gambar')->getRealPath();
            $result = $cloudinary->uploadApi()->upload($uploadedFile, [
                'folder' => 'produk',
            ]);

            $data['gambar'] = $result['secure_url'];
        }

        $produk->update($data);

        return redirect()->route('admin.produk.index')->with('success', 'Produk berhasil diperbarui!');
    }

    /**
     * Hapus produk.
     */
    public function destroy(Product $produk)
    {
        $cloudinary = new Cloudinary(env('CLOUDINARY_URL'));

        if ($produk->gambar) {
            $publicId = pathinfo($produk->gambar, PATHINFO_FILENAME);
            $cloudinary->uploadApi()->destroy("produk/$publicId");
        }

        $produk->delete();

        return redirect()->route('admin.produk.index')->with('success', 'Produk berhasil dihapus!');
    }
}
