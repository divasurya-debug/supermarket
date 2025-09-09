@extends('layouts.admin')

@section('title', 'Keranjang')
@section('content')
<div class="container my-4"> <!-- memberi jarak dari tepi layar -->
    <div class="p-6 bg-white shadow rounded-lg">
        <h1 class="text-2xl font-bold mb-4">📦 Daftar Keranjang</h1>

        <div class="overflow-x-auto">
            <table class="table-auto w-full border border-gray-200">
                <thead class="bg-purple-600 text-white">
                    <tr>
                        <th class="px-4 py-2 border">#</th>
                        <th class="px-4 py-2 border">Nama Produk</th>
                        <th class="px-4 py-2 border">Jumlah</th>
                        <th class="px-4 py-2 border">Harga</th>
                        <th class="px-4 py-2 border">Total</th>
                        <th class="px-4 py-2 border">Aksi</th>
                    </tr>
                </thead>
                <tbody class="text-center">
                    {{-- Contoh data statis --}}
                    <tr class="hover:bg-gray-50">
                        <td class="px-4 py-2 border">1</td>
                        <td class="px-4 py-2 border">Indomie Goreng</td>
                        <td class="px-4 py-2 border">3</td>
                        <td class="px-4 py-2 border">Rp 3.000</td>
                        <td class="px-4 py-2 border">Rp 9.000</td>
                        <td class="px-4 py-2 border">
                            <button class="bg-red-500 hover:bg-red-600 text-white px-3 py-1 rounded">Hapus</button>
                        </td>
                    </tr>
                    <tr class="hover:bg-gray-50">
                        <td class="px-4 py-2 border">2</td>
                        <td class="px-4 py-2 border">Aqua Botol 600ml</td>
                        <td class="px-4 py-2 border">2</td>
                        <td class="px-4 py-2 border">Rp 5.000</td>
                        <td class="px-4 py-2 border">Rp 10.000</td>
                        <td class="px-4 py-2 border">
                            <button class="bg-red-500 hover:bg-red-600 text-white px-3 py-1 rounded">Hapus</button>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>

        <div class="mt-4 text-right">
            <p class="text-lg font-bold">Total Keseluruhan: Rp 19.000</p>
            <button class="bg-green-500 hover:bg-green-600 text-white px-4 py-2 rounded mt-2">Checkout</button>
        </div>
    </div>
</div>
@endsection
