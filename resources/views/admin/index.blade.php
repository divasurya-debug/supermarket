@extends('layouts.layout')

@section('title', 'Dashboard Admin Supermarket')

@section('dashboard')
  <h1 class="text-3xl font-bold mb-6">Dashboard Admin Supermarket</h1>
  <div class="grid grid-cols-1 md:grid-cols-4 gap-6 mb-6">
    <div class="bg-white p-4 rounded-lg shadow">
      <h2 class="text-gray-500">Total Produk</h2>
      <p class="text-2xl font-bold">1,250</p>
    </div>
    <div class="bg-white p-4 rounded-lg shadow">
      <h2 class="text-gray-500">Brands</h2>
      <p class="text-2xl font-bold">45</p>
    </div>
    <div class="bg-white p-4 rounded-lg shadow">
      <h2 class="text-gray-500">Diskon Aktif</h2>
      <p class="text-2xl font-bold">12</p>
    </div>
    <div class="bg-white p-4 rounded-lg shadow">
      <h2 class="text-gray-500">Banner</h2>
      <p class="text-2xl font-bold">5</p>
    </div>
  </div>
@endsection

@section('brands')
  <h1 class="text-2xl font-bold mb-4">Halaman Brands</h1>
  <p>Daftar brand supermarket.</p>
@endsection

@section('produk')
  <h1 class="text-2xl font-bold mb-4">Halaman Produk</h1>
  <table class="w-full border-collapse">
    <thead>
      <tr class="bg-gray-200 text-left">
        <th class="p-2 border">ID</th>
        <th class="p-2 border">Nama Produk</th>
        <th class="p-2 border">Brand</th>
        <th class="p-2 border">Harga</th>
        <th class="p-2 border">Stok</th>
        <th class="p-2 border">Aksi</th>
      </tr>
    </thead>
    <tbody>
      <tr>
        <td class="p-2 border">1</td>
        <td class="p-2 border">Minyak Goreng</td>
        <td class="p-2 border">Brand A</td>
        <td class="p-2 border">Rp 15.000</td>
        <td class="p-2 border">120</td>
        <td class="p-2 border">
          <button class="bg-blue-600 hover:bg-blue-700 text-white px-2 py-1 rounded">Edit</button>
          <button class="bg-red-600 hover:bg-red-700 text-white px-2 py-1 rounded">Hapus</button>
        </td>
      </tr>
      <tr>
        <td class="p-2 border">2</td>
        <td class="p-2 border">Beras Premium</td>
        <td class="p-2 border">Brand B</td>
        <td class="p-2 border">Rp 120.000</td>
        <td class="p-2 border">80</td>
        <td class="p-2 border">
          <button class="bg-blue-600 hover:bg-blue-700 text-white px-2 py-1 rounded">Edit</button>
          <button class="bg-red-600 hover:bg-red-700 text-white px-2 py-1 rounded">Hapus</button>
        </td>
      </tr>
    </tbody>
  </table>
@endsection

@section('diskon')
  <h1 class="text-2xl font-bold mb-4">Halaman Diskon</h1>
  <p>Daftar diskon aktif.</p>
@endsection

@section('banner')
  <h1 class="text-2xl font-bold mb-4">Halaman Banner</h1>
  <p>Daftar banner promo.</p>
@endsection

@section('pengaturan')
  <h1 class="text-2xl font-bold mb-4">Halaman Pengaturan</h1>
  <p>Pengaturan aplikasi supermarket.</p>
@endsection
