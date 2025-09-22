<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Promo;

class PromoSeeder extends Seeder
{
    public function run(): void
    {
        Promo::create([
            'judul' => 'Promo Awal Tahun',
            'deskripsi' => 'Diskon besar untuk semua produk!',
            'persentase_diskon' => 20,
            'tanggal_mulai' => now(),
            'tanggal_akhir' => now()->addDays(7),
            'gambar' => 'uploads/promos/promo1.jpg', // sesuaikan path gambar
        ]);

        Promo::create([
            'judul' => 'Promo Akhir Pekan',
            'deskripsi' => 'Spesial weekend sale!',
            'persentase_diskon' => 15,
            'tanggal_mulai' => now(),
            'tanggal_akhir' => now()->addDays(3),
            'gambar' => 'uploads/promos/promo2.jpg',
        ]);
    }
}
