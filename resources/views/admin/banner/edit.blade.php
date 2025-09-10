@extends('layouts.admin')

@section('title', 'Edit Banner - Admin Supermarket')

@section('content')
  <h2 class="text-2xl font-bold mb-6">Edit Banner</h2>

  <form action="{{ route('admin.banner.update', $banner->id) }}" 
        method="POST" 
        enctype="multipart/form-data" 
        class="bg-white shadow-md rounded-lg p-6">
    @csrf
    @method('PUT')

    <div class="mb-4">
      <label class="block text-sm font-medium text-gray-700 mb-2">Gambar Saat Ini</label>
      @if($banner->image)
        <img src="{{ asset('storage/'.$banner->image) }}" 
             alt="Banner" 
             class="h-20 w-40 object-cover rounded mb-4">
      @else
        <p class="text-gray-500">Tidak ada gambar</p>
      @endif
    </div>

    <div class="mb-4">
      <label for="image" class="block text-sm font-medium text-gray-700 mb-2">
        Upload Gambar Baru (Opsional)
      </label>
      <input type="file" name="image" id="image" accept="image/*" class="border rounded px-3 py-2 w-full">
      @error('image')
        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
      @enderror
    </div>

    <div class="flex justify-end">
      <a href="{{ route('admin.banner.index') }}" 
         class="bg-gray-300 text-gray-700 px-4 py-2 rounded mr-2">
        Batal
      </a>
      <button type="submit" 
              class="bg-purple-700 text-white px-4 py-2 rounded hover:bg-purple-800">
        Update
      </button>
    </div>
  </form>
@endsection
