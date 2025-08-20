@extends('layouts.app')

@section('content')
<div class="container">
<!-- Banner -->
<div id="carouselPromo" class="carousel slide mb-5" data-bs-ride="carousel">
    <div class="carousel-inner rounded shadow overflow-hidden" style="height: 400px;">
        <div class="carousel-item active">
            <img src="/images/banner1.jpg" class="d-block w-100 h-100 object-fit-cover" alt="Promo 1">
        </div>
        <div class="carousel-item">
            <img src="/images/banner2.jpg" class="d-block w-100 h-100 object-fit-cover" alt="Promo 2">
        </div>
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
        @foreach([
            ['Makanan','makanan.png'],
            ['Dapur & Bahan','dapur.png'],
            ['Minuman','minuman.png'],
            ['Ibu & Anak','ibu.png'],
            ['Kesehatan & Kebersihan','kesehatan.png'],
            ['Kebutuhan Rumah','rumah.png'],
            ['Kosmetik','kosmetik.png'],
            ['Makanan Hewan','hewan.png'],
            ['Lainnya','lainnya.png'],
        ] as $cat)
        <div class="col-6 col-md-2 text-center">
            <div class="card border-0 shadow-sm h-100">
                <div class="card-body">
                    <img src="/images/{{ $cat[1] }}" class="img-fluid mb-2" alt="{{ $cat[0] }}">
                    <p class="small mb-0">{{ $cat[0] }}</p>
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

    <!-- Produk Terbaru -->
    <div class="d-flex justify-content-between align-items-center mb-3">
        <h5 class="fw-bold">Produk Terbaru</h5>
        <a href="#" class="text-primary">Lihat Semua</a>
    </div>
    <div class="row g-3 mb-5">
        @foreach([
            ['Glow & Lovely Sunscreen Bright UV','Rp 25.000','produk1.jpg'],
            ['Emina Micellar Water Low pH','Rp 47.500','produk2.jpg'],
            ['Amo Sparkling Milk Strawberry','Rp 4.000','produk3.jpg'],
            ['Maggi Bumbu Penyedap','Rp 6.500','produk4.jpg'],
            ['Frisian Flag Susu Cair','Rp 3.500','produk5.jpg'],
            ['Wall’s Ice Cream Party Pack','Rp 18.000','produk6.jpg'],
        ] as $produk)
        <div class="col-6 col-md-2">
            <div class="card shadow-sm h-100">
                <img src="/images/{{ $produk[2] }}" class="card-img-top p-2" alt="{{ $produk[0] }}">
                <div class="card-body p-2 text-center">
                    <p class="small fw-bold mb-1">{{ $produk[0] }}</p>
                    <p class="text-danger fw-bold mb-2">{{ $produk[1] }}</p>
                    <button class="btn btn-primary btn-sm w-100">+ Tambah</button>
                </div>
            </div>
        </div>
        @endforeach
    </div>

    <!-- Buah & Sayur -->
    <div class="d-flex justify-content-between align-items-center mb-3">
        <h5 class="fw-bold">Buah & Sayur</h5>
        <a href="#" class="text-primary">Lihat Semua</a>
    </div>
    <div class="row g-3 mb-5">
        @foreach([
            ['Anggur Muscat Hijau Import','Rp 50.000','buah1.jpg'],
            ['Apel Fuji Super Sweet','Rp 18.000','buah2.jpg'],
            ['Kiwi Hijau','Rp 12.000','buah3.jpg'],
            ['Apel Merah Manis','Rp 15.000','buah4.jpg'],
            ['Pear Sweet','Rp 20.000','buah5.jpg'],
            ['Jeruk Murcot','Rp 22.000','buah6.jpg'],
        ] as $buah)
        <div class="col-6 col-md-2">
            <div class="card shadow-sm h-100">
                <img src="/images/{{ $buah[2] }}" class="card-img-top p-2" alt="{{ $buah[0] }}">
                <div class="card-body p-2 text-center">
                    <p class="small fw-bold mb-1">{{ $buah[0] }}</p>
                    <p class="text-danger fw-bold mb-2">{{ $buah[1] }}</p>
                    <button class="btn btn-primary btn-sm w-100">+ Tambah</button>
                </div>
            </div>
        </div>
        @endforeach
    </div>

    <!-- Produk Terlaris -->
    <div class="d-flex justify-content-between align-items-center mb-3">
        <h5 class="fw-bold">Produk Terlaris</h5>
        <a href="#" class="text-primary">Lihat Semua</a>
    </div>
    <div class="row g-3 mb-5">
        @foreach([
            ['Sunlight Pencuci Piring Lime 910mL','Rp 15.900','sunlight.jpg'],
            ['Indomilk Kental Manis Putih 545G','Rp 17.900','indomilk.jpg'],
            ['Shinzui Body Cleanser','Rp 26.900','shinzui.jpg'],
            ['Sedap Mie Instant Goreng 5x91g','Rp 15.900','sedap.jpg'],
            ['Mamy Poko Pants isi 32','Rp 66.950','mamypoko.jpg'],
            ['Tropical Minyak Goreng 2L','Rp 40.900','tropical.jpg'],
        ] as $produk)
        <div class="col-6 col-md-2">
            <div class="card shadow-sm h-100">
                <img src="/images/{{ $produk[2] }}" class="card-img-top p-2" alt="{{ $produk[0] }}">
                <div class="card-body p-2 text-center">
                    <p class="small fw-bold mb-1">{{ $produk[0] }}</p>
                    <p class="text-danger fw-bold mb-2">{{ $produk[1] }}</p>
                    <button class="btn btn-primary btn-sm w-100">+ Tambah</button>
                </div>
            </div>
        </div>
        @endforeach
    </div>
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
