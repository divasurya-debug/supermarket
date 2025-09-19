@extends('layouts.app')

@section('content')

<div class="container my-4">

    <!-- Banner Carousel -->
    <div id="carouselPromo" class="carousel slide mb-5" data-bs-ride="carousel">
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

    <!-- Kategori Belanja -->
    <section class="mb-5">
        <div class="d-flex justify-content-between align-items-center mb-3">
            <h5 class="fw-bold text-success">Kategori Belanja</h5>
            <a href="#" class="text-primary small">Lihat Semua</a>
        </div>
        <div class="row g-3">
            <div class="col-6 col-md-3 col-lg-2">
                <div class="card text-center shadow-sm h-100">
                    <img src="kategori1.jpg" class="card-img-top p-3" alt="Makanan">
                    <div class="card-body p-2">
                        <p class="card-text small fw-semibold">Makanan</p>
                    </div>
                </div>
            </div>
            <!-- Tambahkan kategori lainnya -->
        </div>
    </section>

    <!-- Promo Lainnya -->
    <section class="mb-5">
        <div class="d-flex justify-content-between align-items-center mb-3">
            <h5 class="fw-bold text-success">Promo Lainnya</h5>
            <a href="#" class="text-primary small">Lihat Semua</a>
        </div>
        <div class="row g-3">
            <div class="col-6 col-md-4 col-lg-3">
                <div class="card shadow-sm h-100">
                    <img src="promo1.jpg" class="card-img-top" alt="Promo 1">
                </div>
            </div>
            <!-- Tambahkan promo lainnya -->
        </div>
    </section>

</div>

@endsection

<style>
/* ==== Banner Styling ==== */
.banner-img {
    width: 100%;
    height: auto;
    max-height: 380px; /* agar di laptop gak terlalu tinggi */
    object-fit: cover;
}

/* ==== Kategori & Promo Cards ==== */
.card img {
    object-fit: contain;
    height: 120px;
}

.card {
    border-radius: 10px;
}

/* ==== Responsive Mobile ==== */
@media (max-width: 768px) {
    .banner-img {
        max-height: 220px; /* lebih kecil di HP */
    }
    .card img {
        height: 80px;
    }
}
</style>


    <!-- ==== PRODUK TERBARU ==== -->
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
    <div class="row g-4 mb-5">
        @foreach($buahSayur as $produk)
        <div class="col-6 col-sm-4 col-md-3 col-lg-2">
            <div class="card shadow-sm h-100 rounded-4 bg-white">
                <img src="{{ asset($produk->gambar) }}" class="card-img-top p-3" style="height:140px; object-fit:contain;">
                <div class="card-body p-3 text-center">
                    <p class="small fw-semibold mb-2 text-truncate text-success">{{ $produk->nama_produk }}</p>
                    <p class="text-danger fw-bold mb-3 fs-6">Rp {{ number_format($produk->harga, 0, ',', '.') }}</p>
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
    <div class="row g-4 mb-5">
        @foreach($produkTerlaris as $produk)
        <div class="col-6 col-sm-4 col-md-3 col-lg-2">
            <div class="card shadow-sm h-100 rounded-4 bg-white">
                <img src="{{ asset($produk->gambar) }}" class="card-img-top p-3" style="height:140px; object-fit:contain;">
                <div class="card-body p-3 text-center">
                    <p class="small fw-semibold mb-2 text-truncate text-success">{{ $produk->nama_produk }}</p>
                    <p class="text-danger fw-bold mb-3 fs-6">Rp {{ number_format($produk->harga, 0, ',', '.') }}</p>
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
@endsection
