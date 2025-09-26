<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\Brand;
use App\Models\Discount;
use App\Models\Banner;

class DashboardController extends Controller
{
    public function index()
    {
        $totalProduk = Product::count();
        $totalBrand = Brand::count();
        $totalDiskon = Discount::where('status', 'aktif')->count(); // pastikan kolom status ada
        $totalBanner = Banner::count();

        return view('admin.index', compact('totalProduk', 'totalBrand', 'totalDiskon', 'totalBanner'));
    }
}
