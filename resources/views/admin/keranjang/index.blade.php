@extends('layouts.admin')

@section('title', 'Keranjang')

@section('content')
  <div class="flex justify-between items-center mb-6">
    <h2 class="text-2xl font-bold">📦 Daftar Keranjang</h2>
    {{-- (opsional) kalau butuh tombol tambah produk di keranjang --}}
    {{-- <a href="#" class="bg-purple-700 text-white font-bold py-2 px-4 rounded hover:bg-purple-800">
      + Tambah Keranjang
    </a> --}}
  </div>

  {{-- Alert Sukses --}}
  @if (session('success'))
    <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative mb-4" role="alert">
      <span class="block sm:inline">{{ session('success') }}</span>
    </div>
  @endif

  <div class="bg-white shadow-md rounded-lg overflow-hidden">
    <div class="overflow-x-auto">
      <table class="min-w-full border-collapse">
        <thead>
          <tr class="bg-purple-700 text-white text-sm leading-normal">
            <th class="py-3 px-6 text-left uppercase font-semibold">#</th>
            <th class="py-3 px-6 text-left uppercase font-semibold">Nama Produk</th>
            <th class="py-3 px-6 text-center uppercase font-semibold">Jumlah</th>
            <th class="py-3 px-6 text-left uppercase font-semibold">Harga</th>
            <th class="py-3 px-6 text-left uppercase font-semibold">Total</th>
            <th class="py-3 px-6 text-center uppercase font-semibold">Aksi</th>
          </tr>
        </thead>
        <tbody class="text-gray-600 text-sm divide-y divide-gray-200">
          @forelse($keranjang as $index => $item)
            <tr class="hover:bg-gray-50">
              <td class="py-3 px-6 text-gray-900 text-center">{{ $index + 1 }}</td>
              <td class="py-3 px-6 font-medium">{{ $item->produk->nama_produk ?? '-' }}</td>
              <td class="py-3 px-6 text-center">{{ $item->jumlah }}</td>
              <td class="py-3 px-6">Rp {{ number_format($item->produk->harga ?? 0, 0, ',', '.') }}</td>
              <td class="py-3 px-6 font-semibold text-purple-700">
                Rp {{ number_format(($item->produk->harga ?? 0) * $item->jumlah, 0, ',', '.') }}
              </td>
              <td class="py-3 px-6 text-center">
                <form action="{{ route('admin.keranjang.destroy', $item->id_keranjang) }}" 
                      method="POST" 
                      onsubmit="return confirm('Yakin hapus?');" 
                      class="inline-block">
                  @csrf
                  @method('DELETE')
                  <button type="submit" 
                          class="text-red-600 hover:text-red-900 font-semibold">
                    Hapus
                  </button>
                </form>
              </td>
            </tr>
          @empty
            <tr>
              <td colspan="6" class="text-center py-10 text-gray-500">
                Belum ada data keranjang.
              </td>
            </tr>
          @endforelse
        </tbody>
      </table>
    </div>
  </div>

  {{-- Total Keseluruhan --}}
  <div class="mt-6 text-right">
    <p class="text-lg font-bold text-purple-700">
      Total Keseluruhan: Rp {{ number_format($keranjang->sum(fn($k) => ($k->produk->harga ?? 0) * $k->jumlah), 0, ',', '.') }}
    </p>
  </div>
@endsection
