@extends('layouts.app')

@section('content')
<style>
    /* ==== GLOBAL ==== */
    body {
        background-color: #f8fbf6;
    }
    .page-wrapper {
        background: linear-gradient(180deg, #f7fff4 0%, #f9fbff 100%);
        min-height: 100vh;
    }

    /* ==== NAVBAR ==== */
    .navbar-custom {
        background: linear-gradient(135deg, #2e7d32 0%, #00796b 100%);
        transition: background .3s ease-in-out;
    }
    .navbar-custom .navbar-brand {
        font-weight: 800;
        text-shadow: 0 2px 4px rgba(0,0,0,0.2);
        color: #fff !important;
    }
    .navbar-custom .navbar-toggler {
        border: 1px solid rgba(255,255,255,0.4);
    }
    .navbar-custom .navbar-toggler-icon {
        filter: invert(1);
    }
    .navbar-custom .btn-outline-light {
        border-width: 2px;
        font-weight: 600;
        transition: all 0.3s ease;
    }
    .navbar-custom .btn-outline-light:hover {
        background-color: #fff;
        color: #2e7d32 !important;
    }
    .navbar-custom .btn-light {
        font-weight: 600;
        transition: all 0.3s ease;
        border: 2px solid transparent;
    }
    .navbar-custom .btn-light:hover {
        background-color: #f1f1f1;
        border-color: #f1f1f1;
    }

    /* ==== SEARCH ==== */
    .search-box .form-control {
        border-radius: 50px 0 0 50px;
        border: none;
        box-shadow: inset 0 2px 4px rgba(0,0,0,0.05);
        padding-left: 20px;
    }
    .search-box .btn-search {
        border-radius: 0 50px 50px 0;
        background: #fff;
        color: #2e7d32;
        font-weight: 600;
        border: none;
        transition: all 0.3s ease;
    }
    .search-box .btn-search:hover {
        background: #f1f1f1;
        color: #00796b;
    }

    /* ==== SECTION ==== */
    .section-header {
        display: flex;
        justify-content: space-between;
        align-items: center;
        margin-bottom: 1.5rem;
    }
    .section-title {
        color: #1e4d20;
        font-weight: 700;
        margin-bottom: 0;
    }
    .section-link {
        color: #2e7d32;
        font-weight: 600;
        text-decoration: none;
        font-size: 0.9rem;
    }
    .section-link:hover {
        text-decoration: underline;
    }

    /* ==== CARD STYLES ==== */
    .card {
        border: 1px solid #eef2e9;
        border-radius: 16px;
        box-shadow: 0 4px 12px rgba(0,0,0,0.04);
        transition: transform .2s ease-in-out, box-shadow .2s ease-in-out;
        overflow: hidden;
    }
    .card:hover {
        transform: translateY(-5px);
        box-shadow: 0 10px 25px rgba(46,125,50,0.1);
    }
    .card .btn-success {
        background-color: #2e7d32;
        border-color: #2e7d32;
    }
    .card .btn-success:hover {
        background-color: #1e5221;
        border-color: #1e5221;
    }

    /* ==== CATEGORY CARD ==== */
    .category-card {
        display: block;
        text-decoration: none;
    }
    .category-card .card-body {
        padding: 1rem 0.5rem;
    }
    .category-card img {
        max-height: 80px;
        object-fit: contain;
        margin-bottom: 0.75rem;
    }
    .category-card .category-name {
        font-size: 0.85rem;
        font-weight: 600;
        color: #1e4d20;
    }

    /* ==== PROMO CARD ==== */
    .promo-card .badge {
        position: absolute;
        top: 10px;
        right: 10px;
        font-size: 0.9rem;
        padding: 0.5em 1em;
        box-shadow: 0 4px 10px rgba(211, 47, 47, 0.3);
    }
    .promo-card-body {
        padding: 1rem;
    }
    .promo-card img {
        max-height: 150px;
        object-fit: contain;
    }

    /* ==== PRODUCT CARD (from component) ==== */
    .product-card .card-img-container {
        height: 150px;
        padding: 1rem;
        display: flex;
        align-items: center;
        justify-content: center;
    }
    .product-card .card-img-top {
        max-height: 100%;
        max-width: 100%;
        object-fit: contain;
    }
    .product-card .product-title {
        color: #1e4d20;
    }
    .product-card .product-price {
        color: #d32f2f;
        font-size: 1.1rem;
    }

    /* ==== CAROUSEL ==== */
    #carouselPromo {
        max-width: 1000px;
        width: 100%;
    }
    .carousel-inner {
        aspect-ratio: 16 / 6; /* Responsive height */
        border-radius: 16px;
    }
    .carousel-item img {
        object-fit: cover;
        width: 100%;
        height: 100%;
    }
    .carousel-indicators [data-bs-target] {
        border-radius: 50%;
        width: 10px;
        height: 10px;
        background-color: #2e7d32;
    }

    /* ==== FOOTER ==== */
    .footer-custom {
        background: linear-gradient(135deg, #1e4d20 0%, #004d40 100%);
        color: rgba(255,255,255,0.8);
        padding-top: 2rem;
        padding-bottom: 1.5rem;
    }
    .footer-custom .footer-brand {
        color: #fff;
        font-weight: 700;
        margin-bottom: 1rem;
    }
    .footer-custom h6 {
        color: #fff;
        font-weight: 600;
        margin-bottom: 1rem;
    }
    .footer-custom a {
        color: rgba(255,255,255,0.8);
        text-decoration: none;
        transition: color 0.3s ease;
    }
    .footer-custom a:hover {
        color: #fff;
    }
    .footer-custom .social-icons a {
        font-size: 1.25rem;
    }
</style>

<main class="page-wrapper">
    <nav class="navbar navbar-expand-lg sticky-top shadow-sm navbar-custom">
        <div class="container">
            <a class="navbar-brand fs-4" href="#">
                <i class="bi bi-basket2-fill me-2"></i>KlikSupermarket
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarContent">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarContent">
                <form class="d-flex mx-auto my-3 my-lg-0 w-100" style="max-width: 500px;" role="search">
                    <input class="form-control" type="search" placeholder="Cari produk, merek, dan lainnya...">
                    <button class="btn btn-search px-4" type="submit"><i class="bi bi-search"></i></button>
                </form>
                <div class="d-flex align-items-center gap-2 mt-3 mt-lg-0 ms-lg-auto">
                    <a href="#" class="btn btn-outline-light btn-sm rounded-pill px-4">Masuk</a>
                    <a href="#" class="btn btn-light btn-sm rounded-pill px-4 text-success">Daftar</a>
                </div>
            </div>
        </div>
    </nav>

    <div class="container py-4 py-md-5">

        @if($banners->isNotEmpty())
        <section class="mb-5">
            <div id="carouselPromo" class="carousel slide" data-bs-ride="carousel">
                <div class="carousel-indicators">
                    @foreach($banners as $banner)
                        <button type="button" data-bs-target="#carouselPromo" data-bs-slide-to="{{ $loop->index }}" class="{{ $loop->first ? 'active' : '' }}" aria-current="true" aria-label="Slide {{ $loop->iteration }}"></button>
                    @endforeach
                </div>
                <div class="carousel-inner">
                    @foreach($banners as $banner)
                        <div class="carousel-item {{ $loop->first ? 'active' : '' }}">
                            <img src="{{ asset($banner->gambar) }}" class="d-block" alt="{{ $banner->judul ?? 'Banner Promosi' }}">
                        </div>
                    @endforeach
                </div>
            </div>
        </section>
        @endif

        <section class="mb-5">
            <div class="section-header">
                <h5 class="section-title">Kategori Belanja</h5>
                <a href="#" class="section-link">Lihat Semua <i class="bi bi-arrow-right-short"></i></a>
            </div>
            <div class="row g-3 g-md-4">
                @forelse($kategori as $cat)
                <div class="col-4 col-sm-3 col-md-2 col-lg-2">
                    <a href="#" class="card category-card text-center h-100">
                        <div class="card-body">
                            <img src="{{ asset($cat->gambar_kategori) }}" class="img-fluid">
                            <p class="category-name text-truncate">{{ $cat->nama_kategori }}</p>
                        </div>
                    </a>
                </div>
                @empty
                 <div class="col-12"><p class="text-muted text-center">Kategori tidak ditemukan.</p></div>
                @endforelse
            </div>
        </section>

        <section class="mb-5">
            <div class="section-header">
                <h5 class="section-title">Lagi Diskon!</h5>
                <a href="#" class="section-link">Lihat Semua <i class="bi bi-arrow-right-short"></i></a>
            </div>
            <div class="row g-4">
                @forelse($promoDiskon as $promo)
                    @php
                        $hargaAwal = $promo->product->harga;
                        $hargaDiskon = $hargaAwal - ($hargaAwal * $promo->persentase_diskon / 100);
                    @endphp
                    <div class="col-6 col-md-4 col-lg-3">
                        <div class="card promo-card h-100 position-relative text-center">
                             <img src="{{ asset($promo->product->gambar) }}" class="mx-auto d-block mt-3 mb-2">
                             <div class="promo-card-body">
                                <h6 class="fw-bold text-success mb-2 text-truncate">{{ $promo->product->nama_produk }}</h6>
                                <p class="mb-1 text-muted text-decoration-line-through small">Rp {{ number_format($hargaAwal, 0, ',', '.') }}</p>
                                <p class="fw-bold text-danger fs-5 mb-2">Rp {{ number_format($hargaDiskon, 0, ',', '.') }}</p>
                                <span class="badge bg-danger rounded-pill">Diskon {{ $promo->persentase_diskon }}%</span>
                            </div>
                        </div>
                    </div>
                @empty
                    <div class="col-12"><p class="text-muted text-center">Belum ada promo diskon aktif.</p></div>
                @endforelse
            </div>
        </section>

        <section class="mb-5">
            <div class="section-header">
                <h5 class="section-title">Produk Terbaru</h5>
                <a href="#" class="section-link">Lihat Semua <i class="bi bi-arrow-right-short"></i></a>
            </div>
            <div class="row g-3 g-md-4">
                @forelse($produkTerbaru as $produk)
                <div class="col-6 col-sm-4 col-md-3 col-lg-2">
                    <x-product-card :product="$produk" />
                </div>
                @empty
                    <div class="col-12"><p class="text-muted text-center">Belum ada produk terbaru.</p></div>
                @endforelse
            </div>
        </section>

        <section class="mb-5">
            <div class="section-header">
                <h5 class="section-title">Buah & Sayur Segar</h5>
                <a href="#" class="section-link">Lihat Semua <i class="bi bi-arrow-right-short"></i></a>
            </div>
            <div class="row g-3 g-md-4">
                @forelse($buahSayur as $produk)
                <div class="col-6 col-sm-4 col-md-3 col-lg-2">
                    <x-product-card :product="$produk" />
                </div>
                @empty
                    <div class="col-12"><p class="text-muted text-center">Produk buah & sayur belum tersedia.</p></div>
                @endforelse
            </div>
        </section>
        
        <section class="mb-5">
            <div class="section-header">
                <h5 class="section-title">Paling Laris</h5>
                <a href="#" class="section-link">Lihat Semua <i class="bi bi-arrow-right-short"></i></a>
            </div>
            <div class="row g-3 g-md-4">
                 @forelse($produkTerlaris as $produk)
                <div class="col-6 col-sm-4 col-md-3 col-lg-2">
                    <x-product-card :product="$produk" />
                </div>
                @empty
                    <div class="col-12"><p class="text-muted text-center">Produk terlaris belum tersedia.</p></div>
                @endforelse
            </div>
        </section>
        
    </div>
</main>

<footer class="footer-custom">
    <div class="container">
        <div class="row gy-4">
            <div class="col-lg-4 col-md-12">
                <h5 class="footer-brand"><i class="bi bi-basket2-fill me-2"></i>KlikSupermarket</h5>
                <p class="small">Belanja kebutuhan harian lebih mudah, cepat, dan hemat dari rumah. Kualitas terjamin, pengiriman cepat.</p>
            </div>
            <div class="col-lg-2 col-6">
                <h6>Jelajahi</h6>
                <ul class="list-unstyled">
                    <li><a href="#">Promo</a></li>
                    <li><a href="#">Produk Baru</a></li>
                    <li><a href="#">Kategori</a></li>
                </ul>
            </div>
            <div class="col-lg-3 col-6">
                <h6>Bantuan</h6>
                <ul class="list-unstyled">
                    <li><a href="#">Hubungi Kami</a></li>
                    <li><a href="#">FAQ</a></li>
                    <li><a href="#">Kebijakan Privasi</a></li>
                </ul>
            </div>
            <div class="col-lg-3 col-md-12 text-lg-start">
                <h6>Ikuti Kami</h6>
                <div class="social-icons">
                    <a href="#" class="me-3"><i class="bi bi-facebook"></i></a>
                    <a href="#" class="me-3"><i class="bi bi-instagram"></i></a>
                    <a href="#" class="me-3"><i class="bi bi-twitter"></i></a>
                </div>
            </div>
        </div>
        <hr class="my-3 border-white opacity-25" />
        <p class="mb-0 text-center small">&copy; {{ date('Y') }} KlikSupermarket. All Rights Reserved.</p>
    </div>
</footer>
@endsection
