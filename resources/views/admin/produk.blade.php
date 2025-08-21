@extends('layouts.admin')

@section('title', 'Produk - Admin Supermarket')

@section('content')
  <h2 class="text-2xl font-bold mb-4">Daftar Produk</h2>

  <table class="table-auto w-full border-collapse border border-gray-300">
      <thead class="bg-purple-700 text-white">
          <tr>
              <th class="border border-gray-300 px-4 py-2">ID</th>
              <th class="border border-gray-300 px-4 py-2">Nama Produk</th>
              <th class="border border-gray-300 px-4 py-2">Brand</th>
              <th class="border border-gray-300 px-4 py-2">Harga</th>
              <th class="border border-gray-300 px-4 py-2">Stok</th>
              <th class="border border-gray-300 px-4 py-2">Deskripsi</th>
              <th class="border border-gray-300 px-4 py-2">Gambar</th>
          </tr>
      </thead>
      <tbody>
          <tr class="bg-white hover:bg-gray-100">
              <td class="border border-gray-300 px-4 py-2">1</td>
              <td class="border border-gray-300 px-4 py-2">Sneakers AirMax</td>
              <td class="border border-gray-300 px-4 py-2">Nike</td>
              <td class="border border-gray-300 px-4 py-2">Rp 1.200.000</td>
              <td class="border border-gray-300 px-4 py-2">20</td>
              <td class="border border-gray-300 px-4 py-2">Sepatu olahraga ringan dan nyaman</td>
              <td class="border border-gray-300 px-4 py-2">
                  <img src="{{ asset('storage/produk/airmax.jpg') }}" alt="AirMax" width="80" class="rounded shadow">
              </td>
          </tr>
          <tr class="bg-white hover:bg-gray-100">
              <td class="border border-gray-300 px-4 py-2">2</td>
              <td class="border border-gray-300 px-4 py-2">Kaos Polos</td>
              <td class="border border-gray-300 px-4 py-2">Uniqlo</td>
              <td class="border border-gray-300 px-4 py-2">Rp 120.000</td>
              <td class="border border-gray-300 px-4 py-2">100</td>
              <td class="border border-gray-300 px-4 py-2">Kaos katun adem untuk sehari-hari</td>
              <td class="border border-gray-300 px-4 py-2">
                  <img src="{{ asset('storage/produk/kaos.jpg') }}" alt="Kaos" width="80" class="rounded shadow">
              </td>
          </tr>
      </tbody>
  </table>
@endsection
