<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('tb_brands', function (Blueprint $table) {
            $table->id('id_brands');                  // PK
            $table->string('nama_merek');             // nama brand
            $table->string('negara_asal')->nullable();// asal negara
            $table->string('gambar')->nullable();     // path logo brand
            $table->timestamps();                     // created_at & updated_at
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('tb_brands');
    }
};
