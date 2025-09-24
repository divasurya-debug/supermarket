@extends('layouts.app')

@section('content')
<div class="container py-4">
    <h4 class="fw-bold mb-4 text-success">Produk Terbaru</h4>
    <div class="row g-4">
        @foreach($produk as $p)
            <div class="col-6 col-sm-4 col-md-3 col-lg-2">
                <div class="card shadow-sm h-100 rounded-4 bg-white">
                    <img src="{{ asset($p->gambar) }}" class="card-img-top p-3" style="height:140px; object-fit:contain;">
                    <div class="card-body p-3 text-center">
                        <p class="small fw-semibold mb-2 text-truncate text-success">{{ $p->nama_produk }}</p>
                        <p class="text-danger fw-bold mb-3 fs-6">Rp {{ number_format($p->harga, 0, ',', '.') }}</p>

                        <!-- Tombol tambah ke keranjang -->
                        <form action="{{ route('keranjang.add', $p->id_produk) }}" method="POST">
                            @csrf
                            <input type="hidden" name="jumlah" value="1">
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
@endsection