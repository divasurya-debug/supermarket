@extends('layouts.layout')

@section('title', 'Produk Terlaris')

@section('content')
<div class="p-6 bg-white rounded shadow">
    <h1 class="text-2xl font-bold mb-4">Produk Terlaris</h1>

    @if($produk->count())
        <div class="grid grid-cols-2 md:grid-cols-4 gap-4">
            @foreach($produk as $item)
                <div class="border p-4 rounded text-center">
                    {{-- Gambar Produk --}}
                    <img src="{{ $item->gambar ? asset('storage/' . $item->gambar) : asset('images/no-image.png') }}" 
                         alt="{{ $item->nama_produk }}" 
                         class="mx-auto mb-2 w-32 h-32 object-cover rounded">

                    {{-- Nama Produk --}}
                    <h2 class="font-semibold text-lg">{{ $item->nama_produk }}</h2>

                    {{-- Harga Produk --}}
                    <p class="text-red-600 font-bold">
                        Rp {{ number_format($item->harga, 0, ',', '.') }}
                    </p>

                    {{-- Tombol tambah ke keranjang --}}
                    <form action="{{ route('keranjang.add', $item->id_produk) }}" method="POST">
                        @csrf
                        <button type="submit" 
                                class="bg-green-600 text-white px-3 py-1 rounded mt-2 hover:bg-green-700">
                            + Tambah
                        </button>
                    </form>
                </div>
            @endforeach
        </div>

        {{-- Pagination --}}
        <div class="mt-4">
            {{ $produk->links() }}
        </div>
    @else
        <p class="text-gray-600">Belum ada produk terlaris.</p>
    @endif
</div>
@endsection
