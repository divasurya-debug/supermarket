<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Kategori;
use Cloudinary\Cloudinary;
use Cloudinary\Transformation\Resize;
use Cloudinary\Transformation\Gravity;

class KategoriController extends Controller
{
    protected $cloudinary;

    public function __construct()
    {
        // Pastikan CLOUDINARY_URL sudah ada di .env / environment production
        $this->cloudinary = new Cloudinary(env('CLOUDINARY_URL'));
    }

    /**
     * Tampilkan semua kategori
     */
    public function index()
    {
        $kategoris = Kategori::all();
        return view('admin.kategori.index', compact('kategoris'));
    }

    /**
     * Form tambah kategori
     */
    public function create()
    {
        return view('admin.kategori.create');
    }

    /**
     * Simpan kategori baru
     */
    public function store(Request $request)
    {
        $request->validate([
            'nama_kategori'   => 'required|string|max:255|unique:tb_kategori,nama_kategori',
            'deskripsi'       => 'nullable|string',
            'gambar_kategori' => 'required|image|mimes:jpg,jpeg,png,gif,webp|max:2048',
        ]);

        $gambarUrl = null;

        if ($request->hasFile('gambar_kategori')) {
            $uploadedFile = $request->file('gambar_kategori');
            $uploaded = $this->cloudinary->uploadApi()->upload($uploadedFile->getRealPath(), [
                'folder' => 'kategori'
            ]);
            $gambarUrl = $uploaded['secure_url'];
        }

        // Simpan ke database
        $kategori = new Kategori();
        $kategori->nama_kategori   = $request->nama_kategori;
        $kategori->deskripsi       = $request->deskripsi;
        $kategori->gambar_kategori = $gambarUrl; // simpan URL Cloudinary
        $kategori->save();

        return redirect()->route('admin.kategori.index')
            ->with('success', 'Kategori berhasil ditambahkan.');
    }

    /**
     * Form edit kategori
     */
    public function edit(Kategori $kategori)
    {
        return view('admin.kategori.edit', compact('kategori'));
    }

    /**
     * Update kategori
     */
    public function update(Request $request, Kategori $kategori)
    {
        $request->validate([
            'nama_kategori'   => 'required|string|max:255|unique:tb_kategori,nama_kategori,' . $kategori->id_kategori . ',id_kategori',
            'deskripsi'       => 'nullable|string',
            'gambar_kategori' => 'nullable|image|mimes:jpg,jpeg,png,gif,webp|max:2048',
        ]);

        // Update file gambar jika ada upload baru
        if ($request->hasFile('gambar_kategori')) {
            // Hapus file lama dari Cloudinary jika ada
            if ($kategori->gambar_kategori) {
                // Ambil public_id dari URL
                $pathParts = explode('/', $kategori->gambar_kategori);
                $fileName = end($pathParts);
                $publicId = 'kategori/' . pathinfo($fileName, PATHINFO_FILENAME);

                try {
                    $this->cloudinary->uploadApi()->destroy($publicId);
                } catch (\Exception $e) {
                    // Ignore error jika file tidak ditemukan
                }
            }

            // Upload file baru
            $uploadedFile = $request->file('gambar_kategori');
            $uploaded = $this->cloudinary->uploadApi()->upload($uploadedFile->getRealPath(), [
                'folder' => 'kategori'
            ]);
            $kategori->gambar_kategori = $uploaded['secure_url'];
        }

        // Update field lain
        $kategori->nama_kategori = $request->nama_kategori;
        $kategori->deskripsi     = $request->deskripsi;
        $kategori->save();

        return redirect()->route('admin.kategori.index')
            ->with('success', 'Kategori berhasil diperbarui.');
    }

    /**
     * Hapus kategori
     */
    public function destroy(Kategori $kategori)
    {
        // Hapus file gambar dari Cloudinary jika ada
        if ($kategori->gambar_kategori) {
            $pathParts = explode('/', $kategori->gambar_kategori);
            $fileName = end($pathParts);
            $publicId = 'kategori/' . pathinfo($fileName, PATHINFO_FILENAME);

            try {
                $this->cloudinary->uploadApi()->destroy($publicId);
            } catch (\Exception $e) {
                // Ignore error jika file tidak ditemukan
            }
        }

        $kategori->delete();

        return redirect()->route('admin.kategori.index')
            ->with('success', 'Kategori berhasil dihapus.');
    }
}
