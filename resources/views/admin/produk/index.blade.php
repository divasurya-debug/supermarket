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
    {{-- Tambahan untuk responsif --}}
    <div class="overflow-x-auto">
      <table class="w-full table-auto min-w-[800px]">
        <thead class="bg-purple-700 text-white">
          <tr>
            <th class="px-4 py-3 text-left text-xs font-medium uppercase tracking-wider">Gambar</th>
            <th class="px-4 py-3 text-left text-xs font-medium uppercase tracking-wider">Nama Produk</th>
            <th class="px-4 py-3 text-left text-xs font-medium uppercase tracking-wider">Brand</th>
            <th class="px-4 py-3 text-left text-xs font-medium uppercase tracking-wider">Harga</th>
            <th class="px-4 py-3 text-left text-xs font-medium uppercase tracking-wider">Stok</th>
            <th class="px-4 py-3 text-left text-xs font-medium uppercase tracking-wider">Jumlah Terjual</th>
            <th class="px-4 py-3 text-left text-xs font-medium uppercase tracking-wider">Aksi</th>
          </tr>
        </thead>
        <tbody class="divide-y divide-gray-200">
          {{-- Gunakan @forelse untuk looping data, dengan @empty jika data kosong --}}
          @forelse ($products as $product)
            <tr class="hover:bg-gray-50">
              <td class="px-4 py-4 whitespace-nowrap">
                @php
                  // cek apakah path sudah mengandung "storage" atau "uploads"
                  $gambarPath = (Str::contains($product->gambar, ['storage', 'uploads']))
                      ? asset($product->gambar)
                      : asset('uploads/produk/' . $product->gambar);
                @endphp

                <img src="{{ $product->gambar }}" 
                alt="{{ $product->nama_produk }}" 
                width="80" 
                class="rounded shadow object-cover h-20 w-20">

              </td>
              <td class="px-4 py-4 whitespace-nowrap font-medium text-gray-900">{{ $product->nama_produk }}</td>
              <td class="px-4 py-4 whitespace-nowrap text-gray-500">{{ $product->brand->nama_merek ?? 'N/A' }}</td>
              <td class="px-4 py-4 whitespace-nowrap text-gray-500">Rp {{ number_format($product->harga, 0, ',', '.') }}</td>
              <td class="px-4 py-4 whitespace-nowrap text-gray-500">{{ $product->stok }}</td>
              <td class="px-4 py-4 whitespace-nowrap text-gray-500">{{ $product->jumlah_terjual }}</td>
              <td class="px-4 py-4 whitespace-nowrap text-sm font-medium">
                <a href="{{ route('admin.produk.edit', $product->id_produk) }}" class="text-indigo-600 hover:text-indigo-900 mr-4">Edit</a>
                <form action="{{ route('admin.produk.destroy', $product->id_produk) }}" method="POST" class="inline-block" onsubmit="return confirm('Apakah Anda yakin ingin menghapus produk ini?');">
                  @csrf
                  @method('DELETE')
                  <button type="submit" class="text-red-600 hover:text-red-900">Hapus</button>
                </form>
              </td>
            </tr>
          @empty
            <tr>
              <td colspan="7" class="text-center py-10 text-gray-500">
                Tidak ada data produk.
              </td>
            </tr>
          @endforelse
        </tbody>
      </table>
    </div> {{-- penutup div overflow-x-auto --}}
  </div>

  <div class="mt-6">
    {{ $products->links() }}
  </div>
@endsection
