@extends('layouts.admin')

@section('title', 'Checkout Admin')

@section('content')
<div class="container">
    <h1 class="text-2xl font-bold mb-4">Halaman Checkout (Admin)</h1>
    <p>Ini hanya tampilan statis untuk halaman checkout admin.</p>

    <div class="card mt-4 p-4 shadow rounded">
        <h2 class="text-lg font-semibold">Daftar Checkout</h2>
        <table class="table-auto w-full mt-3 border">
            <thead>
                <tr class="bg-gray-200">
                    <th class="px-4 py-2 border">No</th>
                    <th class="px-4 py-2 border">Nama Customer</th>
                    <th class="px-4 py-2 border">Produk</th>
                    <th class="px-4 py-2 border">Total</th>
                    <th class="px-4 py-2 border">Status</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td class="border px-4 py-2">1</td>
                    <td class="border px-4 py-2">Budi</td>
                    <td class="border px-4 py-2">Produk A</td>
                    <td class="border px-4 py-2">Rp 150.000</td>
                    <td class="border px-4 py-2">Selesai</td>
                </tr>
                <tr>
                    <td class="border px-4 py-2">2</td>
                    <td class="border px-4 py-2">Siti</td>
                    <td class="border px-4 py-2">Produk B</td>
                    <td class="border px-4 py-2">Rp 200.000</td>
                    <td class="border px-4 py-2">Proses</td>
                </tr>
            </tbody>
        </table>
    </div>
</div>
@endsection
