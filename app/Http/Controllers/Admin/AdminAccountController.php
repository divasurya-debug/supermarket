<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\Admin;

class AdminAccountController extends Controller
{
    // Halaman pengaturan admin
    public function index()
    {
        $admin = Auth::guard('admin')->user();
        return view('admin.pengaturan', compact('admin'));
    }

    // Update akun admin
    public function update(Request $request, $id)
    {
        $admin = Admin::findOrFail($id);

        // Validasi input
        $request->validate([
            'username' => 'required|string|max:255',
            'email' => 'required|email|max:255|unique:tb_admin,email,' . $admin->id,
            'password' => 'nullable|string|min:6|confirmed', // password_confirmation
        ]);

        // Update username & email
        $admin->username = $request->username;
        $admin->email = $request->email;

        // Update password hanya jika diisi
        if ($request->filled('password')) {
            $admin->password = Hash::make($request->password);
        }

        $admin->save();

        return redirect()->back()->with('success', 'Akun admin berhasil diperbarui.');
    }
}
