@extends('layouts.app')

@section('content')
<div class="container py-4">
    <h4 class="mb-4">Hasil pencarian untuk: <span class="text-success">"{{ $query }}"</span></h4>

    @if($produk->count() > 0)
        <h5 class="fw-bold mb-3">Produk</h5>
        <div class="row g-4 mb-5">
            @foreach($produk as $p)
            <div class="col-6 col-sm-4 col-md-3 col-lg-2">
                <div class="card shadow-sm h-100 rounded-4">
                    <img src="{{ asset($p->gambar) }}" class="card-img-top p-3" style="height:140px; object-fit:contain;">
                    <div class="card-body p-3 text-center">
                        <p class="small fw-semibold text-success text-truncate">{{ $p->nama_produk }}</p>
                        <p class="fw-bold text-danger">Rp {{ number_format($p->harga, 0, ',', '.') }}</p>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    @endif

    @if($kategori->count() > 0)
        <h5 class="fw-bold mb-3">Kategori</h5>
        <div class="row g-4">
            @foreach($kategori as $k)
            <div class="col-6 col-sm-4 col-md-3 col-lg-2">
                <div class="card border-0 shadow-sm rounded-4 text-center p-3">
                    <img src="{{ asset($k->gambar_kategori) }}" class="img-fluid mb-2" style="max-height:90px; object-fit:contain;">
                    <p class="fw-semibold text-success">{{ $k->nama_kategori }}</p>
                </div>
            </div>
            @endforeach
        </div>
    @endif

    @if($produk->count() === 0 && $kategori->count() === 0)
        <p class="text-muted">Tidak ada hasil untuk pencarian ini.</p>
    @endif
</div>
@endsection
