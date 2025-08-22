@extends('layouts.admin')
@section('title', 'Edit Merek')
@section('content')
  <div class="bg-white p-8 rounded-lg shadow-md">
    <h2 class="text-2xl font-bold mb-6">Edit Merek: {{ $brand->nama_merek }}</h2>
    <form action="{{ route('admin.brands.update', $brand->id_brands) }}" method="POST" enctype="multipart/form-data">
      @csrf
      @method('PUT')
      <div class="mb-4">
        <label for="nama_merek" class="block text-gray-700 font-medium mb-2">Nama Merek</label>
        <input type="text" id="nama_merek" name="nama_merek" class="w-full px-4 py-2 border rounded-lg" value="{{ old('nama_merek', $brand->nama_merek) }}" required>
        @error('nama_merek') <p class="text-red-500 text-xs mt-1">{{ $message }}</p> @enderror
      </div>
      <div class="mb-4">
        <label for="negara_asal" class="block text-gray-700 font-medium mb-2">Negara Asal</label>
        <input type="text" id="negara_asal" name="negara_asal" class="w-full px-4 py-2 border rounded-lg" value="{{ old('negara_asal', $brand->negara_asal) }}">
      </div>
      <div class="mb-6">
        <label for="gambar" class="block text-gray-700 font-medium mb-2">Ganti Logo</label>
        <img src="{{ asset('storage/' . $brand->gambar) }}" alt="{{ $brand->nama_merek }}" class="w-24 h-24 rounded-lg object-cover mb-2">
        <input type="file" id="gambar" name="gambar" class="w-full text-gray-700 bg-gray-50 border rounded-lg">
        <small class="text-gray-500">Kosongkan jika tidak ingin ganti logo.</small>
      </div>
      <div class="flex items-center justify-end">
        <a href="{{ route('admin.brands.index') }}" class="text-gray-600 mr-4">Batal</a>
        <button type="submit" class="bg-purple-700 text-white font-bold py-2 px-6 rounded-lg">Update</button>
      </div>
    </form>
  </div>
@endsection