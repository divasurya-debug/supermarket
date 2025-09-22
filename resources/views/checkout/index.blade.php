@extends('layouts.app')
@section('title', 'Checkout')

@section('content')
<div class="container py-5">
    <h2 class="fw-bold mb-4 text-success">💳 Checkout</h2>

    @if(empty($keranjang))
        <div class="alert alert-info rounded-3 shadow-sm">
            Keranjang kamu kosong. Yuk 
            <a href="{{ route('home') }}" class="text-success fw-bold">belanja dulu</a>!
        </div>
    @else
        <div class="card shadow-sm rounded-4 mb-4">
            <div class="card-body">
                <h5 class="fw-bold mb-3">Ringkasan Pesanan</h5>
                <ul class="list-group mb-3">
                    @foreach($keranjang as $item)
                        <li class="list-group-item d-flex justify-content-between align-items-center">
                            <div>
                                <strong>{{ $item['nama_produk'] }}</strong><br>
                                <small class="text-muted">x {{ $item['jumlah'] ?? 1 }}</small>
                            </div>
                            <span>Rp {{ number_format(($item['harga'] ?? 0) * ($item['jumlah'] ?? 1), 0, ',', '.') }}</span>
                        </li>
                    @endforeach
                </ul>
                <h4 class="fw-bold text-success text-end">
                    Total: Rp {{ number_format($total, 0, ',', '.') }}
                </h4>
            </div>
        </div>

        <div class="text-end">
            <button class="btn btn-lg btn-success rounded-pill shadow">
                Konfirmasi & Bayar
            </button>
        </div>
    @endif
</div>
@endsection
