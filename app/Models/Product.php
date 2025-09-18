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

    // Kalau primary key bukan auto-increment integer, tambahkan:
    // public $incrementing = false;
    // protected $keyType = 'string';

    // Mass assignment
    protected $fillable = [
        'nama_produk',   // ✅ gunakan sesuai nama kolom di DB
        'id_brands',
        'id_kategori',
        'harga',
        'stok',
        'jumlah_terjual',
        'deskripsi',
        'gambar',
    ];

    /**
     * Relasi: Produk 'milik' satu Kategori
     */
    public function kategori()
    {
        return $this->belongsTo(\App\Models\Kategori::class, 'id_kategori', 'id_kategori');
    }

    /**
     * Relasi: Produk 'milik' satu Brand
     */
    public function brand()
    {
        return $this->belongsTo(\App\Models\Brand::class, 'id_brands', 'id_brands');
    }

    /**
     * Relasi: Produk bisa muncul di banyak Checkout
     */
    public function checkouts()
    {
        return $this->hasMany(\App\Models\Checkout::class, 'id_produk', 'id_produk');
    }
}
