@extends('layouts.app')

@section('content')

<!-- Navbar -->
<nav class="navbar navbar-expand-lg navbar-light bg-white shadow-sm sticky-top">
    <div class="container">
        <!-- Brand -->
        <a class="navbar-brand fw-bold text-primary" href="#">
            KlikSupermarket
        </a>

        <!-- Toggle button (mobile) -->
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarContent"
            aria-controls="navbarContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <!-- Navbar Content -->
        <div class="collapse navbar-collapse" id="navbarContent">
            <!-- Search Bar -->
            <form class="d-flex mx-auto my-2 my-lg-0 w-100 w-lg-50">
                <input class="form-control me-2" type="search" placeholder="Cari produk..." aria-label="Search">
                <button class="btn btn-outline-primary" type="submit">Cari</button>
            </form>

            <!-- Auth Buttons -->
            <div class="d-flex gap-2 mt-3 mt-lg-0 ms-lg-3">
                <a href="#" class="btn btn-primary btn-sm">Masuk</a>
                <a href="#" class="btn btn-outline-primary btn-sm">Daftar</a>
            </div>
        </div>
    </div>
</nav>

<div class="container">

    <!-- Banner -->
<div id="carouselPromo" class="carousel slide mb-4" data-bs-ride="carousel">
    <div class="carousel-inner rounded shadow overflow-hidden" style="height: 200px;">
        @foreach($banners as $index => $banner)
            <div class="carousel-item @if($index == 0) active @endif">
                <img src="{{ asset($banner->gambar) }}" 
                     class="d-block w-100 h-100" 
                     style="object-fit: contain;" 
                     alt="Promo {{ $index + 1 }}">
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
    <div class="d-flex justify-content-between align-items-center mb-2">
        <h5 class="fw-bold mb-0">Kategori Belanja</h5>
        <a href="#" class="text-primary small">Lihat Semua</a>
    </div>
    <div class="row g-3 mb-4">
        @foreach($kategori as $cat)
        <div class="col-6 col-sm-4 col-md-3 col-lg-2 text-center">
            <div class="card border-0 shadow-sm h-100">
                <div class="card-body p-2">
                    <img src="{{ asset($cat->gambar_kategori) }}" 
                         class="img-fluid mb-2" 
                         style="max-height: 80px; object-fit: contain;" 
                         alt="{{ $cat->nama_kategori }}">
                    <p class="small mb-0 text-truncate">{{ $cat->nama_kategori }}</p>
                </div>
            </div>
        </div>
        @endforeach
    </div>

    <!-- Promo Diskon -->
    <div class="d-flex justify-content-between align-items-center mb-2">
        <h5 class="fw-bold mb-0">Promo Lainnya</h5>
        <a href="#" class="text-primary small">Lihat Semua</a>
    </div>
    <div class="row g-3 mb-4">
        @forelse($promoDiskon as $promo)
            @php
                $hargaAwal = $promo->product->harga;
                $hargaDiskon = $hargaAwal - ($hargaAwal * $promo->persentase_diskon / 100);
            @endphp
            <div class="col-6 col-sm-4 col-md-3">
                <div class="card h-100 shadow-sm border-0 rounded-3 overflow-hidden text-center p-2">
                    <img src="{{ asset($promo->product->gambar) }}" 
                         alt="{{ $promo->product->nama_produk }}" 
                         class="mx-auto d-block rounded"
                         style="max-height: 150px; width: auto; object-fit: contain;">
                    <div class="card-body">
                        <h6 class="fw-bold mb-2">{{ $promo->product->nama_produk }}</h6>
                        <p class="mb-1 text-muted text-decoration-line-through">
                            Rp {{ number_format($hargaAwal, 0, ',', '.') }}
                        </p>
                        <p class="fw-bold text-success mb-2">
                            Rp {{ number_format($hargaDiskon, 0, ',', '.') }}
                        </p>
                        <p class="mb-2 text-secondary small">
                            {{ \Carbon\Carbon::parse($promo->tanggal_mulai)->format('d M Y') }} 
                            s/d 
                            {{ \Carbon\Carbon::parse($promo->tanggal_akhir)->format('d M Y') }}
                        </p>
                        <span class="badge bg-danger px-3 py-2 shadow-sm">
                            Diskon {{ $promo->persentase_diskon }}%
                        </span>
                    </div>
                </div>
            </div>
        @empty
            <div class="col-12">
                <p class="text-muted text-center">Belum ada promo diskon aktif.</p>
            </div>
        @endforelse
    </div>

    <!-- Produk Terbaru -->
    <div class="d-flex justify-content-between align-items-center mb-2">
        <h5 class="fw-bold mb-0">Produk Terbaru</h5>
        <a href="#" class="text-primary small">Lihat Semua</a>
    </div>
    <div class="row g-3 mb-4">
        @foreach($produkTerbaru as $produk)
        <div class="col-6 col-sm-4 col-md-3 col-lg-2">
            <div class="card shadow-sm h-100">
                <img src="{{ asset($produk->gambar) }}" 
                     class="card-img-top p-2" 
                     style="height:120px; object-fit:contain;" 
                     alt="{{ $produk->nama_produk }}">
                <div class="card-body p-2 text-center">
                    <p class="small fw-bold mb-1 text-truncate">{{ $produk->nama_produk }}</p>
                    <p class="text-danger fw-bold mb-2 small">Rp {{ number_format($produk->harga, 0, ',', '.') }}</p>
                    <button class="btn btn-primary btn-sm w-100">+ Tambah</button>
                </div>
            </div>
        </div>
        @endforeach
    </div>

    <!-- Buah & Sayur -->
    <div class="d-flex justify-content-between align-items-center mb-2">
        <h5 class="fw-bold mb-0">Buah & Sayur</h5>
        <a href="#" class="text-primary small">Lihat Semua</a>
    </div>
    <div class="row g-3 mb-4">
        @foreach($buahSayur as $produk)
        <div class="col-6 col-sm-4 col-md-3 col-lg-2">
            <div class="card shadow-sm h-100">
                <img src="{{ asset($produk->gambar) }}" 
                     class="card-img-top p-2" 
                     style="height:120px; object-fit:contain;" 
                     alt="{{ $produk->nama_produk }}">
                <div class="card-body p-2 text-center">
                    <p class="small fw-bold mb-1 text-truncate">{{ $produk->nama_produk }}</p>
                    <p class="text-danger fw-bold mb-2 small">Rp {{ number_format($produk->harga, 0, ',', '.') }}</p>
                    <button class="btn btn-primary btn-sm w-100">+ Tambah</button>
                </div>
            </div>
        </div>
        @endforeach
    </div>

    <!-- Produk Terlaris -->
    <div class="d-flex justify-content-between align-items-center mb-2">
        <h5 class="fw-bold mb-0">Produk Terlaris</h5>
        <a href="#" class="text-primary small">Lihat Semua</a>
    </div>
    <div class="row g-3 mb-4">
        @foreach($produkTerlaris as $produk)
        <div class="col-6 col-sm-4 col-md-3 col-lg-2">
            <div class="card shadow-sm h-100">
                <img src="{{ asset($produk->gambar) }}" 
                     class="card-img-top p-2" 
                     style="height:120px; object-fit:contain;" 
                     alt="{{ $produk->nama_produk }}">
                <div class="card-body p-2 text-center">
                    <p class="small fw-bold mb-1 text-truncate">{{ $produk->nama_produk }}</p>
                    <p class="text-danger fw-bold mb-2 small">Rp {{ number_format($produk->harga, 0, ',', '.') }}</p>
                    <button class="btn btn-primary btn-sm w-100">+ Tambah</button>
                </div>
            </div>
        </div>
        @endforeach
    </div>
</div>

<!-- Footer -->
<footer class="bg-light border-top mt-5 pt-4">
    <div class="container">
        <!-- Banner Promo -->
        <div class="bg-warning rounded p-3 text-center mb-4">
            <h6 class="fw-bold text-white mb-0">
                Nikmati pengalaman belanja terbaik hanya di Klik Indomaret
            </h6>
        </div>

        <div class="row text-center text-md-start">
            <div class="col-12 col-md-3 mb-3">
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
            <div class="col-12 col-md-3 mb-3">
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
            <div class="col-12 col-md-3 mb-3">
                <h6 class="fw-bold">Keamanan Belanja</h6>
                <img src="/images/verisign.png" alt="VeriSign Secured" class="img-fluid" style="max-height: 50px;">
            </div>
        </div>

        <hr>
        <p class="text-center text-muted small mb-0">&copy; {{ date('Y') }} KlikSupermarket. All rights reserved.</p>
    </div>
</footer>
@endsection
