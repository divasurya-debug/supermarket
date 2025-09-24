@extends('layouts.layout')

@section('title', 'Produk Terbaru')

@section('content')
<div class="p-6 bg-white rounded shadow">
    <h1 class="text-2xl font-bold mb-4">Produk Terbaru</h1>

    @if($produk->count())
        <div class="grid grid-cols-2 md:grid-cols-4 gap-4">
            @foreach($produk as $item)
                <div class="border p-4 rounded text-center bg-white shadow hover:shadow-lg transition">
                    
                    {{-- Gambar Produk --}}
                    <img src="{{ $item->gambar ? asset('storage/' . $item->gambar) : asset('images/no-image.png') }}" 
                         alt="Gambar {{ $item->nama_produk }}" 
                         class="mx-auto mb-2 w-32 h-32 object-contain rounded">

                    {{-- Nama Produk --}}
                    <h2 class="font-semibold text-lg text-gray-800 truncate">
                        {{ $item->nama_produk }}
                    </h2>

                    {{-- Harga Produk --}}
                    <p class="text-red-600 font-bold">
                        Rp {{ number_format($item->harga, 0, ',', '.') }}
                    </p>

                    {{-- Tombol Tambah ke Keranjang --}}
                    <form action="{{ route('keranjang.add', $item->id_produk) }}" method="POST">
                        @csrf
                        <button type="submit" 
                                class="bg-green-600 text-white px-4 py-2 rounded mt-3 hover:bg-green-700 transition">
                            + Tambah
                        </button>
                    </form>
                </div>
            @endforeach
        </div>

        {{-- Pagination --}}
        <div class="mt-6">
            {{ $produk->links() }}
        </div>
    @else
        <p class="text-gray-600">Belum ada produk terbaru.</p>
    @endif
</div>
@endsection
