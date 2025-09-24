@extends('layouts.layout')

@section('title', 'Produk Terbaru')

@section('content')
<div class="p-6 bg-white rounded shadow">
    <h1 class="text-2xl font-bold mb-4">Produk Terbaru</h1>

    @if($produk->count())
        <div class="grid grid-cols-2 md:grid-cols-4 gap-4">
            @foreach($produk as $item)
                <div class="border p-4 rounded text-center">
                    <img src="{{ $item->gambar }}" 
                         alt="{{ $item->nama }}" 
                         class="mx-auto mb-2 w-32 h-32 object-cover">
                    <h2 class="font-semibold">{{ $item->nama }}</h2>
                    <p class="text-red-600">Rp {{ number_format($item->harga, 0, ',', '.') }}</p>

                    {{-- Tombol tambah ke keranjang --}}
                    <form action="{{ route('keranjang.tambah', $item->id) }}" method="POST">
                        @csrf
                        <button type="submit" class="bg-green-600 text-white px-3 py-1 rounded mt-2 hover:bg-green-700">
                            + Tambah
                        </button>
                    </form>
                </div>
            @endforeach
        </div>

        <div class="mt-4">
            {{ $produk->links() }}
        </div>
    @else
        <p>Belum ada produk terbaru.</p>
    @endif
</div>
@endsection
