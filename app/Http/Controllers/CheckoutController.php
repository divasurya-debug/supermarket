<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CheckoutController extends Controller
{
    public function index()
    {
        // ambil isi keranjang dari session
        $keranjang = session()->get('keranjang', []);

        // hitung total
        $total = collect($keranjang)->sum(fn($k) => ($k['harga'] ?? 0) * ($k['jumlah'] ?? 1));

        return view('checkout.index', compact('keranjang', 'total'));
    }
}
