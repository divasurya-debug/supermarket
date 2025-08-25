<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Discount extends Model
{
    use HasFactory;

    protected $table = 'tb_diskon';
    protected $primaryKey = 'id_diskon';

    protected $fillable = [
        'id_produk',
        'persentase_diskon',
        'tanggal_mulai',
        'tanggal_akhir',
    ];

    protected $casts = [
        'tanggal_mulai' => 'date',
        'tanggal_akhir' => 'date',
    ];

    /**
     * Gunakan primary key `id_diskon` untuk route model binding
     */
    public function getRouteKeyName()
    {
        return 'id_diskon';
    }

    /**
     * Relasi ke model Product
     */
    public function product()
    {
        return $this->belongsTo(Product::class, 'id_produk');
    }
}
