@extends('layouts.admin')

@section('content')
    <h2 class="text-2xl font-bold mb-4">Daftar Diskon Produk</h2>
    <table class="table-auto w-full border-collapse border border-gray-300">
        <thead class="bg-purple-800 text-white">
            <tr>
                <th class="border border-gray-300 px-4 py-2">ID</th>
                <th class="border border-gray-300 px-4 py-2">Produk</th>
                <th class="border border-gray-300 px-4 py-2">Diskon (%)</th>
                <th class="border border-gray-300 px-4 py-2">Mulai</th>
                <th class="border border-gray-300 px-4 py-2">Akhir</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td class="border border-gray-300 px-4 py-2">1</td>
                <td class="border border-gray-300 px-4 py-2">Sneakers AirMax</td>
                <td class="border border-gray-300 px-4 py-2">20%</td>
                <td class="border border-gray-300 px-4 py-2">2025-08-15</td>
                <td class="border border-gray-300 px-4 py-2">2025-08-30</td>
            </tr>
        </tbody>
    </table>
@endsection
