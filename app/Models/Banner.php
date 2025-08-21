<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Banner extends Model
{
    use HasFactory;

    // Nama tabel di database
    protected $table = 'tb_banner';

    // Primary key tabel
    protected $primaryKey = 'id_banner';

    // Jika primary key bukan auto-increment integer, baru set ini:
    // public $incrementing = false;
    // protected $keyType = 'string';

    // Kolom yang bisa diisi mass-assignment
    protected $fillable = ['gambar'];

    // Jika tabel tidak punya kolom created_at & updated_at
    public $timestamps = false;
}
