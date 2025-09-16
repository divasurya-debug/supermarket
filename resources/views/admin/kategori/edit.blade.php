@extends('layouts.admin')

@section('title', 'Edit Kategori')

@section('content')
<div class="bg-white p-6 rounded-lg shadow max-w-lg mx-auto">
    <h1 class="text-2xl font-bold mb-6">Edit Kategori</h1>

    <!-- ❌ Tampilkan error jika ada -->
    @if ($errors->any())
        <div class="bg-red-100 text-red-700 p-3 rounded mb-4">
            <ul class="list-disc list-inside">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('admin.kategori.update', $kategori->id_kategori) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <!-- Nama Kategori -->
        <div class="mb-4">
            <label class="block text-gray-700 font-semibold mb-2">Nama Kategori</label>
            <input type="text" name="nama_kategori" value="{{ old('nama_kategori', $kategori->nama_kategori) }}"
                   class="w-full border rounded px-3 py-2 focus:outline-purple-600"
                   required>
        </div>

        <!-- Deskripsi -->
        <div class="mb-4">
            <label class="block text-gray-700 font-semibold mb-2">Deskripsi</label>
            <textarea name="deskripsi" rows="3"
                      class="w-full border rounded px-3 py-2 focus:outline-purple-600">{{ old('deskripsi', $kategori->deskripsi) }}</textarea>
        </div>

        <!-- Upload Gambar Kategori -->
        <div class="mb-4">
            <label class="block text-gray-700 font-semibold mb-2">Gambar Kategori</label>

            <!-- Tampilkan gambar lama jika ada -->
            @if($kategori->gambar_kategori)
                <div class="mb-2">
                    <img src="{{ $kategori->gambar_kategori }}" 
                         alt="{{ $kategori->nama_kategori }}" 
                         class="h-16 w-16 object-cover rounded shadow">
                </div>
            @endif

            <input type="file" name="gambar_kategori"
                   class="w-full border rounded px-3 py-2 focus:outline-purple-600">
            <small class="text-gray-500">Biarkan kosong jika tidak ingin mengubah gambar.</small>
        </div>

        <!-- Tombol aksi -->
        <div class="flex justify-end gap-3">
            <a href="{{ route('admin.kategori.index') }}" 
               class="bg-gray-500 hover:bg-gray-600 text-white px-4 py-2 rounded-lg">
                Batal
            </a>
            <button type="submit" 
                    class="bg-purple-700 hover:bg-purple-800 text-white px-4 py-2 rounded-lg">
                Update
            </button>
        </div>
    </form>
</div>
@endsection
