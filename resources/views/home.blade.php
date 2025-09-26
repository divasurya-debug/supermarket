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
    /* Navbar brand */
    .navbar-custom .navbar-brand {
        font-size: 1.2rem;
    }
    .navbar-custom .btn-outline-light,
    .navbar-custom .btn-light {
        padding: 4px 10px;
        font-size: 0.8rem;
    }

    /* Search box */
    .search-box input {
        font-size: 0.85rem;
        padding-left: 10px;
    }
    .search-box .btn-search {
        font-size: 0.85rem;
        padding: 6px 12px;
    }

    /* Banner */
    #carouselPromo .carousel-inner {
        height: 180px !important;
    }

    /* Cards */
    .card .card-body {
        padding: 8px !important;
    }
    .card img {
        max-height: 70px !important;
    }
    .card p {
        font-size: 0.8rem !important;
    }

    /* Section title */
    h5.fw-bold {
        font-size: 1rem;
    }

    /* Button */
    .btn-success.rounded-pill {
        font-size: 0.75rem;
        padding: 6px 8px;
    }

    /* Footer */
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
    .footer-custom .col-md-6 {
        text-align: center !important;
    }
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

            <div class="d-flex gap-3 mt-3 mt-lg-0 ms-lg-4 align-items-center">
                <!-- 🔔 Keranjang -->
                <a href="{{ route('keranjang.index') }}" class="btn btn-light position-relative rounded-circle">
                    <i class="bi bi-cart-fill text-success fs-5"></i>
                    <span id="cart-count" class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger">
                        {{ session('cart_total', 0) }}
                    </span>
                </a>
                <a href="#" class="btn btn-outline-light btn-sm rounded-pill px-4 shadow-sm">Masuk</a>
                <a href="#" class="btn btn-light btn-sm rounded-pill px-4 shadow-sm fw-semibold text-success">Daftar</a>
            </div>
        </div>
    </div>
</nav>

<!-- ==== BANNER ==== -->
@if($banners->isNotEmpty())
<div class="d-flex justify-content-center my-4">
    <div id="carouselPromo" class="carousel slide shadow rounded overflow-hidden"
         data-bs-ride="carousel" style="max-width: 900px; width: 100%;">
        <div class="carousel-indicators">
            @foreach($banners as $banner)
                <button type="button" data-bs-target="#carouselPromo" 
                        data-bs-slide-to="{{ $loop->index }}" 
                        class="@if($loop->first) active @endif" 
                        aria-current="true" 
                        aria-label="Slide {{ $loop->iteration }}"></button>
            @endforeach
        </div>
        <div class="carousel-inner" style="height: 260px;">
            @foreach($banners as $banner)
                <div class="carousel-item @if($loop->first) active @endif">
                    <img src="{{ asset($banner->gambar) }}" 
                         class="d-block mx-auto h-100" 
                         style="max-width: 100%; object-fit: contain;" 
                         alt="{{ $banner->judul ?? 'Banner Promosi' }}">
                </div>
            @endforeach
        </div>
    </div>
</div>
@endif

{{-- ✅ HASIL PENCARIAN PRODUK --}}
@if(request('keyword'))
<div class="container py-3">
    <h5 class="fw-bold mb-3">Hasil Pencarian: 
        <span class="text-success">"{{ request('keyword') }}"</span>
    </h5>
    <div class="row g-4">
        @forelse($products as $produk)
            <div class="col-6 col-sm-4 col-md-3 col-lg-2">
                <div class="card shadow-sm h-100 rounded-4 bg-white">
                    <img src="{{ asset($produk->gambar) }}" 
                         class="card-img-top p-3" 
                         style="height:140px; object-fit:contain;">
                    <div class="card-body p-3 text-center">
                        <p class="small fw-semibold mb-2 text-truncate text-success">
                            {{ $produk->nama_produk }}
                        </p>
                        <p class="text-danger fw-bold mb-3 fs-6">
                            Rp {{ number_format($produk->harga, 0, ',', '.') }}
                        </p>
                        <button class="btn btn-success btn-sm rounded-pill w-100 shadow-sm">
                            + Tambah
                        </button>
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

