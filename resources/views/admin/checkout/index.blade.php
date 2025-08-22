@extends('layouts.admin')

@section('title', 'Checkout Admin')

@section('content')
<div class="container">
    <h1 class="text-2xl font-bold mb-4">Halaman Checkout (Admin)</h1>

    <div class="card mt-4 p-4 shadow rounded">
        <h2 class="text-lg font-semibold">Daftar Checkout</h2>

        <table class="table-auto w-full mt-3 border">
            <thead>
                <tr class="bg-gray-200">
                    <th class="px-4 py-2 border">No</th>
                    <th class="px-4 py-2 border">Nama Customer</th>
                    <th class="px-4 py-2 border">Total</th>
                    <th class="px-4 py-2 border">Status</th>
                    <th class="px-4 py-2 border">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @forelse($checkouts as $index => $checkout)
                <tr>
                    <td class="border px-4 py-2">{{ $index + 1 }}</td>
                    <td class="border px-4 py-2">{{ $checkout->akun->nama ?? 'Customer tidak ditemukan' }}</td>
                    <td class="border px-4 py-2">Rp {{ number_format($checkout->total_harga, 0, ',', '.') }}</td>
                    <td class="border px-4 py-2">{{ $checkout->status }}</td>
                    <td class="border px-4 py-2">
                        <a href="{{ route('admin.checkout.edit', $checkout->id_checkout) }}" class="text-blue-500 hover:underline">Edit</a> |
                        <form action="{{ route('admin.checkout.destroy', $checkout->id_checkout) }}" method="POST" class="inline">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="text-red-500 hover:underline"
                                onclick="return confirm('Yakin ingin menghapus checkout ini?')">Hapus</button>
                        </form>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="5" class="border px-4 py-2 text-center">Belum ada data checkout</td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
@endsection
