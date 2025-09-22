@extends('layouts.app')

@section('content')
<style>
/* ==== GLOBAL WRAPPER ==== */
.page-wrapper {
    background: linear-gradient(180deg, #f7fff4 0%, #f9fbff 100%);
    min-height: 100vh;
    font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
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
h5.fw-bold {
    color: #2e7d32;
    font-size: 1.2rem;
}
.text-success {
    color: #2e7d32 !important;
}

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
    padding-top: 20px;
    padding-bottom: 15px;
    font-size: 0.9rem;
}
.footer-custom h6 {
    font-size: 1rem;
    margin-bottom: 8px;
}
.footer-custom p,
.footer-custom a {
    font-size: 0.85rem;
}
.footer-custom .bg-white.bg-opacity-10 {
    background: rgba(255,255,255,0.06) !important;
    padding: 12px;
    border-radius: 10px;
}
.footer-custom .fs-5 { font-size: 1.1rem !important; }

/* ==== RESPONSIVE MOBILE FIX ==== */
@media (max-width: 576px) {
    .navbar-custom .navbar-brand { font-size: 1.2rem; }
    .navbar-custom .btn-outline-light,
    .navbar-custom .btn-light {
        padding: 4px 10px;
        font-size: 0.8rem;
    }
    .search-box input {
        font-size: 0.85rem;
        padding-left: 10px;
    }
    .search-box .btn-search {
        font-size: 0.85rem;
        padding: 6px 12px;
    }
    #carouselPromo .carousel-inner { height: 180px !important; }
    .card .card-body { padding: 8px !important; }
    .card img { max-height: 70px !important; }
    .card p { font-size: 0.8rem !important; }
    h5.fw-bold { font-size: 1rem; }
    .btn-success.rounded-pill {
        font-size: 0.75rem;
        padding: 6px 8px;
    }
    .footer-custom {
        padding-top: 14px;
        padding-bottom: 10px;
        font-size: 0.8rem;
        text-align: center;
    }
    .footer-custom h6 { font-size: 0.9rem; }
    .footer-custom p,
    .footer-custom a { font-size: 0.8rem; }
    .footer-custom .fs-5 { font-size: 1rem !important; }
    .footer-custom .col-md-6 { text-align: center !important; }
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
            <form action="{{ route('home') }}" method="GET" class="d-flex mx-auto my-3 my-lg-0 w-100 w-lg-50 search-box">
                <input class="form-control" type="search" name="keyword" value="{{ request('keyword') }}" placeholder="🔍 Cari produk favoritmu...">
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
<div id="carouselPromo" class="carousel slide mb-5" data-bs-ride="carousel">
    <div class="carousel-inner rounded shadow overflow-hidden" style="height: 220px;">
        @foreach($banners as $index => $banner)
            <div class="carousel-item @if($index == 0) active @endif">
                <img src="{{ asset($banner->gambar ?? 'default.jpg') }}" class="d-block w-100 h-100 object-fit-cover" alt="Banner {{ $index+1 }}">
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

<!-- ==== KATEGORI ==== -->
<div class="container mb-5">
    <h5 class="fw-bold mb-3">Kategori Pilihan</h5>
    <div class="row g-3">
        @foreach($kategori as $kat)
        <div class="col-6 col-md-3 col-lg-2">
            <a href="#" class="card p-3 text-center shadow-sm text-decoration-none h-100">
                <img src="{{ asset($kat->gambar ?? 'default.png') }}" class="img-fluid mb-2" style="max-height:60px;" alt="{{ $kat->nama_kategori }}">
                <p class="small fw-semibold text-dark">{{ $kat->nama_kategori }}</p>
            </a>
        </div>
        @endforeach
    </div>
</div>

<!-- ==== PROMO ==== -->
<div class="container mb-5">
    <h5 class="fw-bold mb-3">Promo Diskon</h5>
    <div class="row g-3">
        @foreach($promoDiskon as $promo)
        <div class="col-6 col-md-3">
            <div class="card h-100 position-relative">
                <span class="badge bg-danger position-absolute top-0 start-0 m-2">-{{ $promo->diskon }}%</span>
                <img src="{{ asset($promo->product->gambar ?? 'default.jpg') }}" class="card-img-top" alt="{{ $promo->product->nama_produk ?? '' }}">
                <div class="card-body text-center">
                    <p class="card-title fw-bold mb-1">{{ $promo->product->nama_produk ?? '-' }}</p>
                    <p class="text-success fw-bold mb-2">
                        Rp{{ number_format($promo->harga_diskon,0,',','.') }}
                    </p>
                    <button class="btn btn-success btn-sm rounded-pill px-3">+ Keranjang</button>
                </div>
            </div>
        </div>
        @endforeach
    </div>
</div>

<!-- ==== PRODUK TERBARU ==== -->
<div class="container mb-5">
    <h5 class="fw-bold mb-3">Produk Terbaru</h5>
    <div class="row g-3">
        @foreach($produkTerbaru as $produk)
        <div class="col-6 col-md-3">
            <div class="card h-100">
                <img src="{{ asset($produk->gambar ?? 'default.jpg') }}" class="card-img-top" alt="{{ $produk->nama_produk }}">
                <div class="card-body text-center">
                    <p class="card-title fw-bold mb-1">{{ $produk->nama_produk }}</p>
                    <p class="text-success fw-bold mb-2">
                        Rp{{ number_format($produk->harga,0,',','.') }}
                    </p>
                    <button class="btn btn-success btn-sm rounded-pill px-3">+ Keranjang</button>
                </div>
            </div>
        </div>
        @endforeach
    </div>
</div>

<!-- ==== BUAH & SAYUR ==== -->
<div class="container mb-5">
    <h5 class="fw-bold mb-3">Buah & Sayur Segar</h5>
    <div class="row g-3">
        @foreach($buahSayur as $produk)
        <div class="col-6 col-md-3">
            <div class="card h-100">
                <img src="{{ asset($produk->gambar ?? 'default.jpg') }}" class="card-img-top" alt="{{ $produk->nama_produk }}">
                <div class="card-body text-center">
                    <p class="card-title fw-bold mb-1">{{ $produk->nama_produk }}</p>
                    <p class="text-success fw-bold mb-2">
                        Rp{{ number_format($produk->harga,0,',','.') }}
                    </p>
                    <button class="btn btn-success btn-sm rounded-pill px-3">+ Keranjang</button>
                </div>
            </div>
        </div>
        @endforeach
    </div>
</div>

<!-- ==== PRODUK TERLARIS ==== -->
<div class="container mb-5">
    <h5 class="fw-bold mb-3">Produk Terlaris</h5>
    <div class="row g-3">
        @foreach($produkTerlaris as $produk)
        <div class="col-6 col-md-3">
            <div class="card h-100">
                <img src="{{ asset($produk->gambar ?? 'default.jpg') }}" class="card-img-top" alt="{{ $produk->nama_produk }}">
                <div class="card-body text-center">
                    <p class="card-title fw-bold mb-1">{{ $produk->nama_produk }}</p>
                    <p class="text-success fw-bold mb-2">
                        Rp{{ number_format($produk->harga,0,',','.') }}
                    </p>
                    <button class="btn btn-success btn-sm rounded-pill px-3">+ Keranjang</button>
                </div>
            </div>
        </div>
        @endforeach
    </div>
</div>

<!-- ==== HASIL PENCARIAN ==== -->
@if(request('keyword'))
<div class="container py-3">
    <h5 class="fw-bold mb-3">Hasil Pencarian:
        <span class="text-success">"{{ request('keyword') }}"</span>
    </h5>
    <div class="row g-4">
        @forelse($products as $produk)
        <div class="col-6 col-md-3">
            <div class="card h-100">
                <img src="{{ asset($produk->gambar ?? 'default.jpg') }}" class="card-img-top" alt="{{ $produk->nama_produk }}">
                <div class="card-body text-center">
                    <p class="card-title fw-bold mb-1">{{ $produk->nama_produk }}</p>
                    <p class="text-success fw-bold mb-2">
                        Rp{{ number_format($produk->harga,0,',','.') }}
                    </p>
                    <button class="btn btn-success btn-sm rounded-pill px-3">+ Keranjang</button>
                </div>
            </div>
        </div>
        @empty
        <div class="col-12">
            <p class="text-muted text-center">Produk tidak ditemukan.</p>
        </div>
        @endforelse
    </div>
</div>
@endif

<!-- ==== FOOTER ==== -->
<footer class="footer-custom mt-5">
    <div class="container">
        <div class="row gy-4 align-items-center">
            <div class="col-md-6 text-center text-md-start">
                <h6 class="fw-bold mb-2">KlikSupermarket</h6>
                <p class="mb-1">Belanja mudah, cepat, dan hemat hanya di genggamanmu.</p>
                <small>&copy; {{ date('Y') }} KlikSupermarket. All Rights Reserved.</small>
            </div>
            <div class="col-md-6 text-center text-md-end">
                <div class="d-flex justify-content-center justify-content-md-end gap-3">
                    <a href="#" class="text-white"><i class="bi bi-facebook fs-5"></i></a>
                    <a href="#" class="text-white"><i class="bi bi-instagram fs-5"></i></a>
                    <a href="#" class="text-white"><i class="bi bi-twitter fs-5"></i></a>
                </div>
            </div>
        </div>
    </div>
</footer>
@endsection
