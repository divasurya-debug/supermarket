@extends('layouts.app')

@section('content')
<div class="container">
<!-- Banner -->
<div id="carouselPromo" class="carousel slide mb-5" data-bs-ride="carousel">
    <div class="carousel-inner rounded shadow overflow-hidden" style="height: 400px;">
        @foreach($banners as $index => $banner)
            <div class="carousel-item @if($index == 0) active @endif">
                <img src="{{ asset($banner->gambar) }}" class="d-block w-100 h-100 object-fit-cover" alt="Promo {{ $index + 1 }}">
            </div>
        @endforeach
    </div>
    <button class="carousel-control-prev" type="button" data-bs-target="#carouselPromo" data-bs-slide="prev">
        <span class="carousel-control-prev-icon"></span>
    </button>
    <button class="carousel-control-next" type="button" data-bs-target="#carouselPromo" data-bs-slide="next">
        <span class="carousel-control-next-icon"></span>
    </button>
</div>


<!-- Kategori Belanja -->
<div class="d-flex justify-content-between align-items-center mb-3">
    <h5 class="fw-bold">Kategori Belanja</h5>
    <a href="#" class="text-primary">Lihat Semua</a>
</div>
<div class="row g-3 mb-4">
    @foreach($kategori as $cat)
    <div class="col-6 col-md-2 text-center">
        <div class="card border-0 shadow-sm h-100">
            <div class="card-body">
                <img src="{{ asset($cat->gambar_kategori) }}"
                    class="img-fluid mb-2"
                    alt="{{ $cat->nama_kategori }}">
                <p class="small mb-0">{{ $cat->nama_kategori }}</p>
            </div>
        </div>
    </div>
    @endforeach
</div>

    <!-- Promo Lainnya -->
    <div class="d-flex justify-content-between align-items-center mb-3">
        <h5 class="fw-bold">Promo Lainnya</h5>
        <a href="#" class="text-primary">Lihat Semua</a>
    </div>
    <div class="row g-3 mb-5">
        <div class="col-md-4">
            <img src="/images/promo1.jpg" class="img-fluid rounded shadow" alt="Promo 1">
        </div>
        <div class="col-md-4">
            <img src="/images/promo2.jpg" class="img-fluid rounded shadow" alt="Promo 2">
        </div>
        <div class="col-md-4">
            <img src="/images/promo3.jpg" class="img-fluid rounded shadow" alt="Promo 3">
        </div>
    </div>

<div class="d-flex justify-content-between align-items-center mb-3">
    <h5 class="fw-bold">Produk Terbaru</h5>
    <a href="#" class="text-primary">Lihat Semua</a>
</div>
<div class="row g-3 mb-5">
    @foreach($produkTerbaru as $produk)
    <div class="col-6 col-md-2">
        <div class="card shadow-sm h-100">
            <img src="/images/{{ $produk->gambar }}" class="card-img-top p-2" alt="{{ $produk->nama_produk }}">
            <div class="card-body p-2 text-center">
                <p class="small fw-bold mb-1">{{ $produk->nama_produk }}</p>
                <p class="text-danger fw-bold mb-2">Rp {{ number_format($produk->harga, 0, ',', '.') }}</p>
                <button class="btn btn-primary btn-sm w-100">+ Tambah</button>
            </div>
        </div>
    </div>
    @endforeach
</div>

<div class="d-flex justify-content-between align-items-center mb-3">
    <h5 class="fw-bold">Buah & Sayur</h5>
    <a href="#" class="text-primary">Lihat Semua</a>
</div>
<div class="row g-3 mb-5">
    @foreach($buahSayur as $produk)
    <div class="col-6 col-md-2">
        <div class="card shadow-sm h-100">
            <img src="/images/{{ $produk->gambar }}" class="card-img-top p-2" alt="{{ $produk->nama_produk }}">
            <div class="card-body p-2 text-center">
                <p class="small fw-bold mb-1">{{ $produk->nama_produk }}</p>
                <p class="text-danger fw-bold mb-2">Rp {{ number_format($produk->harga, 0, ',', '.') }}</p>
                <button class="btn btn-primary btn-sm w-100">+ Tambah</button>
            </div>
        </div>
    </div>
    @endforeach
</div>

