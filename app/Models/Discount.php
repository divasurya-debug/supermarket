<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Discount extends Model
{
    use HasFactory;

    protected $table = 'tb_diskon';
    protected $primaryKey = 'id_diskon';

    // Kolom yang boleh diisi melalui form
    protected $fillable = [
        'id_produk',
        'persentase_diskon',
        'tanggal_mulai',
        'tanggal_akhir',
    ];

    // Otomatis mengubah string tanggal menjadi objek Carbon
    protected $casts = [
        'tanggal_mulai' => 'date',
        'tanggal_akhir' => 'date',
    ];

    // Relasi ke model Product
    public function product()
    {
        return $this->belongsTo(Product::class, 'id_produk');
    }
}