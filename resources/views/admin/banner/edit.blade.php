@extends('layouts.admin')

@section('title', 'Edit Banner')

@section('content')
{{-- 
  Pastikan layout utama Anda memiliki latar belakang abu-abu muda (misal: bg-gray-100) 
  agar kartu ini terlihat menonjol.
--}}
<div class="bg-white rounded-xl shadow-lg p-6 md:p-8 max-w-2xl mx-auto">
    
    {{-- Header --}}
    <div class="mb-8">
        <h2 class="text-2xl font-bold text-gray-900">
            Edit Banner
        </h2>
        <p class="text-sm text-gray-500 mt-1">
            Perbarui gambar banner yang sudah ada.
        </p>
    </div>

    {{-- Menampilkan pesan error validasi jika ada --}}
    @if ($errors->any())
        <div class="bg-red-100 border-l-4 border-red-500 text-red-700 p-4 mb-6 rounded-lg" role="alert">
            <p class="font-bold">Terjadi Kesalahan</p>
            <ul class="mt-2 list-disc list-inside text-sm">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('admin.banner.update', $banner->id_banner) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <div class="space-y-6">
            {{-- Bagian Gambar Saat Ini --}}
            <div>
                <label class="block text-sm font-medium text-gray-700 mb-2">
                    Gambar Banner Saat Ini
                </label>
                <div class="mt-1">
                     <img src="{{ asset($banner->gambar) }}" alt="Banner" width="250" class="rounded shadow mb-3">

                </div>
            </div>

            <hr class="border-gray-200">

            {{-- Bagian Upload Gambar Baru --}}
            <div>
                <label for="gambar" class="block text-sm font-medium text-gray-700">
                    Ganti Gambar (Opsional)
                </label>
                <div class="mt-2 flex justify-center items-center px-6 pt-5 pb-6 border-2 border-gray-300 border-dashed rounded-md">
                    <div class="space-y-1 text-center">
                        {{-- Placeholder untuk pratinjau gambar baru --}}
                        <img id="image-preview" src="" alt="Pratinjau Gambar" class="mx-auto h-32 w-auto rounded-md object-cover hidden mb-4">
                        
                        <svg class="mx-auto h-12 w-12 text-gray-400" stroke="currentColor" fill="none" viewBox="0 0 48 48" aria-hidden="true">
                            <path d="M28 8H12a4 4 0 00-4 4v20m32-12v8m0 0v8a4 4 0 01-4 4H12a4 4 0 01-4-4v-4m32-4l-3.172-3.172a4 4 0 00-5.656 0L28 28M8 32l9.172-9.172a4 4 0 015.656 0L28 28m0 0l4 4m4-24h8m-4-4v8" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                        </svg>
                        
                        <div class="flex text-sm text-gray-600">
                            <label for="gambar" class="relative cursor-pointer bg-white rounded-md font-medium text-purple-600 hover:text-purple-500 focus-within:outline-none focus-within:ring-2 focus-within:ring-offset-2 focus-within:ring-purple-500">
                                <span>Unggah file baru</span>
                                <input id="gambar" name="gambar" type="file" class="sr-only" onchange="previewImage(event)">
                            </label>
                            <p class="pl-1">atau seret dan lepas</p>
                        </div>
                        <p class="text-xs text-gray-500">
                            PNG, JPG, GIF hingga 2MB
                        </p>
                        <p class="text-xs text-gray-500 mt-1">
                            Kosongkan jika tidak ingin mengganti gambar.
                        </p>
                    </div>
                </div>
            </div>
        </div>

        {{-- Tombol Aksi --}}
        <div class="mt-8 flex justify-end space-x-3">
            <a href="{{ route('admin.banner.index') }}" class="bg-gray-200 hover:bg-gray-300 text-gray-800 font-bold py-2 px-5 rounded-lg transition-colors duration-200">
                Batal
            </a>
            <button type="submit" class="bg-purple-600 hover:bg-purple-700 text-white font-bold py-2 px-5 rounded-lg transition-colors duration-200">
                Update Banner
            </button>
        </div>
    </form>
</div>

{{-- Script untuk pratinjau gambar --}}
<script>
    function previewImage(event) {
        const reader = new FileReader();
        const imagePreview = document.getElementById('image-preview');
        
        reader.onload = function(){
            if (reader.readyState === 2) {
                imagePreview.src = reader.result;
                imagePreview.classList.remove('hidden'); // Tampilkan elemen img
            }
        }
        
        if (event.target.files[0]) {
            reader.readAsDataURL(event.target.files[0]);
        }
    }
</script>
@endsection
