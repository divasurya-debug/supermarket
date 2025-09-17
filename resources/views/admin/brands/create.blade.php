@extends('layouts.admin')
@section('title', 'Tambah Merek Baru')

@section('content')
<div class="bg-white p-8 rounded-lg shadow-md max-w-lg mx-auto">

    <h2 class="text-2xl font-bold mb-6">Tambah Merek Baru</h2>

    {{-- Flash message sukses --}}
    @if(session('success'))
        <div class="bg-green-100 text-green-700 p-3 rounded mb-4">
            {{ session('success') }}
        </div>
    @endif

    {{-- Flash message error --}}
    @if(session('error'))
        <div class="bg-red-100 text-red-700 p-3 rounded mb-4">
            {{ session('error') }}
        </div>
    @endif

    {{-- Validasi error --}}
    @if($errors->any())
        <div class="bg-red-100 text-red-700 p-3 rounded mb-4">
            <ul class="list-disc pl-5">
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('admin.brands.store') }}" method="POST" enctype="multipart/form-data">
        @csrf

        {{-- Nama Merek --}}
        <div class="mb-4">
            <label for="nama_merek" class="block text-gray-700 font-medium mb-2">Nama Merek</label>
            <input type="text" id="nama_merek" name="nama_merek"
                class="w-full px-4 py-2 border rounded-lg"
                value="{{ old('nama_merek') }}" required>
            @error('nama_merek')
                <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
            @enderror
        </div>

        {{-- Negara Asal --}}
        <div class="mb-4">
            <label for="negara_asal" class="block text-gray-700 font-medium mb-2">Negara Asal</label>
            <input type="text" id="negara_asal" name="negara_asal"
                class="w-full px-4 py-2 border rounded-lg"
                value="{{ old('negara_asal') }}">
            @error('negara_asal')
                <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
            @enderror
        </div>

        {{-- Gambar / Logo --}}
        <div class="mb-6">
            <label for="gambar" class="block text-gray-700 font-medium mb-2">Logo Merek</label>
            <input type="file" id="gambar" name="gambar"
                class="w-full text-gray-700 bg-gray-50 border rounded-lg"
                accept="image/png,image/jpeg,image/jpg">
            @error('gambar')
                <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
            @enderror

            {{-- Preview gambar sebelum upload --}}
            <img id="preview" src="#" alt="Preview Logo" class="mt-2 hidden w-32 h-32 object-contain border rounded" />
        </div>

        {{-- Tombol --}}
        <div class="flex items-center justify-end">
            <a href="{{ route('admin.brands.index') }}" class="text-gray-600 mr-4">Batal</a>
            <button type="submit" class="bg-purple-700 text-white font-bold py-2 px-6 rounded-lg hover:bg-purple-800">
                Simpan
            </button>
        </div>
    </form>
</div>

{{-- Script preview gambar --}}
@section('scripts')
<script>
    const gambarInput = document.getElementById('gambar');
    const preview = document.getElementById('preview');

    gambarInput.addEventListener('change', function() {
        const file = this.files[0];
        if (file) {
            const reader = new FileReader();
            preview.classList.remove('hidden');
            reader.addEventListener('load', function() {
                preview.setAttribute('src', this.result);
            });
            reader.readAsDataURL(file);
        } else {
            preview.setAttribute('src', '#');
            preview.classList.add('hidden');
        }
    });
</script>
@endsection

@endsection
