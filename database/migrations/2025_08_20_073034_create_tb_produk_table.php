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

            // Perbaikan foreign key
            $table->unsignedBigInteger('id_brands');     // FK ke tb_brands
            $table->foreign('id_brands')
                  ->references('id_brands')->on('tb_brands')
                  ->onDelete('cascade');

            $table->decimal('harga', 12, 2);             // harga
            $table->integer('stok')->default(0);         // stok
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
