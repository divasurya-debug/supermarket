@extends('layouts.app')
@section('title', 'Keranjang Belanja')

@section('content')
<div class="container py-5">
    <h2 class="fw-bold mb-4 text-success">🛒 Keranjang Belanja</h2>

    @if(empty($keranjang))
        <div class="alert alert-info rounded-3 shadow-sm">
            Keranjang kamu masih kosong. Yuk <a href="{{ route('home') }}" class="text-success fw-bold">belanja sekarang</a>!
        </div>
    @else
        <div class="table-responsive">
            <table class="table table-bordered align-middle shadow-sm bg-white">
                <thead class="table-success text-center">
                    <tr>
                        <th>No</th>
                        <th>Produk</th>
                        <th>Harga</th>
                        <th>Jumlah</th>
                        <th>Total</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($keranjang as $id => $item)
                    <tr>
                        <td class="text-center">{{ $loop->iteration }}</td>
                        <td>
                            <div class="d-flex align-items-center">
                                <img src="{{ asset($item['gambar'] ?? 'images/no-image.png') }}" 
                                     alt="{{ $item['nama_produk'] ?? '-' }}" 
                                     class="me-2 rounded" style="width: 60px; height: 60px; object-fit: contain;">
                                <span>{{ $item['nama_produk'] ?? '-' }}</span>
                            </div>
                        </td>
                        <td>Rp {{ number_format($item['harga'] ?? 0, 0, ',', '.') }}</td>
                        <td class="text-center">{{ $item['jumlah'] }}</td>
                        <td class="fw-bold text-success">
                            Rp {{ number_format(($item['harga'] ?? 0) * $item['jumlah'], 0, ',', '.') }}
                        </td>
                        <td class="text-center">
                            <form action="{{ route('keranjang.remove', $id) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-sm btn-danger rounded-pill shadow-sm"
                                        onclick="return confirm('Hapus produk dari keranjang?')">
                                    Hapus
                                </button>
                            </form>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

        {{-- Total Keseluruhan --}}
        <div class="text-end mt-4">
            <h4 class="fw-bold text-success">
                Total: Rp {{ number_format(collect($keranjang)->sum(fn($k) => ($k['harga'] ?? 0) * $k['jumlah']), 0, ',', '.') }}
            </h4>
            <a href="{{ route('checkout.index') }}" class="btn btn-lg btn-success rounded-pill shadow mt-2">
                Lanjutkan ke Checkout
            </a>
        </div>
    @endif
</div>
@endsection
