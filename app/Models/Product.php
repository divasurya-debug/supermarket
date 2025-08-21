<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    // Beri tahu model nama tabel yang benar
    protected $table = 'tb_produk';

    // Beri tahu model nama primary key yang benar
    protected $primaryKey = 'id_produk';

    /**
     * Properti $fillable (PENTING!).
     * Mendefinisikan kolom mana saja yang boleh diisi secara massal (mass assignment).
     * Tanpa ini, fitur tambah dan edit produk tidak akan menyimpan data.
     */
    protected $fillable = [
        'nama_produk',
        'id_brands',
        'id_kategori',
        'harga',
        'stok',
        'deskripsi',
        'gambar',
    ];

    /**
     * Mendefinisikan relasi: Satu Produk 'milik' satu Kategori.
     */
    public function kategori()
    {
        return $this->belongsTo(Kategori::class, 'id_kategori');
    }

    /**
     * Mendefinisikan relasi: Satu Produk 'milik' satu Brand.
     * Ini dibutuhkan agar kita bisa mengambil data brand di view.
     */
    public function brand()
    {
        return $this->belongsTo(Brand::class, 'id_brands');
    }
}