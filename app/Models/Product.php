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

    // Jika ID bukan auto-increment integer:
    // public $incrementing = false;
    // protected $keyType = 'string';

    // Kolom yang bisa diisi massal
    protected $fillable = [
        'nama_produk',
        'id_brands',
        'id_kategori',
        'harga',
        'stok',
        'jumlah_terjual',
        'deskripsi',
        'gambar',
    ];

    /**
     * Relasi: Produk milik satu Kategori
     */
    public function kategori()
    {
        return $this->belongsTo(\App\Models\Kategori::class, 'id_kategori', 'id_kategori');
    }

    /**
     * Relasi: Produk milik satu Brand
     */
    public function brand()
    {
        return $this->belongsTo(\App\Models\Brand::class, 'id_brands', 'id_brands');
    }

    /**
     * Relasi: Produk punya banyak Checkout
     */
    public function checkouts()
    {
        return $this->hasMany(\App\Models\Checkout::class, 'id_produk', 'id_produk');
    }

    /**
     * Relasi: Produk punya satu Promo (Diskon)
     */
    public function diskon()
    {
        return $this->hasOne(\App\Models\Promo::class, 'id_produk', 'id_produk');
    }
}
