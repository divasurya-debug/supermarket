@extends('layouts.app')

@section('content')
<div class="container py-4">
    <div class="row">
        <!-- Gambar Produk -->
        <div class="col-md-6 mb-4">
            <img src="{{ asset('storage/' . $produk->gambar) }}" 
                 class="img-fluid rounded shadow" 
                 alt="{{ $produk->nama_produk }}">
        </div>

        <!-- Detail Produk -->
        <div class="col-md-6">
            <h2 class="fw-bold">{{ $produk->nama_produk }}</h2>
            <p class="text-danger fs-4 fw-bold">
                Rp {{ number_format($produk->harga, 0, ',', '.') }}
            </p>

            <!-- Form Tambah ke Keranjang -->
            <form action="{{ route('keranjang.add', $produk->id_produk) }}" method="POST" class="mb-3">
                @csrf
                <div class="input-group" style="max-width: 200px;">
                    <input type="number" name="jumlah" value="1" min="1" class="form-control">
                    <button type="submit" class="btn btn-primary">
                        <i class="bi bi-cart-plus"></i> Keranjang
                    </button>
                </div>
            </form>

            <hr>

            <!-- Deskripsi Produk -->
            <h5>Deskripsi Produk</h5>
            <p>{!! nl2br(e($produk->deskripsi)) !!}</p>
        </div>
    </div>
</div>
@endsection
