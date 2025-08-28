@extends('layouts.admin')

@section('title', 'Tambah Banner - Admin Supermarket')

@section('content')
  <h2 class="text-2xl font-bold mb-6">Tambah Banner</h2>

  <form action="{{ route('admin.banner.store') }}" method="POST" enctype="multipart/form-data" class="bg-white shadow-md rounded-lg p-6">
    @csrf

    <div class="mb-4">
      <label for="gambar" class="block text-sm font-medium text-gray-700 mb-2">Upload Gambar</label>
      <input type="file" name="gambar" id="gambar" class="border rounded px-3 py-2 w-full">
      @error('gambar')
        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
      @enderror
    </div>

    <div class="flex justify-end">
      <a href="{{ route('admin.banner.index') }}" class="bg-gray-300 text-gray-700 px-4 py-2 rounded mr-2">Batal</a>
      <button type="submit" class="bg-purple-700 text-white px-4 py-2 rounded hover:bg-purple-800">Simpan</button>
    </div>
  </form>
@endsection
