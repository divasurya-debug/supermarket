@extends('layouts.admin') {{-- pastikan file layout admin kamu namanya layouts/admin.blade.php --}}

@section('title', 'Daftar Banner')

@section('content')
    <h2 class="mb-4">Daftar Banner</h2>

    {{-- Pesan sukses --}}
    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <div class="row">
        @forelse($banners as $banner)
            <div class="col-md-4 mb-3">
                <img src="{{ asset($banner->gambar) }}" class="img-fluid rounded shadow" alt="Banner">
            </div>
        @empty
            <div class="col-12">
                <p class="text-muted text-center">Belum ada banner.</p>
            </div>
        @endforelse
    </div>
@endsection
