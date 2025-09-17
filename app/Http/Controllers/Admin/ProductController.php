<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use CloudinaryLabs\CloudinaryLaravel\Facades\Cloudinary;
use App\Models\Product;
use App\Models\Brand;
use App\Models\Kategori;

class ProductController extends Controller
{
    /**
     * Ambil public_id Cloudinary dari URL.
     */
    private function getCloudinaryPublicId($url, $folder = 'produk')
    {
        $basename = pathinfo($url, PATHINFO_FILENAME);
        return $folder . '/' . $basename;
    }

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
            'gambar'         => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $validated['jumlah_terjual'] = $validated['jumlah_terjual'] ?? 0;

        if ($request->hasFile('gambar')) {
            $upload = Cloudinary::upload(
                $request->file('gambar')->getRealPath(),
                ['folder' => 'produk']
            );
            $validated['gambar'] = $upload->getSecurePath(); // URL
        }

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
            'gambar'         => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        if ($request->hasFile('gambar')) {
            // Hapus gambar lama dari Cloudinary
            if ($produk->gambar) {
                $publicId = $this->getCloudinaryPublicId($produk->gambar, 'produk');
                Cloudinary::destroy($publicId);
            }

            // Upload baru
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
     * Hapus produk.
     */
    public function destroy(Product $produk)
    {
        if ($produk->gambar) {
            $publicId = $this->getCloudinaryPublicId($produk->gambar, 'produk');
            Cloudinary::destroy($publicId);
        }

        $produk->delete();

        return redirect()->route('admin.produk.index')->with('success', 'Produk berhasil dihapus!');
    }
}
