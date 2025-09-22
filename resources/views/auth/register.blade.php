@extends('layouts.app')

@section('title', 'Register')

@section('content')
<div class="container py-5" style="max-width: 500px;">
    <div class="card shadow-sm rounded-4">
        <div class="card-body p-4">
            <h3 class="fw-bold mb-4 text-center text-success">Register</h3>

            {{-- Error --}}
            @if ($errors->any())
                <div class="alert alert-danger rounded-3">
                    <ul class="mb-0">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form method="POST" action="{{ route('register') }}">
                @csrf
                <div class="mb-3">
                    <label>Nama</label>
                    <input type="text" name="name" class="form-control rounded-3" required>
                </div>

                <div class="mb-3">
                    <label>Email</label>
                    <input type="email" name="email" class="form-control rounded-3" required>
                </div>

                <div class="mb-3">
                    <label>Password</label>
                    <input type="password" name="password" class="form-control rounded-3" required>
                </div>

                <div class="mb-3">
                    <label>Konfirmasi Password</label>
                    <input type="password" name="password_confirmation" class="form-control rounded-3" required>
                </div>

                <div class="d-grid">
                    <button type="submit" class="btn btn-success rounded-pill">Register</button>
                </div>
            </form>

            <div class="mt-3 text-center">
                <small>Sudah punya akun? <a href="{{ route('login') }}" class="text-success fw-bold">Login</a></small>
            </div>
        </div>
    </div>
</div>
@endsection
