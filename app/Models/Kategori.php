<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kategori extends Model
{
    use HasFactory;

    protected $table = 'tb_kategori';        // nama tabel
    protected $primaryKey = 'id_kategori';  // primary key

    // field yang bisa diisi lewat mass-assignment
    protected $fillable = [
        'nama_kategori',
        'deskripsi',
    ];
}