<div class="container py-4">
   <!-- ==== KATEGORI ==== -->
<div class="d-flex justify-content-between align-items-center mb-3">
    <h5 class="fw-bold mb-0">Kategori Belanja</h5>
    <a href="{{ route('kategori.index') }}" class="text-success small fw-semibold">Lihat Semua</a>
</div>
<div class="row g-4 mb-5">
    @foreach($kategori as $cat)
    <div class="col-6 col-sm-4 col-md-3 col-lg-2 text-center">
        <div class="card border-0 shadow-sm h-100 rounded-4">
            <div class="card-body p-3 d-flex flex-column align-items-center justify-content-center">
                <img src="{{ asset($cat->gambar_kategori) }}" class="img-fluid mb-3" style="max-height: 90px; object-fit: contain;">
                <p class="small fw-semibold text-truncate text-success">{{ $cat->nama_kategori }}</p>
            </div>
        </div>
    </div>
    @endforeach
</div>

<!-- ==== PROMO ==== -->
<div class="d-flex justify-content-between align-items-center mb-3">
    <h5 class="fw-bold mb-0">Promo Lainnya</h5>
    <a href="{{ route('promo.index') }}" class="text-success small fw-semibold">Lihat Semua</a>
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

`<!-- ==== PRODUK TERBARU ==== -->
<div class="d-flex justify-content-between align-items-center mb-3">
    <h5 class="fw-bold mb-0">Produk Terbaru</h5>
    <a href="{{ route('produk.terbaru') }}" class="text-success small fw-semibold">Lihat Semua</a>
</div>
<div class="row g-4 mb-5">
    @foreach($produkTerbaru as $produk)
    <div class="col-6 col-sm-4 col-md-3 col-lg-2">
        <div class="card shadow-sm h-100 rounded-4 bg-white">

            <!-- Klik gambar untuk lihat detail -->
            <a href="{{ route('produk.show', $produk->id_produk) }}">
               <img src="{{ $produk->gambar }}" 
     class="card-img-top p-3" 
     style="height:140px; object-fit:contain;" 
     alt="Gambar {{ $produk->nama_produk }}">
            </a>

            <div class="card-body p-3 text-center">
                <!-- Nama produk juga bisa diklik -->
                <a href="{{ route('produk.show', $produk->id_produk) }}" class="d-block small fw-semibold mb-2 text-truncate text-success text-decoration-none">
                    {{ $produk->nama_produk }}
                </a>
                <p class="text-danger fw-bold mb-3 fs-6">
                    Rp {{ number_format($produk->harga, 0, ',', '.') }}
                </p>

              <!-- Tombol tambah ke keranjang -->
<form action="{{ route('keranjang.add', $produk->id_produk) }}" 
      method="POST" 
      class="form-tambah-keranjang">
    @csrf
    <input type="number" name="jumlah" value="1" min="1" hidden>
    <button type="submit" 
            class="btn btn-success btn-sm rounded-pill w-100 shadow-sm"
            aria-label="Tambah produk ke keranjang">
        + Tambah
    </button>
</form>


            </div>
        </div>
    </div>
    @endforeach
</div>`

<!-- ==== BUAH & SAYUR ==== -->
<div class="d-flex justify-content-between align-items-center mb-3">
    <h5 class="fw-bold mb-0">Buah & Sayur</h5>
    <a href="{{ route('produk.buahsayur') }}" class="text-success small fw-semibold">Lihat Semua</a>
