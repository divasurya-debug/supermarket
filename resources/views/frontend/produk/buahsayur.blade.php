@extends('layouts.app')

@section('content')
<div class="container py-4">
    <h4 class="fw-bold mb-4 text-success">Produk Buah &amp; Sayur</h4>

    @if(isset($produk) && $produk->count() > 0)
        <div class="row g-4">
            @foreach($produk as $p)
                <div class="col-6 col-sm-4 col-md-3 col-lg-2">
                    <div class="card shadow-sm h-100 rounded-4 bg-white">
                        <img src="{{ asset($p->gambar) }}" 
                             alt="{{ $p->nama_produk }}" 
                             class="card-img-top p-3" 
                             style="height: 140px; object-fit: contain;">
                        <div class="card-body p-3 text-center">
                            <p class="small fw-semibold mb-2 text-truncate text-success">
                                {{ $p->nama_produk }}
                            </p>
                            <p class="text-danger fw-bold mb-3 fs-6">
                                Rp {{ number_format($p->harga, 0, ',', '.') }}
                            </p>

                            <!-- Form tambah ke keranjang -->
                            <form class="add-to-cart-form" action="{{ route('keranjang.add', $p->id) }}" method="POST">
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
    @else
        <div class="alert alert-info rounded-3 shadow-sm">
            Produk Buah & Sayur masih kosong.
        </div>
    @endif
</div>

<!-- Toast Notifikasi -->
<div class="position-fixed bottom-0 end-0 p-3" style="z-index: 11">
    <div id="cartToast" class="toast align-items-center text-white bg-success border-0" role="alert" aria-live="assertive" aria-atomic="true">
        <div class="d-flex">
            <div class="toast-body">
                Produk berhasil ditambahkan ke keranjang!
            </div>
            <button type="button" class="btn-close btn-close-white me-2 m-auto" data-bs-dismiss="toast" aria-label="Close"></button>
        </div>
    </div>
</div>
@endsection

@push('scripts')
<script>
document.addEventListener('DOMContentLoaded', function () {
    const forms = document.querySelectorAll('.add-to-cart-form');

    forms.forEach(form => {
        form.addEventListener('submit', function (e) {
            e.preventDefault(); // cegah reload halaman

            const action = this.action;
            const token = this.querySelector('input[name="_token"]').value;

            fetch(action, {
                method: 'POST',
                headers: {
                    'X-CSRF-TOKEN': token,
                    'Accept': 'application/json',
                    'X-Requested-With': 'XMLHttpRequest',
                },
            })
            .then(response => response.json())
            .then(data => {
                // tampilkan toast
                const toastEl = document.getElementById('cartToast');
                const toast = new bootstrap.Toast(toastEl);
                toast.show();
            })
            .catch(err => console.error(err));
        });
    });
});
</script>
@endpush
