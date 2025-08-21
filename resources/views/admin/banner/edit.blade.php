@extends('layouts.admin')

@section('title', 'Edit Banner')

@section('content')
<div class="container py-5">
    <h2 class="mb-4 fw-bold">Edit Banner</h2>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul class="mb-0">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('admin.banner.update', $banner->id_banner) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label class="form-label fw-semibold">Gambar Banner Sekarang</label><br>
            <img src="{{ asset($banner->gambar) }}" alt="Banner" width="250" class="rounded shadow mb-3">
        </div>

        <div class="mb-3">
            <label for="gambar" class="form-label fw-semibold">Ganti Gambar (opsional)</label>
            <input type="file" name="gambar" id="gambar" class="form-control">
            <small class="text-muted">Kosongkan jika tidak ingin mengganti gambar.</small>
        </div>

        <button type="submit" class="btn btn-primary">Update</button>
        <a href="{{ route('admin.banner.index') }}" class="btn btn-secondary">Batal</a>
    </form>
</div>
@endsection
