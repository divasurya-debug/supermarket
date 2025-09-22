<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class KategoriController extends Controller
{
    public function index()
    {
        // sementara bisa return view saja
        return view('kategori.index');
    }
}
