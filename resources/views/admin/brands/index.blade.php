@extends('layouts.admin')

@section('title', 'Merek Produk - Admin')

@section('content')
  <div class="flex justify-between items-center mb-6">
    <h2 class="text-2xl font-bold">Daftar Merek Produk</h2>
    <a href="{{ route('admin.brands.create') }}" class="bg-purple-700 text-white font-bold py-2 px-4 rounded hover:bg-purple-800">
      + Tambah Merek
    </a>
  </div>

  @if (session('success'))
    <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative mb-4" role="alert">
      <span class="block sm:inline">{{ session('success') }}</span>
    </div>
  @endif

  <div class="bg-white shadow-md rounded-lg overflow-hidden">
    <table class="w-full table-auto">
      <thead class="bg-purple-700 text-white">
        <tr>
          <th class="px-4 py-3 text-left text-xs font-medium uppercase tracking-wider">Logo</th>
          <th class="px-4 py-3 text-left text-xs font-medium uppercase tracking-wider">Nama Merek</th>
          <th class="px-4 py-3 text-left text-xs font-medium uppercase tracking-wider">Negara Asal</th>
          <th class="px-4 py-3 text-left text-xs font-medium uppercase tracking-wider">Aksi</th>
        </tr>
      </thead>
      <tbody class="divide-y divide-gray-200">
        @forelse($brands as $brand)
          <tr class="hover:bg-gray-50">
            <td class="px-4 py-4 whitespace-nowrap">
              <img src="{{ asset($brand->gambar) }}" 
                   alt="{{ $brand->nama_merek }}" 
                   width="80" 
                   class="rounded shadow bg-gray-100 p-1">
            </td>
            <td class="px-4 py-4 whitespace-nowrap font-medium text-gray-900">{{ $brand->nama_merek }}</td>
            <td class="px-4 py-4 whitespace-nowrap text-gray-500">{{ $brand->negara_asal }}</td>
            <td class="px-4 py-4 whitespace-nowrap text-sm font-medium">
              <a href="{{ route('admin.brands.edit', $brand->id_brands) }}" class="text-indigo-600 hover:text-indigo-900 mr-4">Edit</a>
              <form action="{{ route('admin.brands.destroy', $brand->id_brands) }}" method="POST" class="inline-block" onsubmit="return confirm('Apakah Anda yakin?');">
                @csrf
                @method('DELETE')
                <button type="submit" class="text-red-600 hover:text-red-900">Hapus</button>
              </form>
            </td>
          </tr>
        @empty
          <tr>
            <td colspan="4" class="text-center py-10 text-gray-500">
              Belum ada data merek.
            </td>
          </tr>
        @endforelse
      </tbody>
    </table>
  </div>

  <div class="mt-6">
    @if ($brands->hasPages())
        {{ $brands->links() }}
    @endif
  </div>
@endsection
