@extends('layouts.app')

@section('content')

<div class="page-wrapper">

<style>
/* ==== GLOBAL WRAPPER ==== */
.page-wrapper {
    background: linear-gradient(180deg, #f7fff4 0%, #f9fbff 100%);
    min-height: 100vh;
}

/* ==== CARD ==== */
.card {
    border: none;
    border-radius: 14px;
    background: linear-gradient(180deg, #ffffff 0%, #fbfffb 100%);
    box-shadow: 0 6px 18px rgba(23, 43, 77, 0.06);
    transition: transform .25s ease, box-shadow .25s ease;
}
.card:hover {
    transform: translateY(-6px);
    box-shadow: 0 12px 30px rgba(23, 43, 77, 0.10);
}

/* ==== NAVBAR ==== */
.navbar-custom {
    background: linear-gradient(135deg, #2e7d32 0%, #00796b 100%);
}
.navbar-custom .navbar-brand {
    font-weight: 800;
    text-shadow: 0 2px 5px rgba(0, 0, 0, 0.25);
    color: #fff !important;
}
.navbar-custom .navbar-toggler {
    padding: 4px 8px;
    font-size: 0.9rem;
    border: 1px solid rgba(255,255,255,0.5);
}
.navbar-custom .navbar-toggler-icon {
    filter: invert(1);
    width: 20px;
    height: 20px;
}
.navbar-custom .btn-outline-light {
    border: 2px solid #fff;
    font-weight: 600;
    transition: 0.3s;
}
.navbar-custom .btn-outline-light:hover {
    background: #fff;
    color: #2e7d32 !important;
}
.navbar-custom .btn-light {
    background: #fff;
    font-weight: 600;
    transition: 0.3s;
}
.navbar-custom .btn-light:hover {
    background: #f1f1f1;
}


/* ==== SEARCH ==== */
.search-box input {
    border-radius: 25px 0 0 25px;
    border: none;
    padding-left: 15px;
    box-shadow: inset 0 2px 6px rgba(0,0,0,0.1);
}
.search-box .btn-search {
    border-radius: 0 25px 25px 0;
    background: #fff;
    color: #2e7d32;
    font-weight: 600;
    border: none;
    transition: 0.3s;
}
.search-box .btn-search:hover {
    background: #f1f1f1;
    color: #00796b;
}

/* ==== SECTION TITLES ==== */
h5.fw-bold { color: #2e7d32; }
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

/* ==== FOOTER ==== */
.footer-custom {
    background: linear-gradient(135deg, #2e7d32 0%, #05796b 100%);
    color: #ffffff;
    padding-top: 18px;
    padding-bottom: 12px;
    font-size: 0.85rem;
}
.footer-custom h6 {
    font-size: 0.95rem;
    margin-bottom: 6px;
}
.footer-custom p,
.footer-custom a {
    font-size: 0.8rem;
}
.footer-custom .bg-white.bg-opacity-10 {
    background: rgba(255,255,255,0.06) !important;
    padding: 10px;
    border-radius: 8px;
}
.footer-custom .fs-5 { font-size: 1.1rem !important; }

@media (max-width: 576px) {
    .footer-custom {
        padding-top: 12px;
        padding-bottom: 8px;
        font-size: 0.75rem;
    }
    .footer-custom h6 { font-size: 0.85rem; }
    .footer-custom p,
    .footer-custom a { font-size: 0.75rem; }
    .footer-custom .fs-5 { font-size: 1rem !important; }
}

/* ==== FIX BANNER OVERLAY ==== */
.kategori-belanja {
    position: relative;
    z-index: 1;
    margin-top: 20px;
}
</style>

<!-- ==== NAVBAR ==== -->
<nav class="navbar navbar-expand-lg sticky-top shadow-sm navbar-custom">
    <div class="container">
        <a class="navbar-brand fw-bold fs-3" href="#">
            <i class="bi bi-basket2-fill me-2"></i> KlikSupermarket
        </a>
        <button class="navbar-toggler border-0" type="button" data-bs-toggle="collapse" data-bs-target="#navbarContent">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarContent">
            <form action="{{ route('search') }}" method="GET" class="d-flex mx-auto my-3 my-lg-0 w-100 w-lg-50 search-box">
                <input name="q" class="form-control" type="search" placeholder="🔍 Cari produk atau kategori...">
                <button class="btn btn-search" type="submit">Cari</button>
            </form>

            <div class="d-flex gap-3 mt-3 mt-lg-0 ms-lg-4">
                <a href="#" class="btn btn-outline-light btn-sm rounded-pill px-4 shadow-sm">Masuk</a>
                <a href="#" class="btn btn-light btn-sm rounded-pill px-4 shadow-sm fw-semibold text-success">Daftar</a>
            </div>
        </div>
    </div>
</nav>


<!-- ==== BANNER ==== -->
<div class="container my-4 banner-wrapper">
    <div id="carouselPromo" class="carousel slide" data-bs-ride="carousel">
        <div class="carousel-inner rounded shadow overflow-hidden">
            @foreach($banners as $index => $banner)
                <div class="carousel-item @if($index == 0) active @endif text-center">
                    <img src="{{ asset($banner->gambar) }}" 
                         class="d-block mx-auto img-fluid"
                         style="max-height: 350px; width: auto; object-fit: contain;">
                </div>
            @endforeach
        </div>

        <!-- Tombol navigasi carousel -->
        <button class="carousel-control-prev" type="button" data-bs-target="#carouselPromo" data-bs-slide="prev">
            <span class="carousel-control-prev-icon bg-dark rounded-circle p-2"></span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#carouselPromo" data-bs-slide="next">
            <span class="carousel-control-next-icon bg-dark rounded-circle p-2"></span>
        </button>
    </div>
</div>


<!-- ==== KATEGORI ==== -->
<div class="container kategori-belanja py-4">
    <div class="d-flex justify-content-between align-items-center mb-3">
        <h5 class="fw-bold mb-0">Kategori Belanja</h5>
        <a href="#" class="text-success small fw-semibold">Lihat Semua</a>
    </div>

    <div class="row g-4 mb-5">
        @foreach($kategori as $cat)
            <div class="col-6 col-sm-4 col-md-3 col-lg-2 text-center">
                <div class="card border-0 shadow-sm h-100 rounded-4">
                    <div class="card-body p-3 d-flex flex-column align-items-center justify-content-center">
                        <img src="{{ asset($cat->gambar_kategori) }}" 
                             class="img-fluid mb-3" 
                             style="max-height: 90px; object-fit: contain;">
                        <p class="small fw-semibold text-truncate text-success">
                            {{ $cat->nama_kategori }}
                        </p>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
</div>

<!-- ==== PROMO ==== -->
<div class="container">
    <div class="d-flex justify-content-between align-items-center mb-3">
        <h5 class="fw-bold mb-0">Promo Lainnya</h5>
        <a href="#" class="text-success small fw-semibold">Lihat Semua</a>
    </div>
    <div class="row g-4 mb-5">
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

<!-- ==== PRODUK TERBARU ==== -->
<div class="container">
    <div class="d-flex justify-content-between align-items-center mb-3">
        <h5 class="fw-bold mb-0">Produk Terbaru</h5>
        <a href="#" class="text-success small fw-semibold">Lihat Semua</a>
    </div>
    <div class="row g-4 mb-5">
        @foreach($produkTerbaru as $produk)
        <div class="col-6 col-sm-4 col-md-3 col-lg-2">
            <div class="card shadow-sm h-100 rounded-4 bg-white">
                <img src="{{ asset($produk->gambar) }}" class="card-img-top p-3" style="height:140px; object-fit:contain;">
                <div class="card-body p-3 text-center">
                    <p class="small fw-semibold mb-2 text-truncate text-success">{{ $produk->nama_produk }}</p>
                    <p class="text-danger fw-bold mb-3 fs-6">Rp {{ number_format($produk->harga, 0, ',', '.') }}</p>
                    
                    <form action="{{ route('keranjang.add', $produk->id) }}" method="POST">
                        @csrf
                        <button type="submit" class="btn btn-success btn-sm rounded-pill w-100 shadow-sm">
                            + Tambah
                        </button>
                    </form>
                </div>
            </div>
        </div>
        @endforeach
    </div>
</div>

<!-- ==== BUAH & SAYUR ==== -->
<div class="container">
    <div class="d-flex justify-content-between align-items-center mb-3">
        <h5 class="fw-bold mb-0">Buah & Sayur</h5>
        <a href="#" class="text-success small fw-semibold">Lihat Semua</a>
    </div>
    <div class="row g-4 mb-5">
        @foreach($buahSayur as $produk)
        <div class="col-6 col-sm-4 col-md-3 col-lg-2">
            <div class="card shadow-sm h-100 rounded-4 bg-white">
                <img src="{{ asset($produk->gambar) }}" class="card-img-top p-3" style="height:140px; object-fit:contain;">
                <div class="card-body p-3 text-center">
                    <p class="small fw-semibold mb-2 text-truncate text-success">{{ $produk->nama_produk }}</p>
                    <p class="text-danger fw-bold mb-3 fs-6">Rp {{ number_format($produk->harga, 0, ',', '.') }}</p>
                    
                    <form action="{{ route('keranjang.add', $produk->id) }}" method="POST">
                        @csrf
                        <button type="submit" class="btn btn-success btn-sm rounded-pill w-100 shadow-sm">
                            + Tambah
                        </button>
                    </form>
                </div>
            </div>
        </div>
        @endforeach
    </div>
</div>

<!-- ==== PRODUK TERLARIS ==== -->
<div class="container">
    <div class="d-flex justify-content-between align-items-center mb-3">
        <h5 class="fw-bold mb-0">Produk Terlaris</h5>
        <a href="#" class="text-success small fw-semibold">Lihat Semua</a>
    </div>
    <div class="row g-4 mb-5">
        @foreach($produkTerlaris as $produk)
        <div class="col-6 col-sm-4 col-md-3 col-lg-2">
            <div class="card shadow-sm h-100 rounded-4 bg-white">
                <img src="{{ asset($produk->gambar) }}" class="card-img-top p-3" style="height:140px; object-fit:contain;">
                <div class="card-body p-3 text-center">
                    <p class="small fw-semibold mb-2 text-truncate text-success">{{ $produk->nama_produk }}</p>
                    <p class="text-danger fw-bold mb-3 fs-6">Rp {{ number_format($produk->harga, 0, ',', '.') }}</p>
                    
                    <form action="{{ route('keranjang.add', $produk->id) }}" method="POST">
                        @csrf
                        <button type="submit" class="btn btn-success btn-sm rounded-pill w-100 shadow-sm">
                            + Tambah
                        </button>
                    </form>
                </div>
            </div>
        </div>
        @endforeach
    </div>
</div>

<!-- ==== FOOTER ==== -->
<footer class="footer-custom">
    <div class="container">
        <div class="bg-white bg-opacity-10 text-center mb-3 p-3 rounded">
            <h6 class="fw-bold mb-1 fs-6">Dapatkan Promo Terbaru di KlikSupermarket</h6>
            <p class="mb-0 small">Daftar sekarang dan nikmati diskon hingga 50%</p>
        </div>
        <div class="row gy-3">
            <div class="col-md-6">
                <h6 class="fw-bold">Kontak Kami</h6>
                <p class="mb-1">Jl. Raya Supermarket No. 123, Jakarta</p>
                <p class="mb-1">Email: info@kliksupermarket.com</p>
                <p class="mb-0">Telepon: (021) 1234 5678</p>
            </div>
            <div class="col-md-6 text-md-end">
                <h6 class="fw-bold">Ikuti Kami</h6>
                <a href="#" class="text-white me-3 fs-5"><i class="bi bi-facebook"></i></a>
                <a href="#" class="text-white me-3 fs-5"><i class="bi bi-twitter"></i></a>
                <a href="#" class="text-white fs-5"><i class="bi bi-instagram"></i></a>
            </div>
        </div>
        <hr class="my-2 border-white opacity-25" />
        <p class="mb-0 text-center small">&copy; 2025 KlikSupermarket. All rights reserved.</p>
    </div>
</footer>

</div> <!-- Tutup page-wrapper -->
@endsection
