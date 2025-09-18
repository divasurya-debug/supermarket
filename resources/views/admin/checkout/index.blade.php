@extends('layouts.admin')

@section('title', 'Checkout Admin')

@section('content')
<div class="container my-4"> <!-- beri jarak dari tepi layar -->
    <div class="p-6 bg-white shadow rounded-lg">
        <h2 class="text-2xl font-bold mb-4">📋 Daftar Checkout</h2>

        <div class="overflow-x-auto">
            <table class="table-auto w-full border border-gray-200 text-center">
                <thead class="bg-purple-600 text-white">
                    <tr>
                        <th class="px-4 py-2 border">No</th>
                        <th class="px-4 py-2 border">Nama Customer</th>
                        <th class="px-4 py-2 border">Total</th>
                        <th class="px-4 py-2 border">Status</th>
                        <th class="px-4 py-2 border">Icon</th>
                        <th class="px-4 py-2 border">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($checkouts as $index => $checkout)
                        <tr class="hover:bg-gray-50">
                            <td class="px-4 py-2 border">{{ $index + 1 }}</td>
                            <td class="px-4 py-2 border">{{ $checkout->akun->nama ?? 'Customer tidak ditemukan' }}</td>
                            <td class="px-4 py-2 border">Rp {{ number_format($checkout->total_harga, 0, ',', '.') }}</td>

                            {{-- Status + Icon --}}
                            <td class="px-4 py-2 border 
                                @if($checkout->status == 'Selesai') text-green-600 
                                @elseif($checkout->status == 'Proses') text-yellow-500 
                                @elseif($checkout->status == 'Batal') text-red-600 
                                @endif">
                                {{ $checkout->status }}
                            </td>
                            <td class="px-4 py-2 border">
                                @if($checkout->status == 'Selesai')
                                    ✅
                                @elseif($checkout->status == 'Proses')
                                    ⌛
                                @elseif($checkout->status == 'Batal')
                                    ❌
                                @else
                                    ❔
                                @endif
                            </td>

                            {{-- Tombol Edit & Hapus --}}
                            <td class="px-4 py-2 border">
                                <a href="{{ route('admin.checkout.edit', $checkout->id_checkout) }}" 
                                   class="text-blue-500 hover:underline">Edit</a> |
                                <form action="{{ route('admin.checkout.destroy', $checkout->id_checkout) }}" 
                                      method="POST" class="inline">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="text-red-500 hover:underline"
                                        onclick="return confirm('Yakin ingin menghapus checkout ini?')">Hapus</button>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="6" class="px-4 py-2 border text-center">Belum ada data checkout</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
