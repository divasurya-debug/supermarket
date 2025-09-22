<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Discount extends Model
{
    use HasFactory;

    protected $table = 'tb_diskon';          // Nama tabel
    protected $primaryKey = 'id_diskon';     // Primary key
    public $incrementing = true;             // Primary key auto increment
    protected $keyType = 'int';              // Tipe primary key

    protected $fillable = [
        'id_produk',
        'persentase_diskon',
        'tanggal_mulai',
        'tanggal_akhir',
    ];

    protected $casts = [
        'tanggal_mulai' => 'datetime',
        'tanggal_akhir' => 'datetime',
    ];

    /**
     * Relasi ke produk
     */
    public function product()
    {
        return $this->belongsTo(Product::class, 'id_produk', 'id_produk');
    }
}
