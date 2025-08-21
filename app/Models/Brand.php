<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Brand extends Model
{
    use HasFactory;

    // Menentukan nama tabel yang sesuai
    protected $table = 'tb_brands';

    // Menentukan primary key yang sesuai
    protected $primaryKey = 'id_brands';

    /**
     * Mendefinisikan relasi: Satu Brand bisa memiliki banyak Produk.
     */
    public function products()
    {
        return $this->hasMany(Product::class, 'id_brands');
    }
}