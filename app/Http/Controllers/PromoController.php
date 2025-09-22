<?php

namespace App\Http\Controllers;

use App\Models\Discount;
use Illuminate\Http\Request;

class PromoController extends Controller
{
    public function index()
    {
        // Ambil data promo/diskon terbaru dengan relasi produk
        $promo = Discount::with('product')
            ->orderBy('created_at', 'desc')
            ->paginate(12);

        // Panggil view di folder frontend/promo/index.blade.php
        return view('frontend.promo.index', compact('promo'));
    }
}
