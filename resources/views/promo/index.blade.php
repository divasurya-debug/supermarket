@extends('layouts.app')

@section('content')
<div class="container py-4">
    <h4 class="fw-bold mb-4 text-success">Semua Promo</h4>
    <div class="row g-4">
        @forelse($promoDiskon as $promo)
            @php
                $hargaAwal = $promo->product->harga;
                $hargaDiskon = $hargaAwal - ($hargaAwal * $promo->persentase_diskon / 100);
            @endphp
            <div class="col-6 col-sm-4 col-md-3">
                <div class="card h-100 shadow-sm border-0 rounded-4 overflow-hidden text-center p-3 bg-white">
                    <img src="{{ asset($promo->product->gambar) }}" class="mx-auto d-block rounded mb-3" style="max-height: 160px; object-fit: contain;">
                    <div class="card-body p-0">
                        <h6 class="fw-bold text-success mb-2">{{ $promo->product->nama_produk }}</h6>
                        <p class="mb-1 text-muted text-decoration-line-through fs-6">
                            Rp {{ number_format($hargaAwal, 0, ',', '.') }}
                        </p>
                        <p class="fw-bold text-danger fs-5 mb-2">
                            Rp {{ number_format($hargaDiskon, 0, ',', '.') }}
                        </p>
                        <p class="mb-2 text-secondary small">
                            {{ \Carbon\Carbon::parse($promo->tanggal_mulai)->format('d M Y') }} -
                            {{ \Carbon\Carbon::parse($promo->tanggal_akhir)->format('d M Y') }}
                        </p>
                        <span class="badge bg-danger px-3 py-2 shadow-sm rounded-pill fs-6">
                            Diskon {{ $promo->persentase_diskon }}%
                        </span>
                    </div>
                </div>
            </div>
        @empty
            <div class="col-12"><p class="text-muted text-center">Belum ada promo diskon aktif.</p></div>
        @endforelse
    </div>
</div>
@endsection
