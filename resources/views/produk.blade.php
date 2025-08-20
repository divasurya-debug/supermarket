@extends('layout')

@section('content')
<h2>Daftar Produk</h2>
<table class="table table-hover">
    <thead class="table-dark">
        <tr>
            <th>ID</th>
            <th>Nama Produk</th>
            <th>Brand</th>
            <th>Harga</th>
            <th>Stok</th>
            <th>Deskripsi</th>
            <th>Gambar</th>
        </tr>
    </thead>
    <tbody>
        <tr>
            <td>1</td>
            <td>Sneakers AirMax</td>
            <td>Nike</td>
            <td>Rp 1.200.000</td>
            <td>20</td>
            <td>Sepatu olahraga ringan dan nyaman</td>
            <td><img src="/storage/produk/airmax.jpg" width="80"></td>
        </tr>
    </tbody>
</table>
@endsection
