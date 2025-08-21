@extends('layouts.admin')

@section('title', 'Tambah Banner Baru')

@section('content')
  <div class="bg-white p-8 rounded-lg shadow-md">
    <h2 class="text-2xl font-bold mb-6">Tambah Banner Baru</h2>

    {{-- Form mengarah ke route 'admin.banner.store' dengan method POST --}}
    {{-- enctype="multipart/form-data" WAJIB untuk upload file --}}
    <form action="{{ route('admin.banner.store') }}" method="POST" enctype="multipart/form-data">
      @csrf {{-- Token keamanan Laravel --}}
      
      <div class="mb-6">
        <label for="gambar" class="block text-gray-700 font-medium mb-2">Upload Gambar Banner</label>
        <input type="file" id="gambar" name="gambar" class="w-full text-gray-700 bg-gray-50 border rounded-lg cursor-pointer focus:outline-none" required>
        <p class="mt-1 text-sm text-gray-500">Format: JPG, PNG, GIF | Ukuran Maksimal: 2MB.</p>
        
        {{-- Menampilkan error spesifik untuk field 'gambar' --}}
        @error('gambar')
          <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
        @enderror
      </div>

      <div class="flex items-center justify-end">
        <a href="{{ route('admin.banner.index') }}" class="text-gray-600 hover:text-gray-900 mr-4">Batal</a>
        <button type="submit" class="bg-purple-700 text-white font-bold py-2 px-6 rounded-lg hover:bg-purple-800">
          Simpan Banner
        </button>
      </div>
    </form>
  </div>
@endsection