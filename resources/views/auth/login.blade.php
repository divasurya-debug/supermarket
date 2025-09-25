@extends('layouts.app')

@section('title', 'Login')

@section('content')
<div class="container py-5">
    <div class="row justify-content-center">
        <div class="col-12 col-sm-10 col-md-8 col-lg-6 col-xl-5">
            <div class="card shadow-sm rounded-4">
                <div class="card-body p-4">
                    <h3 class="fw-bold mb-4 text-center text-success">Login</h3>

                    {{-- Pesan error --}}
                    @if ($errors->any())
                        <div class="alert alert-danger rounded-3">
                            <ul class="mb-0">
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    <form method="POST" action="{{ route('login') }}">
                        @csrf

                        {{-- Email --}}
                        <div class="mb-3">
                            <label for="email" class="form-label">Email</label>
                            <input id="email" type="email" 
                                   class="form-control rounded-3 @error('email') is-invalid @enderror" 
                                   name="email" value="{{ old('email') }}" required autofocus>
                        </div>

                        {{-- Password --}}
                        <div class="mb-3">
                            <label for="password" class="form-label">Password</label>
                            <input id="password" type="password" 
                                   class="form-control rounded-3 @error('password') is-invalid @enderror" 
                                   name="password" required>
                        </div>

                        {{-- Tombol --}}
                        <div class="d-grid">
                            <button type="submit" class="btn btn-success rounded-pill shadow-sm">
                                Login
                            </button>
                        </div>
                    </form>

                    <div class="mt-3 text-center">
                        <small>
                            Belum punya akun? <a href="#" class="text-success fw-bold">Register</a>
                        </small>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
