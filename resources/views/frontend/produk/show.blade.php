@extends('layouts.app')

@section('title', $produk->nama_produk)

@section('content')
<div class="container py-5">
    <div class="row">
        <!-- Gambar Produk -->
        <div class="col-md-6 mb-4 text-center">
            @if ($produk->gambar)
                  <img src="{{ asset($produk->gambar) }}" 
                         class="card-img-top p-3" 
                         style="height:140px; object-fit:contain;">
            @else
                <img src="{{ asset($produk->gambar) }}" 
                         class="card-img-top p-3" 
                         style="height:140px; object-fit:contain;"
                     alt="Tidak ada gambar">
            @endif
        </div>

        <!-- Detail Produk -->
        <div class="col-md-6">
            <h2 class="fw-bold text-success">{{ $produk->nama_produk }}</h2>
            <p class="text-danger fs-4 fw-bold mb-4">
                Rp {{ number_format($produk->harga, 0, ',', '.') }}
            </p>

            <!-- Form Tambah ke Keranjang -->
            <form action="{{ route('keranjang.add', $produk->id_produk) }}" method="POST" class="mb-3">
                @csrf
                <div class="input-group" style="max-width: 220px;">
                    <input type="number" name="jumlah" value="1" min="1" class="form-control">
                    <button type="submit" class="btn btn-success">
                        <i class="bi bi-cart-plus"></i> Tambah
                    </button>
                </div>
            </form>

            <hr class="my-4">

            <!-- Deskripsi Produk -->
            <h5 class="fw-bold">Deskripsi Produk</h5>
            <p class="text-muted">
                {!! nl2br(e($produk->deskripsi)) ?: 'Belum ada deskripsi untuk produk ini.' !!}
            </p>
        </div>
    </div>
</div>
