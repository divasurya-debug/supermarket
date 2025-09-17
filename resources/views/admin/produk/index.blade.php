@extends('layouts.admin')

@section('title', 'Kategori - Admin Supermarket')

@section('content')
  <div class="flex justify-between items-center mb-6">
    <h2 class="text-2xl font-bold">Daftar Kategori</h2>
    <a href="{{ route('admin.kategori.create') }}" 
       class="bg-purple-700 text-white font-bold py-2 px-4 rounded hover:bg-purple-800">
      + Tambah Kategori
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
          <th class="px-4 py-3 text-left text-xs font-medium uppercase tracking-wider">Gambar</th>
          <th class="px-4 py-3 text-left text-xs font-medium uppercase tracking-wider">Nama Kategori</th>
          <th class="px-4 py-3 text-left text-xs font-medium uppercase tracking-wider">Deskripsi</th>
          <th class="px-4 py-3 text-left text-xs font-medium uppercase tracking-wider">Aksi</th>
        </tr>
      </thead>
      <tbody class="divide-y divide-gray-200">
        @forelse ($kategoris as $kategori)
          <tr class="hover:bg-gray-50">
            <td class="px-4 py-4 whitespace-nowrap">
              @if(!empty($kategori->gambar_kategori))
                <img src="{{ $kategori->gambar_kategori }}" 
                     alt="{{ $kategori->nama_kategori ?? 'Kategori' }}" 
                     width="80" 
                     class="rounded shadow">
              @else
                <span class="text-gray-400 italic">Tidak ada gambar</span>
              @endif
            </td>
            <td class="px-4 py-4 whitespace-nowrap font-medium text-gray-900">
              {{ $kategori->nama_kategori }}
            </td>
            <td class="px-4 py-4 whitespace-nowrap text-gray-500">
              {{ $kategori->deskripsi ?? '-' }}
            </td>
            <td class="px-4 py-4 whitespace-nowrap text-sm font-medium">
              <a href="{{ route('admin.kategori.edit', $kategori->id_kategori) }}" 
                 class="text-indigo-600 hover:text-indigo-900 mr-4">Edit</a>
              <form action="{{ route('admin.kategori.destroy', $kategori->id_kategori) }}" 
                    method="POST" 
                    class="inline-block" 
                    onsubmit="return confirm('Apakah Anda yakin ingin menghapus kategori ini?');">
                @csrf
                @method('DELETE')
                <button type="submit" class="text-red-600 hover:text-red-900">Hapus</button>
              </form>
            </td>
          </tr>
        @empty
          <tr>
            <td colspan="4" class="text-center py-10 text-gray-500">
              Tidak ada data kategori.
            </td>
          </tr>
        @endforelse
      </tbody>
    </table>
  </div>

  <div class="mt-6">
    {{ $kategoris->links() }}
  </div>
@endsection
