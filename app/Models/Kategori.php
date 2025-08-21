<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kategori extends Model
{
    use HasFactory;

    // Menentukan nama tabel yang sesuai
    protected $table = 'tb_kategori';

    // Menentukan primary key yang sesuai
    protected $primaryKey = 'id_kategori';

    /**
     * Mendefinisikan relasi: Satu Kategori bisa memiliki banyak Produk.
     */
    public function products()
    {
        // Eloquent akan otomatis mencari foreign key 'id_kategori' di tabel 'tb_produk'
        return $this->hasMany(Product::class, 'id_kategori');
    }
}