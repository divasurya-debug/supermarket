<?php

namespace App\Http\Controllers;

use App\Models\Discount;
use Illuminate\Http\Request;
use Carbon\Carbon;

class PromoController extends Controller
{
    public function index()
    {
        // Ambil tanggal hari ini
        $today = Carbon::today();

        // Ambil data promo aktif saja (tanggal_akhir >= hari ini)
        $promo = Discount::with('product')
            ->whereDate('tanggal_akhir', '>=', $today)
            ->orderBy('created_at', 'desc')
            ->paginate(12);

        // Tampilkan view promo
        return view('frontend.promo.index', compact('promo'));
    }
}
