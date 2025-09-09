@extends('layouts.admin')

@section('title', 'Checkout Admin')

@section('content')
<div class="container my-4"> <!-- beri jarak dari tepi layar -->
    <div class="p-6 bg-white shadow rounded-lg">
        <h2 class="text-2xl font-bold mb-4">📋 Daftar Checkout</h2>

        <div class="overflow-x-auto">
            <table class="table-auto w-full border border-gray-200 text-center">
                <thead class="bg-purple-600 text-white">
                    <tr>
                        <th class="px-4 py-2 border">No</th>
                        <th class="px-4 py-2 border">Nama Customer</th>
                        <th class="px-4 py-2 border">Produk</th>
                        <th class="px-4 py-2 border">Total</th>
                        <th class="px-4 py-2 border">Status</th>
                        <th class="px-4 py-2 border">Icon</th>
                    </tr>
                </thead>
                <tbody>
                    <tr class="hover:bg-gray-50">
                        <td class="px-4 py-2 border">1</td>
                        <td class="px-4 py-2 border">Budi</td>
                        <td class="px-4 py-2 border">Produk A</td>
                        <td class="px-4 py-2 border">Rp 150.000</td>
                        <td class="px-4 py-2 border text-green-600">Selesai</td>
                        <td class="px-4 py-2 border">✅</td>
                    </tr>
                    <tr class="hover:bg-gray-50">
                        <td class="px-4 py-2 border">2</td>
                        <td class="px-4 py-2 border">Siti</td>
                        <td class="px-4 py-2 border">Produk B</td>
                        <td class="px-4 py-2 border">Rp 200.000</td>
                        <td class="px-4 py-2 border text-yellow-500">Proses</td>
                        <td class="px-4 py-2 border">⌛</td>
                    </tr>
                    <tr class="hover:bg-gray-50">
                        <td class="px-4 py-2 border">3</td>
                        <td class="px-4 py-2 border">Andi</td>
                        <td class="px-4 py-2 border">Produk C</td>
                        <td class="px-4 py-2 border">Rp 300.000</td>
                        <td class="px-4 py-2 border text-red-600">Batal</td>
                        <td class="px-4 py-2 border">❌</td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
