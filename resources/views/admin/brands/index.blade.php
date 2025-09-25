@extends('layouts.admin')

@section('title', 'Merek Produk - Admin')

@section('content')
  <h1 class="text-3xl font-bold mb-6">Daftar Merek Produk</h1>

  <!-- Tombol Tambah -->
  <div class="mb-4 flex justify-end">
    <a href="{{ route('admin.brands.create') }}" 
       class="bg-purple-700 hover:bg-purple-800 text-white font-semibold py-2 px-4 rounded-lg shadow">
      + Tambah Merek
    </a>
  </div>

  <!-- Notifikasi sukses -->
  @if (session('success'))
    <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative mb-4">
      {{ session('success') }}
    </div>
  @endif

  <!-- Tabel Data -->
  <div class="bg-white shadow-md rounded-lg overflow-hidden">
    <div class="overflow-x-auto">
      <table class="w-full table-auto">
        <thead class="bg-purple-700 text-white">
          <tr>
            <th class="px-4 py-3 text-left">ID</th>
            <th class="px-4 py-3 text-left">Logo</th>
            <th class="px-4 py-3 text-left">Nama Merek</th>
            <th class="px-4 py-3 text-left">Negara Asal</th>
            <th class="px-4 py-3 text-center">Aksi</th>
          </tr>
        </thead>
        <tbody class="divide-y divide-gray-200">
          @forelse($brands as $brand)
            <tr>
              <td class="px-4 py-3">{{ $brand->id_brands }}</td>
              <td class="px-4 py-3">
                @if ($brand->gambar)
                  <img src="{{ asset('storage/' . $brand->gambar) }}" 
                       alt="{{ $brand->nama_merek }}" 
                       class="w-16 h-16 object-cover rounded shadow bg-gray-100 p-1">
                @else
                  <span class="text-gray-400 italic">Tidak ada logo</span>
                @endif
              </td>
              <td class="px-4 py-3 font-medium">{{ $brand->nama_merek }}</td>
              <td class="px-4 py-3">{{ $brand->negara_asal }}</td>
              <td class="px-4 py-3 text-center">
                <a href="{{ route('admin.brands.edit', $brand->id_brands) }}" 
                   class="bg-yellow-400 hover:bg-yellow-500 text-white font-semibold py-1 px-3 rounded mr-2">
                  Edit
                </a>
                <form action="{{ route('admin.brands.destroy', $brand->id_brands) }}" 
                      method="POST" 
                      class="inline-block"
                      onsubmit="return confirm('Apakah Anda yakin?');">
                  @csrf
                  @method('DELETE')
                  <button type="submit" 
                          class="bg-red-600 hover:bg-red-700 text-white font-semibold py-1 px-3 rounded">
                    Hapus
                  </button>
                </form>
              </td>
            </tr>
          @empty
            <tr>
              <td colspan="5" class="text-center py-10 text-gray-500">
                Belum ada data merek.
              </td>
            </tr>
          @endforelse
        </tbody>
      </table>
    </div>
  </div>

  <!-- Pagination -->
  <div class="mt-6">
    @if ($brands->hasPages())
      {{ $brands->links() }}
    @endif
  </div>
@endsection
