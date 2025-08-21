<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    public function index()
    {
        $banners = DB::table('tb_banner')->get(); // ambil semua banner
        return view('home', compact('banners'));
    }
}
