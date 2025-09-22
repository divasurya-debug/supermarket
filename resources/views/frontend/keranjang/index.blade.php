@extends('layouts.app')
@section('title', 'Keranjang Belanja')

@section('content')
<div class="container py-5">
    <h2 class="fw-bold mb-4 text-success">🛒 Keranjang Belanja</h2>

    @php
        // Gabungkan data produk dan jumlah dari session
        $cart_items = [];
        foreach ($keranjang as $id => $jumlah) {
            $produk = $produks->firstWhere('id', $id);
            if ($produk) {
                $cart_items[$id] = [
                    'nama' => $produk->nama,
                    'harga' => $produk->harga,
                    'gambar' => $produk->gambar,
                    'jumlah' => $jumlah,
                ];
            }
        }
    @endphp

    @if(empty($cart_items) || count($cart_items) === 0)
        <div class="alert alert-info rounded-3 shadow-sm">
            Keranjang kamu masih kosong. Yuk 
            <a href="{{ route('home') }}" class="text-success fw-bold">belanja sekarang</a>!
        </div>
    @else
        <div class="table-responsive">
            <table class="table table-bordered align-middle shadow-sm bg-white">
                <thead class="table-success text-center">
                    <tr>
                        <th style="width: 50px;">No</th>
                        <th>Produk</th>
                        <th style="width: 120px;">Harga</th>
                        <th style="width: 80px;">Jumlah</th>
                        <th style="width: 150px;">Total</th>
                        <th style="width: 100px;">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($cart_items as $id => $item)
                        <tr>
                            <td class="text-center">{{ $loop->iteration }}</td>
                            <td>
                                <div class="d-flex align-items-center">
                                    <img src="{{ asset($item['gambar'] ?? 'images/no-image.png') }}" 
                                         alt="{{ $item['nama'] ?? 'Produk' }}" 
                                         class="me-2 rounded border" 
                                         style="width: 60px; height: 60px; object-fit: contain;">
                                    <span class="fw-semibold">{{ $item['nama'] ?? '-' }}</span>
                                </div>
                            </td>
                            <td class="text-center">
                                Rp {{ number_format($item['harga'] ?? 0, 0, ',', '.') }}
                            </td>
                            <td class="text-center">
                                {{ $item['jumlah'] ?? 1 }}
                            </td>
                            <td class="fw-bold text-success text-center">
                                Rp {{ number_format(($item['harga'] ?? 0) * ($item['jumlah'] ?? 1), 0, ',', '.') }}
                            </td>
                            <td class="text-center">
                                <form action="{{ route('keranjang.remove', $id) }}" method="POST" class="d-inline">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" 
                                            class="btn btn-sm btn-danger rounded-pill shadow-sm"
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
                Total: Rp 
                {{ number_format(collect($cart_items)->sum(fn($k) => ($k['harga'] ?? 0) * ($k['jumlah'] ?? 1)), 0, ',', '.') }}
            </h4>
            <a href="{{ route('checkout.index') }}" class="btn btn-lg btn-success rounded-pill shadow mt-2">
                Lanjutkan ke Checkout
            </a>
        </div>
    @endif
</div>
@endsection
