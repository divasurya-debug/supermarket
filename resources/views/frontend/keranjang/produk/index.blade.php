@extends('layouts.app')

@section('content')
<div class="container py-5">
    <h2 class="mb-4">Daftar Produk Supermarket</h2>
    <div class="row">
        @foreach($produk as $item)
            <div class="col-md-3 mb-4">
                <div class="card shadow-sm">
                    <img src="{{ asset('images/'.$item->gambar) }}" class="card-img-top" alt="{{ $item->nama_produk }}">
                    <div class="card-body">
                        <h5 class="card-title">{{ $item->nama_produk }}</h5>
                        <p class="card-text">Rp {{ number_format($item->harga, 0, ',', '.') }}</p>
                        <small class="text-muted">Brand: {{ $item->nama_merek }}</small><br>
                        <small class="text-muted">Kategori: {{ $item->nama_kategori }}</small>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
</div>
@endsection
