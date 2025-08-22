<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class BrandController extends Controller
{
    public function index()
    {
        return view('admin.brands.index'); 
        // pastikan ada file resources/views/admin/brands/index.blade.php
    }
}
