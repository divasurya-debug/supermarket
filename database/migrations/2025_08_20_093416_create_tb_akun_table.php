<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('tb_akun', function (Blueprint $table) {
            $table->id('id_akun');                       // PK
            $table->string('nama_lengkap')->nullable();  // Nama lengkap user
            $table->string('username')->unique();        // username unik
            $table->string('email')->unique();           // email unik
            $table->string('password')->nullable();      // hash password (nullable kalau login via Google)
            $table->enum('provider', ['manual','google'])->default('manual'); // jenis login
            $table->string('google_id')->nullable();     // ID dari Google kalau login Google
            $table->timestamps();                        // created_at & updated_at
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('tb_akun');
    }
};
