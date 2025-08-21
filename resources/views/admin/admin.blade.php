@extends('layout')

@section('content')
<h2>Daftar Admin</h2>
<table class="table table-bordered">
    <thead class="table-dark">
        <tr>
            <th>ID</th>
            <th>Username</th>
            <th>Email</th>
            <th>Dibuat</th>
        </tr>
    </thead>
    <tbody>
        <!-- Contoh data -->
        <tr>
            <td>1</td>
            <td>admin123</td>
            <td>admin@email.com</td>
            <td>2025-08-20</td>
        </tr>
    </tbody>
</table>
@endsection
