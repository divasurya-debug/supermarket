@extends('layouts.admin')

@section('title', 'Edit Produk')

@section('content')
  <div class="bg-white p-8 rounded-lg shadow-md">
    <h2 class="text-2xl font-bold mb-6">Edit Produk: {{ $produk->nama_produk }}</h2>

    {{-- Form mengarah ke route 'admin.produk.update' dengan method PUT --}}
    <form action="{{ route('admin.produk.update', $produk->id_produk) }}" method="POST" enctype="multipart/form-data">
      @csrf
      @method('PUT') {{-- Method spoofing untuk request UPDATE --}}

      <div class="mb-4">
        <label for="nama_produk" class="block text-gray-700 font-medium mb-2">Nama Produk</label>
        {{-- Mengisi value dengan data lama atau data dari database --}}
        <input type="text" id="nama_produk" name="nama_produk" class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-purple-600" value="{{ old('nama_produk', $produk->nama_produk) }}" required>
        @error('nama_produk')
          <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
        @enderror
      </div>

      <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-4">
        <div>
          <label for="id_brands" class="block text-gray-700 font-medium mb-2">Brand</label>
          <select id="id_brands" name="id_brands" class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-purple-600" required>
            <option value="">Pilih Brand</option>
            @foreach ($brands as $brand)
              {{-- Memberi atribut 'selected' jika ID brand cocok --}}
              <option value="{{ $brand->id_brands }}" {{ old('id_brands', $produk->id_brands) == $brand->id_brands ? 'selected' : '' }}>
                {{ $brand->nama_merek }}
              </option>
            @endforeach
          </select>
          @error('id_brands')
            <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
          @enderror
        </div>
        <div>
          <label for="id_kategori" class="block text-gray-700 font-medium mb-2">Kategori</label>
          <select id="id_kategori" name="id_kategori" class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-purple-600" required>
            <option value="">Pilih Kategori</option>
            @foreach ($kategori as $item)
              <option value="{{ $item->id_kategori }}" {{ old('id_kategori', $produk->id_kategori) == $item->id_kategori ? 'selected' : '' }}>
                {{ $item->nama_kategori }}
              </option>
            @endforeach
          </select>
          @error('id_kategori')
            <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
          @enderror
        </div>
      </div>

      <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-4">
        <div>
          <label for="harga" class="block text-gray-700 font-medium mb-2">Harga</label>
          <input type="number" id="harga" name="harga" class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-purple-600" value="{{ old('harga', $produk->harga) }}" required>
          @error('harga')
            <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
          @enderror
        </div>
        <div>
          <label for="stok" class="block text-gray-700 font-medium mb-2">Stok</label>
          <input type="number" id="stok" name="stok" class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-purple-600" value="{{ old('stok', $produk->stok) }}" required>
          @error('stok')
            <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
          @enderror
        </div>
      </div>
      
      <div class="mb-4">
        <label for="deskripsi" class="block text-gray-700 font-medium mb-2">Deskripsi</label>
        <textarea id="deskripsi" name="deskripsi" rows="4" class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-purple-600">{{ old('deskripsi', $produk->deskripsi) }}</textarea>
        @error('deskripsi')
          <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
        @enderror
      </div>
      
      <div class="mb-6">
        <label for="gambar" class="block text-gray-700 font-medium mb-2">Ganti Gambar Produk</label>
        <div class="flex items-center space-x-4">
            @if ($produk->gambar)
                <img src="{{ asset('storage/' . $produk->gambar) }}" alt="Gambar saat ini" class="w-24 h-24 rounded-lg object-cover">
            @endif
            <div>
                <input type="file" id="gambar" name="gambar" class="w-full text-gray-700 bg-gray-50 border rounded-lg cursor-pointer focus:outline-none">
                <p class="mt-1 text-sm text-gray-500">Kosongkan jika tidak ingin mengganti gambar.</p>
            </div>
        </div>
        @error('gambar')
          <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
        @enderror
      </div>

      <div class="flex items-center justify-end">
        <a href="{{ route('admin.produk.index') }}" class="text-gray-600 hover:text-gray-900 mr-4">Batal</a>
        <button type="submit" class="bg-purple-700 text-white font-bold py-2 px-6 rounded-lg hover:bg-purple-800">
          Update Produk
        </button>
      </div>
    </form>
  </div>
@endsection