<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Admin;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    /**
     * Tampilkan halaman login admin
     */
    public function showLogin()
    {
        return view('admin.auth.login'); // pastikan file blade ada di resources/views/admin/auth/login.blade.php
    }

    /**
     * Proses login admin
     */
    public function login(Request $request)
    {
        $request->validate([
            'username' => 'required|string',
            'password' => 'required|string',
        ]);

        $credentials = $request->only('username', 'password');

        // Gunakan guard admin
        if (Auth::guard('admin')->attempt($credentials)) {
            $request->session()->regenerate();

            // arahkan ke dashboard admin
            return redirect()->route('admin.dashboard')->with('success', 'Login berhasil!');
        }

        return back()->withErrors([
            'username' => 'Username atau password salah.',
        ])->withInput();
    }

    /**
     * Tampilkan halaman register admin
     */
    public function showRegister()
    {
        return view('admin.auth.register'); // pastikan file blade ada di resources/views/admin/auth/register.blade.php
    }

    /**
     * Proses register admin baru
     */
    public function register(Request $request)
    {
        $request->validate([
            'username' => 'required|string|max:100|unique:tb_admin,username',
            'email'    => 'required|email|unique:tb_admin,email',
            'password' => 'required|string|min:6|confirmed',
        ]);

        $admin = Admin::create([
            'username' => $request->username,
            'email'    => $request->email,
            'password' => Hash::make($request->password),
        ]);

        // Login otomatis pakai guard admin
        Auth::guard('admin')->login($admin);

        return redirect()->route('admin.dashboard')->with('success', 'Registrasi berhasil, selamat datang!');
    }

    /**
     * Logout admin
     */
    public function logout(Request $request)
    {
        Auth::guard('admin')->logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route('admin.login')->with('success', 'Berhasil logout.');
    }
}
