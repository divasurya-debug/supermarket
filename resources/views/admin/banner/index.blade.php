@extends('layouts.admin')

@section('title', 'Daftar Banner')

@section('content')
    <h2 class="mb-5 text-start fw-bolder" 
        style="font-size: 2.2rem; font-weight: bold;">
        Daftar Banner
    </h2>

    {{-- Pesan sukses --}}
    @if(session('success'))
        <div class="alert alert-success mb-4 text-center fs-5 fw-bold">
            {{ session('success') }}
        </div>
    @endif

    <div class="table-responsive">
        <table class="table table-bordered text-center align-middle shadow-sm" 
               style="border-spacing: 0 15px; border-collapse: separate; font-size: 1.1rem;">
            <thead style="background-color: #6a1b9a; color: white; font-size: 1.2rem;">
                <tr>
                    <th class="px-5 py-4">ID</th>
                    <th class="px-5 py-4">Nama Banner</th>
                    <th class="px-5 py-4">Deskripsi</th>
                    <th class="px-5 py-4">Gambar</th>
                </tr>
            </thead>
            <tbody>
                @forelse($banners as $banner)
                    <tr>
                        <td class="px-5 py-4">{{ $banner->id }}</td>
                        <td class="px-5 py-4">{{ $banner->nama ?? '-' }}</td>
                        <td class="px-5 py-4">{{ $banner->deskripsi ?? '-' }}</td>
                        <td class="px-5 py-4">
                            <img src="{{ asset($banner->gambar) }}" 
                                 alt="{{ $banner->nama ?? 'Banner' }}" 
                                 style="width:300px; height:180px; object-fit:cover;" 
                                 class="rounded shadow">
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="4" class="text-muted py-5 fs-5">Belum ada banner.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
@endsection
