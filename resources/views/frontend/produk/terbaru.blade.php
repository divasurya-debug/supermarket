@extends('layouts.app')

@section('content')
<div class="container">
    <h2 class="mb-4">Produk Terbaru</h2>

    <div class="row g-4">
        {{-- Contoh produk statis (nanti bisa diganti dengan loop dari database) --}}
        <div class="col-md-3 col-sm-6">
            <div class="card h-100 shadow-sm">
                <img src="https://via.placeholder.com/250x180" class="card-img-top" alt="Bogasari Tepung Segitiga Biru">
                <div class="card-body text-center">
                    <h6 class="card-title">Bogasari Tepung Segitiga Biru</h6>
                    <p class="text-danger fw-bold">Rp 24.000</p>
                    <button class="btn btn-success btn-sm">+ Tambah</button>
                </div>
            </div>
        </div>

        <div class="col-md-3 col-sm-6">
            <div class="card h-100 shadow-sm">
                <img src="https://via.placeholder.com/250x180" class="card-img-top" alt="Rexona">
                <div class="card-body text-center">
                    <h6 class="card-title">Rexona Deodorant</h6>
                    <p class="text-danger fw-bold">Rp 18.000</p>
                    <button class="btn btn-success btn-sm">+ Tambah</button>
                </div>
            </div>
        </div>

        <div class="col-md-3 col-sm-6">
            <div class="card h-100 shadow-sm">
                <img src="https://via.placeholder.com/250x180" class="card-img-top" alt="Gatsby Styling Pomade">
                <div class="card-body text-center">
                    <h6 class="card-title">Gatsby Styling Pomade</h6>
                    <p class="text-danger fw-bold">Rp 18.000</p>
                    <button class="btn btn-success btn-sm">+ Tambah</button>
                </div>
            </div>
        </div>

        <div class="col-md-3 col-sm-6">
            <div class="card h-100 shadow-sm">
                <img src="https://via.placeholder.com/250x180" class="card-img-top" alt="Pisang Sunpride">
                <div class="card-body text-center">
                    <h6 class="card-title">Pisang Sunpride</h6>
                    <p class="text-danger fw-bold">Rp 12.000</p>
                    <button class="btn btn-success btn-sm">+ Tambah</button>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
