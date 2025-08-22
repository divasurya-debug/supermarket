@extends('layouts.admin')

@section('title', 'Tambah Banner')

@section('content')
<h1>Tambah Banner</h1>
<form action="{{ route('admin.banner.store') }}" method="POST">
    @csrf
    <label>Judul Banner:</label>
    <input type="text" name="title" required>
    <button type="submit">Simpan</button>
</form>
@endsection
