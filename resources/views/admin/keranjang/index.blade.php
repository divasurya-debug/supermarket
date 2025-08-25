@extends('layouts.admin')

@section('title', 'Keranjang')
@section('content')
<div class="p-6 bg-white shadow rounded-lg">
    <h1 class="text-2xl font-bold mb-4">📦 Daftar Keranjang</h1>

    <table class="table-auto w-full border border-gray-200">
        <thead class="bg-gray-100">
            <tr>
                <th class="px-4 py-2 border">#</th>
                <th class="px-4 py-2 border">Nama Produk</th>
                <th class="px-4 py-2 border">Jumlah</th>
                <th class="px-4 py-2 border">Harga</th>
                <th class="px-4 py-2 border">Total</th>
                <th class="px-4 py-2 border">Aksi</th>
            </tr>
        </thead>
        <tbody>
            @forelse($keranjang as $index => $item)
            <tr>
                <td class="px-4 py-2 border">{{ $index + 1 }}</td>
                <td class="px-4 py-2 border">{{ $item->produk->nama_produk ?? '-' }}</td>
                <td class="px-4 py-2 border">{{ $item->jumlah }}</td>
                <td class="px-4 py-2 border">Rp {{ number_format($item->produk->harga ?? 0, 0, ',', '.') }}</td>
                <td class="px-4 py-2 border">Rp {{ number_format(($item->produk->harga ?? 0) * $item->jumlah, 0, ',', '.') }}</td>
                <td class="px-4 py-2 border">
                    <form action="{{ route('admin.keranjang.destroy', $item->id_keranjang) }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button class="bg-red-500 text-white px-2 py-1 rounded" onclick="return confirm('Yakin hapus?')">Hapus</button>
                    </form>
                </td>
            </tr>
            @empty
            <tr>
                <td colspan="6" class="text-center py-4">Belum ada data keranjang</td>
            </tr>
            @endforelse
        </tbody>
    </table>

    <div class="mt-4 text-right">
        <p class="text-lg font-bold">
            Total Keseluruhan: Rp {{ number_format($keranjang->sum(fn($k) => ($k->produk->harga ?? 0) * $k->jumlah), 0, ',', '.') }}
        </p>
    </div>
</div>
@endsection
