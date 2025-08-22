@extends('layouts.admin')

@section('title', 'Pengaturan')

@section('content')
<div class="p-6 bg-white rounded shadow">
    <h1 class="text-2xl font-bold mb-4">Halaman Pengaturan Supermarket</h1>
    <p class="mb-6 text-gray-600">Atur informasi dan konfigurasi untuk dashboard web supermarket.</p>

    <!-- Informasi Toko -->
    <div class="mb-8">
        <h2 class="text-xl font-semibold mb-3">Informasi Toko</h2>
        <form action="#" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="mb-3">
                <label class="block font-medium">Nama Toko</label>
                <input type="text" name="nama_toko" class="w-full border rounded p-2" placeholder="Supermarket Sejahtera">
            </div>
            <div class="mb-3">
                <label class="block font-medium">Alamat</label>
                <textarea name="alamat" class="w-full border rounded p-2" rows="3" placeholder="Jl. Raya Contoh No. 123"></textarea>
            </div>
            <div class="mb-3">
                <label class="block font-medium">Nomor WhatsApp</label>
                <input type="text" name="whatsapp" class="w-full border rounded p-2" placeholder="+62 812 3456 7890">
            </div>
        </form>
    </div>

    <!-- Logo & Banner -->
    <div class="mb-8">
        <h2 class="text-xl font-semibold mb-3">Logo & Banner</h2>
        <form action="#" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="mb-3">
                <label class="block font-medium">Upload Logo</label>
                <input type="file" name="logo" class="w-full border rounded p-2">
            </div>
            <div class="mb-3">
                <label class="block font-medium">Upload Banner</label>
                <input type="file" name="banner" class="w-full border rounded p-2">
            </div>
        </form>
    </div>

    <!-- Pengaturan Umum -->
    <div>
        <h2 class="text-xl font-semibold mb-3">Pengaturan Umum</h2>
        <form action="#" method="POST">
            @csrf
            <div class="mb-3">
                <label class="block font-medium">Mata Uang</label>
                <select name="currency" class="w-full border rounded p-2">
                    <option value="IDR">Rupiah (IDR)</option>
                    <option value="USD">Dollar (USD)</option>
                </select>
            </div>
            <div class="mb-3">
                <label class="block font-medium">Pajak (%)</label>
                <input type="number" name="tax" class="w-full border rounded p-2" placeholder="10">
            </div>
            <button type="submit" class="px-4 py-2 bg-blue-600 text-white rounded">Simpan Pengaturan</button>
        </form>
    </div>
</div>
@endsection
