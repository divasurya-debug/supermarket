<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
    protected $table = 'tb_cart';
    protected $fillable = ['id_user', 'id_produk', 'jumlah'];

    public function product()
    {
        return $this->belongsTo(Product::class, 'id_produk');
    }
}
