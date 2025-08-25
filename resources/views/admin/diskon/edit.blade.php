@extends('layouts.admin')
@section('title', 'Edit Diskon')
@section('content')
  <div class="bg-white p-8 rounded-lg shadow-md">
    <h2 class="text-2xl font-bold mb-6">Edit Diskon</h2>
    <form action="{{ route('admin.diskon.update', $discount->id_diskon) }}" method="POST">
      @csrf
      @method('PUT')
      <div class="mb-4">
        <label for="id_produk" class="block text-gray-700 font-medium mb-2">Pilih Produk</label>
        <select id="id_produk" name="id_produk" class="w-full px-4 py-2 border rounded-lg" required>
            <option value="">-- Pilih Produk yang Akan Didiskon --</option>
            @foreach($products as $product)
                <option value="{{ $product->id_produk }}" {{ old('id_produk', $discount->id_produk) == $product->id_produk ? 'selected' : '' }}>
                    {{ $product->nama_produk }}
                </option>
            @endforeach
        </select>
        @error('id_produk') <p class="text-red-500 text-xs mt-1">{{ $message }}</p> @enderror
      </div>
      <div class="mb-4">
        <label for="persentase_diskon" class="block text-gray-700 font-medium mb-2">Persentase Diskon (%)</label>
        <input type="number" id="persentase_diskon" name="persentase_diskon" class="w-full px-4 py-2 border rounded-lg" value="{{ old('persentase_diskon', $discount->persentase_diskon) }}" placeholder="Contoh: 20" required>
        @error('persentase_diskon') <p class="text-red-500 text-xs mt-1">{{ $message }}</p> @enderror
      </div>
      <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-4">
        <div>
            <label for="tanggal_mulai" class="block text-gray-700 font-medium mb-2">Tanggal Mulai</label>
            <input type="date" id="tanggal_mulai" name="tanggal_mulai" class="w-full px-4 py-2 border rounded-lg" value="{{ old('tanggal_mulai', $discount->tanggal_mulai->format('Y-m-d')) }}" required>
            @error('tanggal_mulai') <p class="text-red-500 text-xs mt-1">{{ $message }}</p> @enderror
        </div>
        <div>
            <label for="tanggal_akhir" class="block text-gray-700 font-medium mb-2">Tanggal Akhir</label>
            <input type="date" id="tanggal_akhir" name="tanggal_akhir" class="w-full px-4 py-2 border rounded-lg" value="{{ old('tanggal_akhir', $discount->tanggal_akhir->format('Y-m-d')) }}" required>
            @error('tanggal_akhir') <p class="text-red-500 text-xs mt-1">{{ $message }}</p> @enderror
        </div>
      </div>
      <div class="flex items-center justify-end mt-6">
        <a href="{{ route('admin.diskon.index') }}" class="text-gray-600 mr-4">Batal</a>
        <button type="submit" class="bg-purple-700 text-white font-bold py-2 px-6 rounded-lg">Update</button>
      </div>
    </form>
  </div>
@endsection