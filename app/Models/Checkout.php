<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Checkout extends Model
{
    protected $table = 'tb_checkout';
    protected $primaryKey = 'id_checkout';

    protected $fillable = [
        'id_akun',
        'total_harga',
        'status',
    ];

    // Relasi ke tabel akun (customer)
    public function akun()
    {
        return $this->belongsTo(Akun::class, 'id_akun', 'id_akun');
    }
}
