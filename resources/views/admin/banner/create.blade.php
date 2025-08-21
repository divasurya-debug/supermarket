@extends('layouts.admin')

@section('title', 'Tambah Banner')

@section('content')
<div class="container py-5">
    <div class="row justify-content-center">
        <div class="col-lg-6">

            <!-- Card Wrapper -->
            <div class="card shadow border-0 rounded-4" style="overflow: hidden;">
                <!-- Header -->
                <div class="card-header py-3 px-4 text-white" style="background: linear-gradient(135deg, #6f42c1, #9b59b6);">
                    <h4 class="fw-bold mb-0">
                        <i class="bi bi-image-fill me-2"></i> Tambah Banner
                    </h4>
                </div>

                <!-- Body -->
                <div class="card-body p-4 bg-light">

                    {{-- Error Message --}}
                    @if ($errors->any())
                        <div class="alert alert-danger rounded-3 shadow-sm mb-4">
                            <ul class="mb-0">
                                @foreach ($errors->all() as $error)
                                    <li>⚠️ {{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    <!-- Form -->
                    <form action="{{ route('admin.banner.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf

                        <!-- Input File -->
                        <div class="mb-4">
                            <label for="gambar" class="form-label fw-semibold">Upload Gambar Banner</label>
                            <input type="file" name="gambar" id="gambar" class="form-control border-1 shadow-sm" required>
                            <small class="text-muted">Format: JPG, PNG | Max: 2MB</small>
                        </div>

                        <!-- Tombol Action -->
<div class="d-flex justify-content-between gap-3 mt-4">
    <!-- Tombol Batal -->
    <a href="{{ route('admin.banner.index') }}" 
       class="btn flex-fill text-white shadow-sm rounded-pill px-4 py-2 text-center" 
       style="background-color: #9b59b6;">
        <i class="bi bi-arrow-left me-1"></i> Batal
    </a>

    <!-- Tombol Simpan -->
    <button type="submit" 
            class="btn flex-fill text-white shadow-sm rounded-pill px-4 py-2 text-center" 
            style="background: linear-gradient(135deg, #6f42c1, #9b59b6); border:none;">
        <i class="bi bi-check-circle me-1"></i> Simpan
    </button>
</div>

                    </form>

                </div>
            </div>
            <!-- End Card -->

        </div>
    </div>
</div>
@endsection
