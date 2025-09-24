@extends('layouts.app')

@section('content')
<div class="container py-4">
    <h4 class="fw-bold mb-4 text-success">Produk Terbaru</h4>
    <div class="row g-4">
        @foreach($produk as $p)
            <div class="col-md-3">
                <div class="card">
                    <img src="{{ asset('storage/'.$p->gambar) }}" class="card-img-top" alt="{{ $p->nama }}">
                    <div class="card-body">
                        <h5 class="card-title">{{ $p->nama }}</h5>
                        <p class="card-text">Rp {{ number_format($p->harga, 0, ',', '.') }}</p>
                        <a href="{{ route('produk.show', $p->id) }}" class="btn btn-success btn-sm">Lihat Detail</a>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
</div>
@endsection
