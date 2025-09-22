@extends('layouts.app')

@section('content')
<h2>Keranjang Belanja</h2>
<ul>
    @foreach($cartItems as $item)
        <li>
            {{ $item->product->nama_produk }} (x{{ $item->jumlah }})
            Rp {{ number_format($item->product->harga * $item->jumlah, 0, ',', '.') }}
        </li>
    @endforeach
</ul>
@endsection
