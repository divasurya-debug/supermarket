<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('tb_produk', function (Blueprint $table) {
            $table->id('id_produk');                     // PK
            $table->string('nama_produk');               // nama produk

            // Foreign key ke tb_brands
            $table->unsignedBigInteger('id_brands');     
            $table->foreign('id_brands')
                  ->references('id_brands')->on('tb_brands')
                  ->onDelete('cascade');

            // Foreign key ke tb_kategori
            $table->unsignedBigInteger('id_kategori');     
            $table->foreign('id_kategori')
                  ->references('id_kategori')->on('tb_kategori')
                  ->onDelete('cascade');

            $table->decimal('harga', 12, 2);             // harga
            $table->integer('stok')->default(0);         // stok
            $table->unsignedBigInteger('jumlah_terjual')->default(0); // jumlah terjual
            $table->text('deskripsi')->nullable();       // deskripsi produk
            $table->string('gambar')->nullable();        // gambar
            $table->timestamps();                        // created_at & updated_at
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('tb_produk');
    }
};
