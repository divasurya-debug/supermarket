<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminRegisterController extends Controller
{
    public function showRegisterForm()
    {
        return view('admin.register');
    }

    public function register(Request $request)
    {
        $request->validate([
            'username' => 'required|unique:tb_admin,username|max:50',
            'email' => 'required|email|unique:tb_admin,email',
            'password' => 'required|min:6|confirmed',
        ]);

        $admin = Admin::create([
            'username' => $request->username,
            'email' => $request->email,
            'password' => $request->password, // akan otomatis di-hash di model
        ]);

        Auth::guard('admin')->login($admin);

        return redirect()->route('admin.dashboard');
    }
}
