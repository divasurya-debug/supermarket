@extends('layouts.admin')

@section('title', 'Banner - Admin Supermarket')

@section('content')
  <div class="flex justify-between items-center mb-6">
    <h2 class="text-2xl font-bold">Daftar Banner</h2>
    {{-- Tombol untuk menuju halaman tambah banner --}}
    <a href="{{ route('admin.banner.create') }}" class="bg-purple-700 text-white font-bold py-2 px-4 rounded hover:bg-purple-800">
      + Tambah Banner
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
          <th class="px-4 py-3 text-left text-xs font-medium uppercase tracking-wider">ID</th>
          <th class="px-4 py-3 text-left text-xs font-medium uppercase tracking-wider">Gambar</th>
          <th class="px-4 py-3 text-left text-xs font-medium uppercase tracking-wider">Created At</th>
          <th class="px-4 py-3 text-left text-xs font-medium uppercase tracking-wider">Updated At</th>
          <th class="px-4 py-3 text-left text-xs font-medium uppercase tracking-wider">Aksi</th>
        </tr>
      </thead>
      <tbody class="divide-y divide-gray-200">
        {{-- Gunakan @forelse untuk looping data, dengan @empty jika data kosong --}}
        @forelse ($banners as $banner)
        <tr class="hover:bg-gray-50">
          <td class="px-4 py-4 whitespace-nowrap font-medium text-gray-900">
              {{ $banner->id_banner }}
          </td>
          <td class="px-4 py-4 whitespace-nowrap">
            @if($banner->gambar)
              <img src="{{ asset('storage/'.$banner->gambar) }}" 
                alt="Banner" 
                class="h-12 w-24 object-cover rounded shadow">
            @else
              <span class="text-gray-400 italic">Tidak ada gambar</span>
            @endif
          </td>
          <td class="px-4 py-4 whitespace-nowrap text-gray-500">
              {{ $banner->created_at->format('d M Y, H:i') }}
          </td>
          <td class="px-4 py-4 whitespace-nowrap text-gray-500">
              {{ $banner->updated_at->format('d M Y, H:i') }}
          </td>
          <td class="px-4 py-4 whitespace-nowrap text-sm font-medium">
            <a href="{{ route('admin.banner.edit', $banner->id_banner) }}" class="text-indigo-600 hover:text-indigo-900 mr-4">Edit</a>
            <form action="{{ route('admin.banner.destroy', $banner->id_banner) }}" method="POST" class="inline-block" onsubmit="return confirm('Yakin mau hapus?');">
              @csrf
              @method('DELETE')
              <button type="submit" class="text-red-600 hover:text-red-900">Hapus</button>
            </form>
          </td>
        </tr>
      @empty
        <tr>
          <td colspan="5" class="text-center py-10 text-gray-500">
            Tidak ada data banner.
          </td>
        </tr>
      @endforelse
      </tbody>
    </table>
  </div>
@endsection
