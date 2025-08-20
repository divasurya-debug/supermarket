@extends('layout')

@section('content')
<h2>Daftar Merek Produk</h2>
<table class="table table-striped">
    <thead class="table-dark">
        <tr>
            <th>ID</th>
            <th>Nama Merek</th>
            <th>Negara Asal</th>
            <th>Logo</th>
        </tr>
    </thead>
    <tbody>
        <tr>
            <td>1</td>
            <td>Nike</td>
            <td>USA</td>
            <td><img src="/storage/logo/nike.png" width="80"></td>
        </tr>
    </tbody>
</table>
@endsection
