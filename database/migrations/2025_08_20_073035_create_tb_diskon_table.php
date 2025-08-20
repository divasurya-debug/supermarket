<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('tb_diskon', function (Blueprint $table) {
            $table->id('id_diskon');                         // PK
            $table->foreignId('id_produk')                   // relasi ke produk
                  ->constrained('tb_produk')
                  ->onDelete('cascade');
            $table->integer('persentase_diskon');            // persentase diskon
            $table->date('tanggal_mulai');                   // tanggal mulai
            $table->date('tanggal_akhir');                   // tanggal akhir
            $table->timestamps();                            // created_at & updated_at
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('tb_diskon');
    }
};
