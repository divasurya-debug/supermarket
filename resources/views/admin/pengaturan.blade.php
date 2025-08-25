@extends('layouts.admin')

@section('title', 'Pengaturan')

@section('content')
@php
    $admin = Auth::guard('admin')->user();
@endphp

<div class="p-6 bg-white rounded shadow">
    <h1 class="text-2xl font-bold mb-4">Halaman Pengaturan Supermarket</h1>
    <p class="mb-6 text-gray-600">Atur informasi dan konfigurasi untuk dashboard web supermarket.</p>

    <!-- Informasi Admin yang Login -->
    <div class="mb-8">
        <h2 class="text-xl font-semibold mb-3">Akun Admin</h2>

        @if($admin)
        <form action="{{ route('admin.akun.update', $admin->id) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="mb-3">
                <label class="block font-medium">Username</label>
                <input type="text" name="username" value="{{ $admin->username }}" class="w-full border rounded p-2" required>
            </div>

            <div class="mb-3">
                <label class="block font-medium">Email</label>
                <input type="email" name="email" value="{{ $admin->email }}" class="w-full border rounded p-2" required>
            </div>

            <div class="mb-3">
                <label class="block font-medium">Password (Kosongkan jika tidak diganti)</label>
                <input type="password" name="password" class="w-full border rounded p-2">
            </div>

            <button type="submit" class="px-4 py-2 bg-green-600 text-white rounded">Update Akun</button>
        </form>
        @else
        <p class="text-red-500">Admin belum login.</p>
        @endif
    </div>

@endsection
