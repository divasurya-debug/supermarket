@extends('layouts.app')

@section('content')
<div class="container">
    <h2 class="mb-4">Produk Terbaru</h2>

    <div class="row g-4">
        @foreach($produk as $item)
            <div class="col-md-3 col-sm-6">
                <div class="card h-100 shadow-sm">
                    {{-- gambar produk --}}
                    <img src="{{ $item->gambar ? asset('storage/'.$item->gambar) : asset('images/no-image.png') }}" 
                         class="card-img-top" 
                         alt="{{ $item->nama_produk }}">

                    <div class="card-body text-center">
                        {{-- nama produk --}}
                        <h6 class="card-title">{{ $item->nama_produk }}</h6>

                        {{-- harga --}}
                        <p class="text-danger fw-bold">Rp {{ number_format($item->harga, 0, ',', '.') }}</p>

                        {{-- tombol tambah ke keranjang --}}
                        <form action="{{ route('keranjang.tambah', $item->id_produk) }}" method="POST">
                            @csrf
                            <button type="submit" class="btn btn-success btn-sm">+ Tambah</button>
                        </form>
                    </div>
                </div>
            </div>
        @endforeach
    </div>

    {{-- pagination --}}
    <div class="mt-4">
        {{ $produk->links() }}
    </div>
</div>
@endsection
