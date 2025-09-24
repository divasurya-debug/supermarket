@extends('layouts.app')

@section('content')
<div class="container">
    <h2 class="mb-4">Produk Terbaru</h2>

    <div class="row g-4">
        @foreach($produk as $produk)
            <div class="col-md-3 col-sm-6">
                <div class="card h-100 shadow-sm">
                    {{-- gambar produk --}}
                    <img src="{{ asset('storage/'.$produk->gambar) }}" 
                         class="card-img-top" 
                         alt="{{ $produk->nama }}">

                    <div class="card-body text-center">
                        {{-- nama produk --}}
                        <h6 class="card-title">{{ $produk->nama }}</h6>

                        {{-- harga --}}
                        <p class="text-danger fw-bold">Rp {{ number_format($produk->harga, 0, ',', '.') }}</p>

                        {{-- tombol tambah ke keranjang --}}
                        <form action="{{ route('keranjang.tambah', $produk->id) }}" method="POST">
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
