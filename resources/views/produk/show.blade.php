@extends('layouts.app')

@section('content')
<div class="container py-4">
    <div class="row">
        <div class="col-md-6">
            <img src="{{ asset('storage/' . $produk->gambar) }}" class="img-fluid rounded" alt="{{ $produk->nama_produk }}">
        </div>
        <div class="col-md-6">
            <h2>{{ $produk->nama_produk }}</h2>
            <p class="text-danger fs-4 fw-bold">Rp {{ number_format($produk->harga, 0, ',', '.') }}</p>

            <form action="{{ route('keranjang.add', $produk->id_produk) }}" method="POST">
                @csrf
                <button type="submit" class="btn btn-primary btn-lg">
                    <i class="bi bi-cart-plus"></i> Keranjang
                </button>
            </form>

            <hr>
            <h5>Deskripsi Produk</h5>
            <p>{{ $produk->deskripsi }}</p>
        </div>
    </div>
</div>
@endsection
