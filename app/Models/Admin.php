<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable; // ✅ kalau mau pakai notifikasi (opsional)
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Admin extends Authenticatable
{
    use HasFactory, Notifiable;

    protected $table = 'tb_admin';     // nama tabel
    protected $primaryKey = 'id';      // primary key

    protected $fillable = [
        'username',
        'email',
        'password',
    ];

    protected $hidden = [
        'password',
        'remember_token', // ✅ untuk sistem login Laravel
    ];

    protected $casts = [
        'email_verified_at' => 'datetime', // kalau ada kolom email_verified_at
    ];
}
