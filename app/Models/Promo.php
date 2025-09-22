<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Promo extends Model
{
    protected $table = 'tb_diskon'; // ← ini WAJIB agar cocok dengan database kamu

    protected $primaryKey = 'id_diskon'; // ← ini juga wajib, karena bukan 'id'

    // Jika kamu tidak pakai timestamps, tambahkan ini juga:
    // public $timestamps = false;

    public function product()
    {
        return $this->belongsTo(Product::class, 'id_produk');
    }
}
