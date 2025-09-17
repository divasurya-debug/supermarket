@extends('layouts.admin')
@section('title', 'Tambah Merek Baru')
@section('content')
<div class="bg-white p-8 rounded-lg shadow-md">
    <h2 class="text-2xl font-bold mb-6">Tambah Merek Baru</h2>

    <!-- Flash Messages -->
    @if(session('success'))
        <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded mb-4">
            {{ session('success') }}
        </div>
    @endif

    @if(session('error'))
        <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded mb-4">
            {{ session('error') }}
        </div>
    @endif

    <form action="{{ route('admin.brands.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="mb-4">
            <label for="nama_merek" class="block text-gray-700 font-medium mb-2">Nama Merek</label>
            <input type="text" id="nama_merek" name="nama_merek"
                   class="w-full px-4 py-2 border rounded-lg"
                   value="{{ old('nama_merek') }}" required>
            @error('nama_merek')
            <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
            @enderror
        </div>

        <div class="mb-4">
            <label for="negara_asal" class="block text-gray-700 font-medium mb-2">Negara Asal</label>
            <input type="text" id="negara_asal" name="negara_asal"
                   class="w-full px-4 py-2 border rounded-lg"
                   value="{{ old('negara_asal') }}">
            @error('negara_asal')
            <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
            @enderror
        </div>

        <div class="mb-6">
            <label for="gambar" class="block text-gray-700 font-medium mb-2">Logo Merek</label>
            <input type="file" id="gambar" name="gambar" class="w-full text-gray-700 bg-gray-50 border rounded-lg">
            @error('gambar')
            <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
            @enderror
        </div>

        <div class="flex items-center justify-end">
            <a href="{{ route('admin.brands.index') }}" class="text-gray-600 mr-4">Batal</a>
            <button type="submit" class="bg-purple-700 text-white font-bold py-2 px-6 rounded-lg">Simpan</button>
        </div>
    </form>
</div>
@endsection
