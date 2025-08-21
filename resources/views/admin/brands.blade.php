@extends('layouts.admin')

@section('content')
    <h2 class="text-2xl font-bold mb-4">Daftar Merek Produk</h2>
    <table class="table-auto w-full border-collapse border border-gray-300">
        <thead class="bg-purple-800 text-white">
            <tr>
                <th class="border border-gray-300 px-4 py-2">ID</th>
                <th class="border border-gray-300 px-4 py-2">Nama Merek</th>
                <th class="border border-gray-300 px-4 py-2">Negara Asal</th>
                <th class="border border-gray-300 px-4 py-2">Logo</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td class="border border-gray-300 px-4 py-2">1</td>
                <td class="border border-gray-300 px-4 py-2">Nike</td>
                <td class="border border-gray-300 px-4 py-2">USA</td>
                <td class="border border-gray-300 px-4 py-2">
                    <img src="/storage/logo/nike.png" alt="Nike" class="w-20">
                </td>
            </tr>
        </tbody>
    </table>
@endsection
