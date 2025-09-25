@extends('layouts.layout')

@section('title', 'Dashboard Admin Supermarket')

@section('content')
<div class="px-6"> {{-- Tambah padding biar ga mepet --}}
  <h1 class="text-3xl font-bold mb-6">Dashboard Admin Supermarket</h1>
  <div class="grid grid-cols-1 md:grid-cols-4 gap-6 mb-6">
    <div class="bg-white p-6 rounded-lg shadow"> {{-- padding lebih besar --}}
      <h2 class="text-gray-500">Total Produk</h2>
      <p class="text-2xl font-bold">1,250</p>
    </div>
    <div class="bg-white p-6 rounded-lg shadow">
      <h2 class="text-gray-500">Brands</h2>
      <p class="text-2xl font-bold">45</p>
    </div>
    <div class="bg-white p-6 rounded-lg shadow">
      <h2 class="text-gray-500">Diskon Aktif</h2>
      <p class="text-2xl font-bold">12</p>
    </div>
    <div class="bg-white p-6 rounded-lg shadow">
      <h2 class="text-gray-500">Banner</h2>
      <p class="text-2xl font-bold">5</p>
    </div>
  </div>
</div>
@endsection
