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
     * Mendefinisikan relasi: Satu Produk 'milik' satu Kategori.
     * Ini akan sangat berguna nanti.
     */
    public function kategori()
    {
        // Eloquent akan otomatis mencari foreign key 'id_kategori'
        return $this->belongsTo(Kategori::class, 'id_kategori');
    }
}