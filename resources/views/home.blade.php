@extends('layouts.app')

@section('content')

<style>
/* ==== GLOBAL WRAPPER ==== */
.page-wrapper {
    background: linear-gradient(180deg, #f7fff4 0%, #f9fbff 100%);
    min-height: 100vh;
    zoom: 1; /* pastikan tidak memperbesar otomatis */
}

/* ==== CARD ==== */
.card {
    border: none;
    border-radius: 12px;
    background: linear-gradient(180deg, #ffffff 0%, #fbfffb 100%);
    box-shadow: 0 4px 12px rgba(23, 43, 77, 0.06);
    transition: transform .25s ease, box-shadow .25s ease;
}
.card:hover {
    transform: translateY(-4px);
    box-shadow: 0 8px 20px rgba(23, 43, 77, 0.10);
}

/* ==== NAVBAR ==== */
.navbar-custom {
    background: linear-gradient(135deg, #2e7d32 0%, #00796b 100%);
}
.navbar-custom .navbar-brand {
    font-weight: 700;
    font-size: 1.4rem; /* sedikit lebih kecil */
    text-shadow: 0 1px 3px rgba(0, 0, 0, 0.25);
    color: #fff !important;
}
.navbar-custom .navbar-toggler {
    padding: 3px 7px;
    font-size: 0.85rem;
    border: 1px solid rgba(255,255,255,0.5);
}
.navbar-custom .navbar-toggler-icon {
    filter: invert(1);
    width: 18px;
    height: 18px;
}
.navbar-custom .btn-outline-light {
    border: 2px solid #fff;
    font-weight: 600;
    transition: 0.3s;
    font-size: 0.85rem;
}
.navbar-custom .btn-outline-light:hover {
    background: #fff;
    color: #2e7d32 !important;
}
.navbar-custom .btn-light {
    background: #fff;
    font-weight: 600;
    transition: 0.3s;
    font-size: 0.85rem;
}
.navbar-custom .btn-light:hover {
    background: #f1f1f1;
}

/* ==== SEARCH ==== */
.search-box input {
    border-radius: 20px 0 0 20px;
    border: none;
    padding-left: 12px;
    font-size: 0.9rem;
    box-shadow: inset 0 2px 6px rgba(0,0,0,0.1);
}
.search-box .btn-search {
    border-radius: 0 20px 20px 0;
    background: #fff;
    color: #2e7d32;
    font-weight: 600;
    border: none;
    transition: 0.3s;
    font-size: 0.9rem;
}
.search-box .btn-search:hover {
    background: #f1f1f1;
    color: #00796b;
}

/* ==== SECTION TITLES ==== */
h5.fw-bold { color: #2e7d32; font-size: 1.05rem; }
.text-success { color: #2e7d32 !important; }

/* ==== PRODUCT ==== */
.card-img-top { background: transparent; }
.btn-success.rounded-pill {
    background-color: #2e7d32;
    border-color: #2e7d32;
}
.btn-success.rounded-pill:hover {
    background-color: #1f5a22;
    border-color: #1f5a22;
}
.badge.bg-danger {
    background: #d32f2f !important;
    box-shadow: 0 4px 12px rgba(211,47,47,0.12);
}

/* ==== BANNER ==== */
.navbar { margin-bottom: 20px; }

.banner-img {
    width: 100%;
    height: auto;
    max-height: 260px;   /* kecilkan biar tidak zoom */
    object-fit: contain; /* supaya tidak terpotong */
    border-radius: 8px;
    background-color: #fff;
}
@media (max-width:768px) {
    .banner-img {
        max-height: 180px; 
    }
}

/* ==== FOOTER ==== */
.footer-custom {
    background: linear-gradient(135deg, #2e7d32 0%, #05796b 100%);
    color: #ffffff;
    padding-top: 15px;
    padding-bottom: 10px;
    font-size: 0.8rem;
}
.footer-custom h6 {
    font-size: 0.9rem;
    margin-bottom: 6px;
}
.footer-custom p,
.footer-custom a {
    font-size: 0.75rem;
}
.footer-custom .bg-white.bg-opacity-10 {
    background: rgba(255,255,255,0.06) !important;
    padding: 8px;
    border-radius: 8px;
}
.footer-custom .fs-5 { font-size: 1rem !important; }
</style>

<!-- ==== NAVBAR ==== -->
<nav class="navbar navbar-expand-lg sticky-top shadow-sm navbar-custom">
    <div class="container">
        <a class="navbar-brand fw-bold" href="#">
            <i class="bi bi-basket2-fill me-2"></i> KlikSupermarket
        </a>
        <button class="navbar-toggler border-0" type="button" data-bs-toggle="collapse" data-bs-target="#navbarContent">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarContent">
            <form class="d-flex mx-auto my-3 my-lg-0 w-100 w-lg-50 search-box">
                <input class="form-control" type="search" placeholder="🔍 Cari produk favoritmu...">
                <button class="btn btn-search" type="submit">Cari</button>
            </form>
            <div class="d-flex gap-2 mt-3 mt-lg-0 ms-lg-4">
                <a href="#" class="btn btn-outline-light btn-sm rounded-pill px-3 shadow-sm">Masuk</a>
                <a href="#" class="btn btn-light btn-sm rounded-pill px-3 shadow-sm fw-semibold text-success">Daftar</a>
            </div>
        </div>
    </div>
</nav>

<!-- ==== BANNER ==== -->
<div id="carouselPromo" class="carousel slide mb-4" data-bs-ride="carousel">
    <div class="carousel-inner shadow rounded overflow-hidden">
        @foreach($banners as $index => $banner)
            <div class="carousel-item @if($index == 0) active @endif">
                <img src="{{ asset($banner->gambar) }}" 
                     class="d-block w-100 banner-img"
                     alt="Promo {{ $index + 1 }}">
            </div>
        @endforeach
    </div>

    <!-- Tombol Next / Prev -->
    <button class="carousel-control-prev" type="button" data-bs-target="#carouselPromo" data-bs-slide="prev">
        <span class="carousel-control-prev-icon bg-dark rounded-circle p-2"></span>
    </button>
    <button class="carousel-control-next" type="button" data-bs-target="#carouselPromo" data-bs-slide="next">
        <span class="carousel-control-next-icon bg-dark rounded-circle p-2"></span>
    </button>
</div>

<!-- ==== KATEGORI ==== -->
<div class="d-flex justify-content-between align-items-center mb-3">
    <h5 class="fw-bold mb-0">Kategori Belanja</h5>
    <a href="#" class="text-success small fw-semibold">Lihat Semua</a>
</div>
<div class="row g-3 mb-4">
    @foreach($kategori as $cat)
    <div class="col-6 col-sm-4 col-md-3 col-lg-2 text-center">
        <div class="card border-0 shadow-sm h-100 rounded-4">
            <div class="card-body p-3 d-flex flex-column align-items-center justify-content-center">
                <img src="{{ asset($cat->gambar_kategori) }}" class="img-fluid mb-2" style="max-height: 80px; object-fit: contain;">
                <p class="small fw-semibold text-truncate text-success">{{ $cat->nama_kategori }}</p>
            </div>
        </div>
    </div>
    @endforeach
</div>

<!-- ==== PROMO ==== -->
<div class="d-flex justify-content-between align-items-center mb-3">
    <h5 class="fw-bold mb-0">Promo Lainnya</h5>
    <a href="#" class="text-success small fw-semibold">Lihat Semua</a>
</div>
<div class="row g-3 mb-4">
    @forelse($promoDiskon as $promo)
        @php
            $hargaAwal = $promo->product->harga;
            $hargaDiskon = $hargaAwal - ($hargaAwal * $promo->persentase_diskon / 100);
        @endphp
        <div class="col-6 col-sm-4 col-md-3">
            <div class="card h-100 shadow-sm border-0 rounded-4 overflow-hidden text-center p-2 bg-white">
                <img src="{{ asset($promo->product->gambar) }}" class="mx-auto d-block rounded mb-2" style="max-height: 140px; object-fit: contain;">
                <div class="card-body p-0">
                    <h6 class="fw-bold text-success mb-1">{{ $promo->product->nama_produk }}</h6>
                    <p class="mb-1 text-muted text-decoration-line-through fs-6">
                        Rp {{ number_format($hargaAwal, 0, ',', '.') }}
                    </p>
                    <p class="fw-bold text-danger fs-6 mb-1">
                        Rp {{ number_format($hargaDiskon, 0, ',', '.') }}
                    </p>
                    <p class="mb-1 text-secondary small">
                        {{ \Carbon\Carbon::parse($promo->tanggal_mulai)->format('d M Y') }} - 
                        {{ \Carbon\Carbon::parse($promo->tanggal_akhir)->format('d M Y') }}
                    </p>
                    <span class="badge bg-danger px-2 py-1 shadow-sm rounded-pill fs-6">
                        Diskon {{ $promo->persentase_diskon }}%
                    </span>
                </div>
            </div>
        </div>
    @empty
        <div class="col-12"><p class="text-muted text-center">Belum ada promo diskon aktif.</p></div>
    @endforelse
</div>

<!-- ==== PRODUK TERBARU ==== -->
<div class="d-flex justify-content-between align-items-center mb-3">
    <h5 class="fw-bold mb-0">Produk Terbaru</h5>
    <a href="#" class="text-success small fw-semibold">Lihat Semua</a>
</div>
<div class="row g-3 mb-4">
    @foreach($produkTerbaru as $produk)
    <div class="col-6 col-sm-4 col-md-3 col-lg-2">
        <div class="card shadow-sm h-100 rounded-4 bg-white">
            <img src="{{ asset($produk->gambar) }}" class="card-img-top p-2" style="height:130px; object-fit:contain;">
            <div class="card-body p-2 text-center">
                <p class="small fw-semibold mb-1 text-truncate text-success">{{ $produk->nama_produk }}</p>
                <p class="text-danger fw-bold mb-2 fs-6">Rp {{ number_format($produk->harga, 0, ',', '.') }}</p>
                <button class="btn btn-success btn-sm rounded-pill w-100 shadow-sm">+ Tambah</button>
            </div>
        </div>
    </div>
    @endforeach
</div>

<!-- ==== BUAH & SAYUR ==== -->
<div class="d-flex justify-content-between align-items-center mb-3">
    <h5 class="fw-bold mb-0">Buah & Sayur</h5>
    <a href="#" class="text-success small fw-semibold">Lihat Semua</a>
</div>
<div class="row g-3 mb-4">
    @foreach($buahSayur as $produk)
    <div class="col-6 col-sm-4 col-md-3 col-lg-2">
        <div class="card shadow-sm h-100 rounded-4 bg-white">
            <img src="{{ asset($produk->gambar) }}" class="card-img-top p-2" style="height:130px; object-fit:contain;">
            <div class="card-body p-2 text-center">
                <p class="small fw-semibold mb-1 text-truncate text-success">{{ $produk->nama_produk }}</p>
                <p class="text-danger fw-bold mb-2 fs-6">Rp {{ number_format($produk->harga, 0, ',', '.') }}</p>
                <button class="btn btn-success btn-sm rounded-pill w-100 shadow-sm">+ Tambah</button>
            </div>
        </div>
    </div>
    @endforeach
</div>

<!-- ==== PRODUK TERLARIS ==== -->
<div class="d-flex justify-content-between align-items-center mb-3">
    <h5 class="fw-bold mb-0">Produk Terlaris</h5>
    <a href="#" class="text-success small fw-semibold">Lihat Semua</a>
</div>
<div class="row g-3 mb-4">
    @foreach($produkTerlaris as $produk)
    <div class="col-6 col-sm-4 col-md-3 col-lg-2">
        <div class="card shadow-sm h-100 rounded-4 bg-white">
            <img src="{{ asset($produk->gambar) }}" class="card-img-top p-2" style="height:130px; object-fit:contain;">
            <div class="card-body p-2 text-center">
                <p class="small fw-semibold mb-1 text-truncate text-success">{{ $produk->nama_produk }}</p>
                <p class="text-danger fw-bold mb-2 fs-6">Rp {{ number_format($produk->harga, 0, ',', '.') }}</p>
                <button class="btn btn-success btn-sm rounded-pill w-100 shadow-sm">+ Tambah</button>
            </div>
        </div>
    </div>
    @endforeach
</div>
</div>

<!-- ==== FOOTER ==== -->
<footer class="footer-custom">
    <div class="container">
        <div class="bg-white bg-opacity-10 text-center mb-2 p-2 rounded">
            <h6 class="fw-bold mb-1 fs-6">Dapatkan Promo Terbaru di KlikSupermarket</h6>
            <p class="mb-0 small">Daftar sekarang dan nikmati diskon hingga 50%</p>
        </div>
        <div class="row gy-2">
            <div class="col-md-6">
                <h6 class="fw-bold">Kontak Kami</h6>
                <p class="mb-1">Jl. Raya Supermarket No. 123, Jakarta</p>
                <p class="mb-1">Email: info@kliksupermarket.com</p>
                <p class="mb-0">Telepon: (021) 1234 5678</p>
            </div>
            <div class="col-md-6 text-md-end">
                <h6 class="fw-bold">Ikuti Kami</h6>
                <a href="#" class="text-white me-2 fs-5"><i class="bi bi-facebook"></i></a>
                <a href="#" class="text-white me-2 fs-5"><i class="bi bi-twitter"></i></a>
                <a href="#" class="text-white fs-5"><i class="bi bi-instagram"></i></a>
            </div>
        </div>
        <hr class="my-2 border-white opacity-25" />
        <p class="mb-0 text-center small">&copy; 2025 KlikSupermarket. All rights reserved.</p>
    </div>
</footer>
@endsection
