@extends('layouts.admin')

@section('title', 'Banner - Admin Supermarket')

@section('content')
  <h2 class="text-2xl font-bold mb-4">Daftar Banner</h2>

  <a href="{{ route('admin.banner.create') }}" 
     class="bg-purple-600 text-white px-4 py-2 rounded mb-4 inline-block">
     + Tambah Banner
  </a>

  <table class="table-auto w-full border-collapse border border-gray-300">
      <thead class="bg-purple-700 text-white">
          <tr>
              <th class="border px-4 py-2">ID</th>
              <th class="border px-4 py-2">Gambar</th>
              <th class="border px-4 py-2">Created At</th>
              <th class="border px-4 py-2">Updated At</th>
              <th class="border px-4 py-2">Aksi</th>
          </tr>
      </thead>
      <tbody>
          @forelse($banners as $banner)
              <tr>
                  <td class="border px-4 py-2">{{ $banner->id_banner }}</td>
                  <td class="border px-4 py-2">
                      <img src="{{ asset($banner->gambar) }}" alt="Banner" width="200" class="rounded shadow">
                  </td>
                  <td class="border px-4 py-2">{{ $banner->created_at }}</td>
                  <td class="border px-4 py-2">{{ $banner->updated_at }}</td>
                  <td class="border px-4 py-2">
                      <a href="{{ route('admin.banner.edit', $banner->id_banner) }}" class="text-blue-600">Edit</a> | 
                      <form action="{{ route('admin.banner.destroy', $banner->id_banner) }}" method="POST" class="inline">
                          @csrf
                          @method('DELETE')
                          <button type="submit" class="text-red-600" onclick="return confirm('Yakin mau hapus?')">Hapus</button>
                      </form>
                  </td>
              </tr>
          @empty
              <tr>
                  <td colspan="5" class="text-center text-gray-500 py-4">Belum ada banner.</td>
              </tr>
          @endforelse
      </tbody>
  </table>
@endsection
