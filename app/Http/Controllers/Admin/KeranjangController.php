<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;

class KeranjangController extends Controller
{
    public function index()
    {
        // contoh: admin bisa lihat semua keranjang (nanti bisa diubah sesuai kebutuhan)
        return view('admin.keranjang.index');
    }
}
