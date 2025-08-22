@extends('layouts.admin')

@section('title', 'Kategori')

@section('content')
<div class="bg-white p-6 rounded-lg shadow">
    <div class="flex justify-between items-center mb-6">
        <h1 class="text-2xl font-bold">Daftar Kategori Produk</h1>
        <a href="{{ route('admin.kategori.create') }}" 
           class="bg-purple-700 hover:bg-purple-800 text-white px-4 py-2 rounded-lg shadow">
            + Tambah Kategori
        </a>
    </div>

    <!-- Tabel Daftar Kategori -->
    <table class="w-full border-collapse rounded-lg overflow-hidden">
        <thead>
            <tr class="bg-purple-800 text-white">
                <th class="p-3 text-left">ID</th>
                <th class="p-3 text-left">Gambar</th> <!-- ✅ Tambah kolom gambar -->
                <th class="p-3 text-left">Nama Kategori</th>
                <th class="p-3 text-left">Deskripsi</th>
                <th class="p-3 text-left">Aksi</th>
            </tr>
        </thead>
        <tbody>
            @forelse($kategoris as $kategori)
                <tr class="border-b hover:bg-gray-50">
                    <td class="p-3">{{ $kategori->id_kategori }}</td>
                    
                    <!-- ✅ Tampilkan gambar -->
                    <td class="p-3">
                        @if($kategori->gambar_kategori)
                            <img src="{{ asset($kategori->gambar_kategori) }}" 
                                alt="{{ $kategori->nama_kategori }}" 
                                class="h-16 rounded shadow">
                        @else
                            <span class="text-gray-500 italic">Tidak ada</span>
                        @endif
                    </td>

                    <td class="p-3">{{ $kategori->nama_kategori }}</td>
                    <td class="p-3">{{ $kategori->deskripsi }}</td>
                    <td class="p-3 flex gap-2">
                        <a href="{{ route('admin.kategori.edit', $kategori->id_kategori) }}" 
                           class="bg-yellow-500 hover:bg-yellow-600 text-white px-3 py-1 rounded">
                            Edit
                        </a>
                        <form action="{{ route('admin.kategori.destroy', $kategori->id_kategori) }}" 
                              method="POST" onsubmit="return confirm('Yakin hapus kategori ini?')">
                            @csrf
                            @method('DELETE')
                            <button type="submit" 
                                    class="bg-red-600 hover:bg-red-700 text-white px-3 py-1 rounded">
                                Hapus
                            </button>
                        </form>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="5" class="p-3 text-center text-gray-500">Belum ada kategori</td>
                </tr>
            @endforelse
        </tbody>
    </table>
</div>
@endsection
