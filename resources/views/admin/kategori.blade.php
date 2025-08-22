@extends('layouts.admin')

@section('title', 'Kategori')

@section('content')
<div class="bg-white p-6 rounded-lg shadow">
    <h1 class="text-2xl font-bold mb-6">Daftar Kategori Produk</h1>

    <!-- Tabel Daftar Kategori -->
    <table class="w-full border-collapse rounded-lg overflow-hidden">
        <thead>
            <tr class="bg-purple-800 text-white">
                <th class="p-3 text-left">ID</th>
                <th class="p-3 text-left">Nama Kategori</th>
                <th class="p-3 text-left">Status</th>
                <th class="p-3 text-left">Icon</th>
            </tr>
        </thead>
        <tbody>
            <tr class="border-b hover:bg-gray-50">
                <td class="p-3">1</td>
                <td class="p-3">Minuman</td>
                <td class="p-3 text-green-600 font-semibold">Aktif</td>
                <td class="p-3">🥤</td>
            </tr>
            <tr class="border-b hover:bg-gray-50">
                <td class="p-3">2</td>
                <td class="p-3">Makanan Ringan</td>
                <td class="p-3 text-green-600 font-semibold">Aktif</td>
                <td class="p-3">🍪</td>
            </tr>
            <tr class="border-b hover:bg-gray-50">
                <td class="p-3">3</td>
                <td class="p-3">Elektronik</td>
                <td class="p-3 text-red-600 font-semibold">Nonaktif</td>
                <td class="p-3">📱</td>
            </tr>
        </tbody>
    </table>
</div>
@endsection
