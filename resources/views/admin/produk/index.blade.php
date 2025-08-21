@extends('layouts.admin')

@section('title', 'Produk - Admin Supermarket')

@section('content')
  <div class="flex justify-between items-center mb-6">
    <h2 class="text-2xl font-bold">Daftar Produk</h2>
    {{-- Tombol untuk menuju halaman tambah produk --}}
    <a href="{{ route('admin.produk.create') }}" class="bg-purple-700 text-white font-bold py-2 px-4 rounded hover:bg-purple-800">
      + Tambah Produk
    </a>
  </div>

  {{-- Menampilkan pesan sukses jika ada --}}
  @if (session('success'))
    <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative mb-4" role="alert">
      <span class="block sm:inline">{{ session('success') }}</span>
    </div>
  @endif

  <div class="bg-white shadow-md rounded-lg overflow-hidden">
    <table class="w-full table-auto">
      <thead class="bg-purple-700 text-white">
        <tr>
          <th class="px-4 py-3 text-left text-xs font-medium uppercase tracking-wider">Gambar</th>
          <th class="px-4 py-3 text-left text-xs font-medium uppercase tracking-wider">Nama Produk</th>
          <th class="px-4 py-3 text-left text-xs font-medium uppercase tracking-wider">Brand</th>
          <th class="px-4 py-3 text-left text-xs font-medium uppercase tracking-wider">Harga</th>
          <th class="px-4 py-3 text-left text-xs font-medium uppercase tracking-wider">Stok</th>
          <th class="px-4 py-3 text-left text-xs font-medium uppercase tracking-wider">Aksi</th>
        </tr>
      </thead>
      <tbody class="divide-y divide-gray-200">
        {{-- Gunakan @forelse untuk looping data, dengan @empty jika data kosong --}}
        @forelse ($products as $product)
          <tr class="hover:bg-gray-50">
            <td class="px-4 py-4 whitespace-nowrap">
              {{-- Pastikan storage sudah di-link --}}
              <img src="{{ asset('storage/' . $product->gambar) }}" alt="{{ $product->nama_produk }}" width="80" class="rounded shadow">
            </td>
            <td class="px-4 py-4 whitespace-nowrap font-medium text-gray-900">{{ $product->nama_produk }}</td>
            {{-- Mengambil nama brand dari relasi --}}
            <td class="px-4 py-4 whitespace-nowrap text-gray-500">{{ $product->brand->nama_merek ?? 'N/A' }}</td>
            {{-- Format harga agar lebih rapi --}}
            <td class="px-4 py-4 whitespace-nowrap text-gray-500">Rp {{ number_format($product->harga, 0, ',', '.') }}</td>
            <td class="px-4 py-4 whitespace-nowrap text-gray-500">{{ $product->stok }}</td>
            <td class="px-4 py-4 whitespace-nowrap text-sm font-medium">
              {{-- Tombol Edit --}}
              <a href="{{ route('admin.produk.edit', $product->id_produk) }}" class="text-indigo-600 hover:text-indigo-900 mr-4">Edit</a>
              {{-- Form untuk Tombol Hapus --}}
              <form action="{{ route('admin.produk.destroy', $product->id_produk) }}" method="POST" class="inline-block" onsubmit="return confirm('Apakah Anda yakin ingin menghapus produk ini?');">
                @csrf
                @method('DELETE')
                <button type="submit" class="text-red-600 hover:text-red-900">Hapus</button>
              </form>
            </td>
          </tr>
        @empty
          <tr>
            <td colspan="6" class="text-center py-10 text-gray-500">
              Tidak ada data produk.
            </td>
          </tr>
        @endforelse
      </tbody>
    </table>
  </div>

  {{-- Menampilkan link pagination --}}
  <div class="mt-6">
    {{ $products->links() }}
  </div>
@endsection