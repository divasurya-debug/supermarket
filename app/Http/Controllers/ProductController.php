<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProductController extends Controller
{
    // Menampilkan daftar semua produk (opsional)
    public function index()
    {
        $produkList = [
            [
                'slug' => 'apel-fuji-sun-sweet',
                'nama' => 'Apel Fuji Sun Sweet',
                'harga' => 'Rp 12.000',
                'gambar' => 'buah2.jpg',
            ],
            // Tambahkan produk lain kalau perlu
        ];

        return view('produk.index', compact('produkList'));
    }

    // Menampilkan detail produk berdasarkan slug
    public function show($slug)
    {
        // Simulasi data produk
        $produk = [
            'slug' => 'apel-fuji-sun-sweet',
            'nama' => 'Apel Fuji Sun Sweet',
            'harga' => 'Rp 12.000',
            'gambar' => 'buah2.jpg',
            'deskripsi' => 'Pengiriman dalam waktu 1 jam hanya berlaku untuk pengiriman EXPRESS & Pengiriman reguler disesuaikan dengan slot yang dipilih.'
        ];

        // Cek slug
        if ($slug !== $produk['slug']) {
            abort(404); // Jika slug tidak cocok
        }

        return view('produk.show', compact('produk'));
    }
}