</div>
<div class="row g-4 mb-5">
    @foreach($buahSayur as $produk)
    <div class="col-6 col-sm-4 col-md-3 col-lg-2">
        <div class="card shadow-sm h-100 rounded-4 bg-white">

            <a href="{{ route('produk.show', $produk->id_produk) }}">
             <img src="{{ $produk->gambar }}" 
     class="card-img-top p-3" 
     style="height:140px; object-fit:contain;" 
     alt="Gambar {{ $produk->nama_produk }}">

            </a>

            <div class="card-body p-3 text-center">
                <a href="{{ route('produk.show', $produk->id_produk) }}" class="d-block small fw-semibold mb-2 text-truncate text-success text-decoration-none">
                    {{ $produk->nama_produk }}
                </a>
                <p class="text-danger fw-bold mb-3 fs-6">
                    Rp {{ number_format($produk->harga, 0, ',', '.') }}
                </p>

              <!-- Tombol tambah ke keranjang -->
<form action="{{ route('keranjang.add', $produk->id_produk) }}" 
      method="POST" 
      class="form-tambah-keranjang">
    @csrf
    <input type="number" name="jumlah" value="1" min="1" hidden>
    <button type="submit" 
            class="btn btn-success btn-sm rounded-pill w-100 shadow-sm"
            aria-label="Tambah produk ke keranjang">
        + Tambah
    </button>
</form>


            </div>
        </div>
    </div>
    @endforeach
</div>

<!-- ==== PRODUK TERLARIS ==== -->
<div class="d-flex justify-content-between align-items-center mb-3">
    <h5 class="fw-bold mb-0">Produk Terlaris</h5>
    <a href="{{ route('produk.terlaris') }}" class="text-success small fw-semibold">Lihat Semua</a>
</div>
<div class="row g-4 mb-5">
    @foreach($produkTerlaris as $produk)
    <div class="col-6 col-sm-4 col-md-3 col-lg-2">
        <div class="card shadow-sm h-100 rounded-4 bg-white">

            <!-- Klik gambar untuk detail -->
            <a href="{{ route('produk.show', $produk->id_produk) }}">
                <img src="{{ $produk->gambar }}" 
                     class="card-img-top p-3" 
                     style="height:140px; object-fit:contain;" 
                     alt="Gambar {{ $produk->nama_produk }}">
            </a>

            <div class="card-body p-3 text-center">
                <!-- Nama produk -->
                <a href="{{ route('produk.show', $produk->id_produk) }}" 
                   class="d-block small fw-semibold mb-2 text-truncate text-success text-decoration-none">
                    {{ $produk->nama_produk }}
                </a>

                <!-- Harga -->
                <p class="text-danger fw-bold mb-3 fs-6">
                    Rp {{ number_format($produk->harga, 0, ',', '.') }}
                </p>

                <!-- Tombol tambah ke keranjang -->
                <form action="{{ route('keranjang.add', $produk->id_produk) }}" 
                      method="POST" 
                      class="form-tambah-keranjang">
                    @csrf
                    <input type="number" name="jumlah" value="1" min="1" hidden>
                    <button type="submit" 
                            class="btn btn-success btn-sm rounded-pill w-100 shadow-sm"
                            aria-label="Tambah produk ke keranjang">
                        + Tambah
                    </button>
                </form>

            </div>
        </div>
    </div>
    @endforeach
</div>


<!-- ==== SCRIPT AJAX UNTUK TAMBAH KERANJANG ==== -->
<script>
document.addEventListener("DOMContentLoaded", function () {
    document.querySelectorAll(".form-tambah-keranjang").forEach(form => {
        form.addEventListener("submit", function (e) {
            e.preventDefault();
            let formData = new FormData(this);
            let action   = this.getAttribute("action");

            fetch(action, {
                method: "POST",
                headers: {
                    "X-CSRF-TOKEN": document.querySelector('meta[name="csrf-token"]').content,
                    "X-Requested-With": "XMLHttpRequest",
                    "Accept": "application/json"
                },
                body: formData
            })
            .then(res => res.json())
            .then(data => {
                if (data.success) {
                    document.querySelector("#cart-count").textContent = data.total;
                } else {
                    alert("Gagal menambah keranjang!");
                }
            })
            .catch(err => console.error("Error:", err));
        });
    });
});
</script>





<!-- ==== FOOTER ==== -->
<footer class="footer-custom mt-4">
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
