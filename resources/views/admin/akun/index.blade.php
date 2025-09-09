@extends('layouts.admin')

@section('title', 'Profil Admin')

@section('content')
<div class="card shadow-sm rounded-4 border-0">
    <div class="card-body">
        {{-- Judul di tengah, agak lebih kecil --}}
        <h1 class="text-center fw-bold mb-5" style="font-size: 2.5rem; font-weight: 900;">
            <i class="fa-solid fa-user-shield text-primary me-3" style="font-size: 50px;"></i>
            Profil Admin
        </h1>

        <div class="row text-center">
            {{-- Nama --}}
            <div class="col-md-4 mb-4">
                <div class="p-3 border rounded-4 h-100 d-flex flex-column justify-content-center align-items-center" 
                     style="background: linear-gradient(135deg, #6f42c1, #d6a4f2); color: #fff;">
                    <i class="fa-solid fa-user-circle mb-2" style="font-size: 50px;"></i>
                    <h5 class="fw-bold mb-1">Nama</h5>
                    <p class="mb-0">{{ Auth::user()->name ?? 'Admin Default' }}</p>
                </div>
            </div>

            {{-- Email --}}
            <div class="col-md-4 mb-4">
                <div class="p-3 border rounded-4 h-100 d-flex flex-column justify-content-center align-items-center" 
                     style="background: linear-gradient(135deg, #198754, #70e000); color: #fff;">
                    <i class="fa-solid fa-envelope mb-2" style="font-size: 50px;"></i>
                    <h5 class="fw-bold mb-1">Email</h5>
                    <p class="mb-0">{{ Auth::user()->email ?? 'admin@example.com' }}</p>
                </div>
            </div>

            {{-- Role --}}
            <div class="col-md-4 mb-4">
                <div class="p-3 border rounded-4 h-100 d-flex flex-column justify-content-center align-items-center" 
                     style="background: linear-gradient(135deg, #0d6efd, #6ea8fe); color: #fff;">
                    <i class="fa-solid fa-shield-alt mb-2" style="font-size: 50px;"></i>
                    <h5 class="fw-bold mb-1">Role</h5>
                    <span class="badge bg-light text-dark fs-6 px-3 py-2">Administrator</span>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
