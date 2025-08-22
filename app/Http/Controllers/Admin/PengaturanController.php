<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class PengaturanController extends Controller
{
    public function index()
    {
        // arahkan ke view admin/pengaturan.blade.php
        return view('admin.pengaturan');
    }
}
