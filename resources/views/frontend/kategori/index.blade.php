@extends('layouts.app')

@section('content')
<div class="container py-4">
    <h4 class="fw-bold mb-4 text-success">Semua Kategori</h4>
    <div class="row g-4">
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
</div>
@endsection