<div class="d-flex justify-content-between align-items-center mb-3">
    <h5 class="fw-bold">Produk Terlaris</h5>
    <a href="#" class="text-primary">Lihat Semua</a>
</div>
<div class="row g-3 mb-5">
    @foreach($produkTerlaris as $produk)
    <div class="col-6 col-md-2">
        <div class="card shadow-sm h-100">
            <img src="/images/{{ $produk->gambar }}" class="card-img-top p-2" alt="{{ $produk->nama_produk }}">
            <div class="card-body p-2 text-center">
                <p class="small fw-bold mb-1">{{ $produk->nama_produk }}</p>
                <p class="text-danger fw-bold mb-2">Rp {{ number_format($produk->harga, 0, ',', '.') }}</p>
                <button class="btn btn-primary btn-sm w-100">+ Tambah</button>
            </div>
        </div>
    </div>
    @endforeach
</div>
<!-- Footer -->
<footer class="bg-light border-top mt-5 pt-5">
    <div class="container">

        <!-- Aplikasi -->
        <div class="bg-warning rounded p-4 text-center mb-5">
            <h5 class="fw-bold text-white">Nikmati pengalaman terbaik belanja kebutuhanmu lewat aplikasi Klik Indomaret</h5>
            <div class="mt-3">
                <a href="#"><img src="/images/google-play.png" alt="Google Play" height="40" class="me-2"></a>
                <a href="#"><img src="/images/app-store.png" alt="App Store" height="40"></a>
            </div>
        </div>

        <div class="row text-center text-md-start">
            <!-- Kolom 1 -->
            <div class="col-md-3 mb-4">
                <h6 class="fw-bold">Klik Indomaret</h6>
                <ul class="list-unstyled small">
                    <li><a href="#" class="text-muted text-decoration-none">Food</a></li>
                    <li><a href="#" class="text-muted text-decoration-none">Virtual</a></li>
                    <li><a href="#" class="text-muted text-decoration-none">Travel</a></li>
                    <li><a href="#" class="text-muted text-decoration-none">Tiket Wahana</a></li>
                    <li><a href="#" class="text-muted text-decoration-none">Tentang Klik Indomaret</a></li>
                    <li><a href="#" class="text-muted text-decoration-none">Blog Klik Indomaret</a></li>
                </ul>
            </div>

            <!-- Kolom 2 -->
            <div class="col-md-3 mb-4">
                <h6 class="fw-bold">Belanja</h6>
                <ul class="list-unstyled small">
                    <li><a href="#" class="text-muted text-decoration-none">Kebijakan</a></li>
                    <li><a href="#" class="text-muted text-decoration-none">Kebijakan Refund</a></li>
                    <li><a href="#" class="text-muted text-decoration-none">Cara Berbelanja</a></li>
                    <li><a href="#" class="text-muted text-decoration-none">Pertanyaan Umum</a></li>
                    <li><a href="#" class="text-muted text-decoration-none">Produk Virtual</a></li>
                    <li><a href="#" class="text-muted text-decoration-none">Produk Travel</a></li>
                    <li><a href="#" class="text-muted text-decoration-none">Saldo Klik</a></li>
                    <li><a href="#" class="text-muted text-decoration-none">Petunjuk Pembayaran</a></li>
                    <li><a href="#" class="text-muted text-decoration-none">i.saku & Poinku</a></li>
                </ul>
            </div>

            <!-- Kolom 3 -->
            <div class="col-md-3 mb-4">
                <h6 class="fw-bold">Keamanan Belanja</h6>
                <img src="/images/verisign.png" alt="VeriSign Secured" class="img-fluid" style="max-height: 60px;">
            </div>

            <!-- Kolom 4 -->
            <div class="col-md-3 mb-4">
                <h6 class="fw-bold">Ikuti Kami</h6>
                <div class="d-flex justify-content-center justify-content-md-start gap-2">
                    <a href="#"><img src="/images/icon-fb.png" width="24" alt="Facebook"></a>
                    <a href="#"><img src="/images/icon-ig.png" width="24" alt="Instagram"></a>
                    <a href="#"><img src="/images/icon-tt.png" width="24" alt="TikTok"></a>
                </div>
            </div>
        </div>

        <hr>
        <p class="text-center text-muted small mb-0">&copy; {{ date('Y') }} KlikSupermarket. All rights reserved.</p>
    </div>
</footer>

@endsection
