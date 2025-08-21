@extends('layout')

@section('content')
<h2>Daftar Diskon Produk</h2>
<table class="table table-striped">
    <thead class="table-dark">
        <tr>
            <th>ID</th>
            <th>Produk</th>
            <th>Diskon (%)</th>
            <th>Mulai</th>
            <th>Akhir</th>
        </tr>
    </thead>
    <tbody>
        <tr>
            <td>1</td>
            <td>Sneakers AirMax</td>
            <td>20%</td>
            <td>2025-08-15</td>
            <td>2025-08-30</td>
        </tr>
    </tbody>
</table>
@endsection
