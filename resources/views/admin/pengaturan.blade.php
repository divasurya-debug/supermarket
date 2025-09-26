@extends('layouts.admin')

@section('title', 'Pengaturan')

@section('content')
@php
    $admin = Auth::guard('admin')->user();
@endphp

<div class="container my-4"> <!-- container supaya responsif -->
    <div class="p-6 bg-white rounded shadow">
        <h1 class="text-2xl font-bold mb-4">Halaman Pengaturan Supermarket</h1>
        <p class="mb-6 text-gray-600">Atur informasi dan konfigurasi untuk dashboard web supermarket.</p>

        <!-- Notifikasi sukses -->
        @if(session('success'))
            <div class="mb-4 px-4 py-2 bg-green-100 text-green-800 rounded">
                {{ session('success') }}
            </div>
        @endif

        <!-- Informasi Admin yang Login -->
        @if($admin)
        <form action="{{ route('admin.akun.update', $admin->id) }}" method="POST" class="mb-8">
            @csrf
            @method('PUT')

            <div class="mb-3">
                <label class="block font-medium">Username</label>
                <input type="text" name="username" value="{{ $admin->username }}" class="w-full border rounded p-2" required>
            </div>

            <div class="mb-3">
                <label class="block font-medium">Email</label>
                <input type="email" name="email" value="{{ $admin->email }}" class="w-full border rounded p-2" required>
            </div>

            <div class="mb-3">
                <label class="block font-medium">Password (Kosongkan jika tidak diganti)</label>
                <input type="password" name="password" class="w-full border rounded p-2">
            </div>

            <div class="mb-3">
                <label class="block font-medium">Konfirmasi Password</label>
                <input type="password" name="password_confirmation" class="w-full border rounded p-2">
            </div>

            <button type="submit" class="px-4 py-2 bg-green-600 text-white rounded">Update Akun</button>
        </form>
        @else
        <p class="text-red-500">Admin belum login.</p>
        @endif

        <!-- Bagian dari commit responsif (pengaturan toko, logo, banner, umum) -->
        <div class="p-6 bg-purple-50 shadow rounded-lg">
            <h1 class="text-2xl font-bold mb-4 text-purple-900">⚙️ Pengaturan Toko</h1>
            <p class="mb-6 text-purple-800">Atur informasi tambahan untuk toko dan sistem.</p>

            <!-- Informasi Toko -->
            <div class="mb-8">
                <h2 class="text-xl font-semibold mb-3 text-purple-900">Informasi Toko</h2>
                <form action="#" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="mb-3">
                        <label class="block font-medium mb-1 text-purple-800">Nama Toko</label>
                        <input type="text" name="nama_toko" class="w-full border rounded p-2" placeholder="Supermarket Sejahtera">
                    </div>
                    <div class="mb-3">
                        <label class="block font-medium mb-1 text-purple-800">Alamat</label>
                        <textarea name="alamat" class="w-full border rounded p-2" rows="3" placeholder="Jl. Raya Contoh No. 123"></textarea>
                    </div>
                    <div class="mb-3">
                        <label class="block font-medium mb-1 text-purple-800">Nomor WhatsApp</label>
                        <input type="text" name="whatsapp" class="w-full border rounded p-2" placeholder="+62 812 3456 7890">
                    </div>
                </form>
            </div>

          
            <!-- Pengaturan Umum -->
            <div>
                <h2 class="text-xl font-semibold mb-3 text-purple-900">Pengaturan Umum</h2>
                <form action="#" method="POST">
                    @csrf
                    <div class="mb-3">
                        <label class="block font-medium mb-1 text-purple-800">Mata Uang</label>
                        <select name="currency" class="w-full border rounded p-2">
                            <option value="IDR">Rupiah (IDR)</option>
                            <option value="USD">Dollar (USD)</option>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label class="block font-medium mb-1 text-purple-800">Pajak (%)</label>
                        <input type="number" name="tax" class="w-full border rounded p-2" placeholder="10">
                    </div>
                    <button type="submit" class="px-4 py-2 bg-purple-600 hover:bg-purple-700 text-white rounded">Simpan Pengaturan</button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
