@extends('layouts.admin')

@section('title', 'Produk - Admin Supermarket')

@section('content')
  <div class="flex flex-col sm:flex-row justify-between items-center mb-6 gap-3">
    <h2 class="text-2xl font-bold">Daftar Produk</h2>
    {{-- Tombol untuk menuju halaman tambah produk --}}
    <a href="{{ route('admin.produk.create') }}" class="bg-purple-700 text-white font-bold py-2 px-4 rounded hover:bg-purple-800 w-full sm:w-auto text-center">
      + Tambah Produk
    </a>
  </div>

  {{-- Menampilkan pesan sukses jika ada --}}
  @if (session('success'))
    <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative mb-4 text-sm sm:text-base" role="alert">
      <span class="block sm:inline">{{ session('success') }}</span>
    </div>
  @endif

  {{-- Wrapper tabel agar bisa scroll di HP --}}
  <div class="bg-white shadow-md rounded-lg overflow-hidden">
    <div class="overflow-x-auto">
      <table class="w-full table-auto text-sm sm:text-base">
        <thead class="bg-purple-700 text-white">
          <tr>
            <th class="px-4 py-3 text-left text-xs font-medium uppercase tracking-wider">Gambar</th>
            <th class="px-4 py-3 text-left text-xs font-medium uppercase tracking-wider">Nama Produk</th>
            <th class="px-4 py-3 text-left text-xs font-medium uppercase tracking-wider hidden sm:table-cell">Brand</th>
            <th class="px-4 py-3 text-left text-xs font-medium uppercase tracking-wider">Harga</th>
            <th class="px-4 py-3 text-left text-xs font-medium uppercase tracking-wider hidden sm:table-cell">Stok</th>
            <th class="px-4 py-3 text-left text-xs font-medium uppercase tracking-wider hidden sm:table-cell">Jumlah Terjual</th>
            <th class="px-4 py-3 text-left text-xs font-medium uppercase tracking-wider">Aksi</th>
          </tr>
        </thead>
        <tbody class="divide-y divide-gray-200">
          @forelse ($products as $product)
            <tr class="hover:bg-gray-50">
              <td class="px-4 py-4 whitespace-nowrap">
                @php
                  use Illuminate\Support\Str;
                  $gambarPath = (Str::contains($product->gambar, ['storage', 'uploads']))
                      ? asset($product->gambar)
                      : asset('uploads/produk/' . $product->gambar);
                @endphp

                <img src="{{ $gambarPath }}"
                     alt="{{ $product->nama_produk }}"
                     class="rounded shadow object-cover h-16 w-16 sm:h-20 sm:w-20">
              </td>
              <td class="px-4 py-4 whitespace-nowrap font-medium text-gray-900">{{ $product->nama_produk }}</td>
              <td class="px-4 py-4 whitespace-nowrap text-gray-500 hidden sm:table-cell">{{ $product->brand->nama_merek ?? 'N/A' }}</td>
              <td class="px-4 py-4 whitespace-nowrap text-gray-500">Rp {{ number_format($product->harga, 0, ',', '.') }}</td>
              <td class="px-4 py-4 whitespace-nowrap text-gray-500 hidden sm:table-cell">{{ $product->stok }}</td>
              <td class="px-4 py-4 whitespace-nowrap text-gray-500 hidden sm:table-cell">{{ $product->jumlah_terjual }}</td>
              <td class="px-4 py-4 whitespace-nowrap text-sm font-medium space-x-2">
                <a href="{{ route('admin.produk.edit', $product->id_produk) }}" class="text-indigo-600 hover:text-indigo-900">Edit</a>
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
    </div>
  </div>

  <div class="mt-6">
    {{ $products->links() }}
  </div>
@endsection
