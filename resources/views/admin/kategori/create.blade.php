@extends('layouts.admin')

@section('title', 'Tambah Kategori')

@section('content')
<div class="bg-white p-6 rounded-lg shadow max-w-lg mx-auto">
    <h1 class="text-2xl font-bold mb-6">Tambah Kategori</h1>

    <form action="{{ route('admin.kategori.store') }}" method="POST" enctype="multipart/form-data">
        @csrf

        <div class="mb-4">
            <label class="block text-gray-700 font-semibold mb-2">Nama Kategori</label>
            <input type="text" name="nama_kategori" 
                   class="w-full border rounded px-3 py-2 focus:outline-purple-600"
                   required>
        </div>

        <div class="mb-4">
            <label class="block text-gray-700 font-semibold mb-2">Deskripsi</label>
            <textarea name="deskripsi" rows="3" 
                      class="w-full border rounded px-3 py-2 focus:outline-purple-600"></textarea>
        </div>

        <!-- ✅ Upload Gambar Kategori -->
        <div class="mb-4">
            <label class="block text-gray-700 font-semibold mb-2">Gambar Kategori</label>
            <input type="file" name="gambar_kategori" 
                   class="w-full border rounded px-3 py-2 focus:outline-purple-600">
        </div>

        <div class="flex justify-end gap-3">
            <a href="{{ route('admin.kategori.index') }}" 
               class="bg-gray-500 hover:bg-gray-600 text-white px-4 py-2 rounded-lg">
                Batal
            </a>
            <button type="submit" 
                    class="bg-purple-700 hover:bg-purple-800 text-white px-4 py-2 rounded-lg">
                Simpan
            </button>
        </div>
    </form>
</div>
@endsection
