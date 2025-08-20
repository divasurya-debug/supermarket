<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('tb_keranjang', function (Blueprint $table) {
            $table->id('id_keranjang');                      // PK
            $table->unsignedBigInteger('id_akun');           // FK ke tb_akun
            $table->unsignedBigInteger('id_produk');         // FK ke tb_produk
            $table->integer('jumlah')->default(1);           // jumlah produk
            $table->timestamps();

            // Foreign keys
            $table->foreign('id_akun')->references('id_akun')->on('tb_akun')->onDelete('cascade');
            $table->foreign('id_produk')->references('id_produk')->on('tb_produk')->onDelete('cascade');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('tb_keranjang');
    }
};
