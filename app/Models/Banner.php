<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Banner extends Model
{
    use HasFactory;

    protected $table = 'tb_banner';
    protected $primaryKey = 'id_banner';

    // Kolom yang bisa diisi
    protected $fillable = ['gambar'];

    // timestamps aktif karena ada created_at & updated_at
    public $timestamps = true;
}
