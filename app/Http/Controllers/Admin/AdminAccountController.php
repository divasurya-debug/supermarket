<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class AdminAccountController extends Controller
{
    public function index()
    {
        return view('admin.akun.index');
    }
}
