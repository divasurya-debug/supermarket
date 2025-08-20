@extends('layouts.app')

@section('content')
<div class="container my-4">
    <div class="row">
        <!-- Gambar -->
        <div class="col-md-5">
            <img src="/images/{{ $produk['gambar'] }}" class="img-fluid border rounded shadow-sm mb-3" alt="{{ $produk['nama'] }}">

            <!-- Thumbnail -->
            <div class="d-flex gap-2">
                <img src="/images/{{ $produk['gambar'] }}" class="img-thumbnail" style="width: 70px;">
            </div>
        </div>

        <!-- Detail Produk -->
        <div class="col-md-7">
            <h4 class="fw-bold">{{ $produk['nama'] }}</h4>
            <h5 class="text-danger fw-semibold mb-3">{{ $produk['harga'] }}</h5>

            <button class="btn btn-primary mb-4">
                <i class="bi bi-cart-plus me-1"></i> Keranjang
            </button>

            <div>
                <h6 class="fw-bold">Deskripsi Produk</h6>
                <p class="small text-muted">{{ $produk['deskripsi'] }}</p>
            </div>
        </div>
    </div>
</div>
@endsection
