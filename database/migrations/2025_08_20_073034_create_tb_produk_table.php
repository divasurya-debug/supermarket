<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('tb_produk', function (Blueprint $table) {
            $table->id('id_produk');                       // PK
            $table->string('nama_produk');                 // nama produk
            $table->foreignId('id_brands')                 // relasi ke brands
                  ->constrained('tb_brands')
                  ->onDelete('cascade');
            $table->decimal('harga', 12, 2);               // harga produk
            $table->integer('stok')->default(0);           // stok
            $table->text('deskripsi')->nullable();         // deskripsi produk
            $table->string('gambar')->nullable();          // path gambar
            $table->timestamps();                          // created_at & updated_at
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('tb_produk');
    }
};
