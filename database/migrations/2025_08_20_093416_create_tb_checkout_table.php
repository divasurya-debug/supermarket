<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('tb_checkout', function (Blueprint $table) {
            $table->id('id_checkout');                     // PK
            $table->unsignedBigInteger('id_akun');         // FK ke tb_akun
            $table->decimal('total_harga', 12, 2);         // total harga transaksi
            $table->string('status')->default('pending');  // status: pending, paid, shipped
            $table->timestamps();

            // Foreign key
            $table->foreign('id_akun')->references('id_akun')->on('tb_akun')->onDelete('cascade');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('tb_checkout');
    }
};
