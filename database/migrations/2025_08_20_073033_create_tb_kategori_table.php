<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('tb_kategori', function (Blueprint $table) {
            $table->id('id_kategori');                   // PK
            $table->string('nama_kategori')->unique();   // nama kategori (unik, misal: makanan, minuman)
            $table->text('deskripsi')->nullable();       // deskripsi kategori (opsional)
            $table->string('gambar_kategori')->nullable(); // path/filename gambar kategori
            $table->timestamps();                        // created_at & updated_at
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('tb_kategori');
    }
};
