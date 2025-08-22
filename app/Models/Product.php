<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    // Nama tabel
    protected $table = 'tb_produk';

    // Primary key
    protected $primaryKey = 'id_produk';

    // Mass assignment
    protected $fillable = [
        'nama_produk',
        'id_brands',
        'id_kategori',
        'harga',
        'stok',
        'jumlah_terjual',  // ✅ ditambahkan
        'deskripsi',
        'gambar',
    ];

    /**
     * Relasi: Produk 'milik' satu Kategori
     */
    public function kategori()
    {
        return $this->belongsTo(Kategori::class, 'id_kategori');
    }

    /**
     * Relasi: Produk 'milik' satu Brand
     */
    public function brand()
    {
        return $this->belongsTo(Brand::class, 'id_brands');
    }

    /**
     * Relasi: Produk bisa muncul di banyak Checkout
     */
    public function checkouts()
    {
        return $this->hasMany(\App\Models\Checkout::class, 'id_produk', 'id_produk');
    }
}
