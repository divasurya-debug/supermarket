@extends('layouts.admin')

@section('title', 'Banner - Admin Supermarket')

@section('content')
  <div class="flex justify-between items-center mb-6">
    <h2 class="text-2xl font-bold">Daftar Banner</h2>
    <a href="{{ route('admin.banner.create') }}" 
       class="bg-purple-700 text-white font-bold py-2 px-4 rounded hover:bg-purple-800">
      + Tambah Banner
    </a>
  </div>

  {{-- Pesan sukses --}}
  @if (session('success'))
    <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded mb-4">
      {{ session('success') }}
    </div>
  @endif

  <div class="bg-white shadow-md rounded-lg overflow-hidden">
    <div class="overflow-x-auto">
      <table class="w-full table-auto">
        <thead class="bg-purple-700 text-white">
          <tr>
            <th class="px-4 py-3 text-left text-xs font-medium uppercase">ID</th>
            <th class="px-4 py-3 text-left text-xs font-medium uppercase">Gambar</th>
            <th class="px-4 py-3 text-left text-xs font-medium uppercase">Created At</th>
            <th class="px-4 py-3 text-left text-xs font-medium uppercase">Updated At</th>
            <th class="px-4 py-3 text-left text-xs font-medium uppercase">Aksi</th>
          </tr>
        </thead>
        <tbody class="divide-y divide-gray-200">
          @forelse ($banners as $banner)
            <tr class="hover:bg-gray-50">
              <td class="px-4 py-4 font-medium text-gray-900">
                {{ $banner->id_banner }}
              </td>
              <td class="px-4 py-4">
                @if($banner->gambar)
                  <img src="{{ $banner->gambar }}" 
                      alt="Banner"
                      class="h-16 w-32 object-cover rounded shadow">
                @else
                  <span class="text-gray-400 italic">Tidak ada gambar</span>
                @endif
              </td>
              <td class="px-4 py-4 text-gray-500">
                {{ $banner->created_at ? $banner->created_at->format('d M Y, H:i') : '-' }}
              </td>
              <td class="px-4 py-4 text-gray-500">
                {{ $banner->updated_at ? $banner->updated_at->format('d M Y, H:i') : '-' }}
              </td>
              <td class="px-4 py-4 text-sm font-medium space-x-2">
                <a href="{{ route('admin.banner.edit', $banner->id_banner) }}" 
                   class="text-indigo-600 hover:text-indigo-900">Edit</a>
                <form action="{{ route('admin.banner.destroy', $banner->id_banner) }}" 
                      method="POST" 
                      class="inline-block"
                      onsubmit="return confirm('Yakin mau hapus banner ini?');">
                  @csrf
                  @method('DELETE')
                  <button type="submit" class="text-red-600 hover:text-red-900">
                    Hapus
                  </button>
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
  </div>
@endsection
