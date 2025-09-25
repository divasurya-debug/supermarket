@extends('layouts.admin')

@section('title', 'Diskon Produk - Admin')

@section('content')
  <div class="flex justify-between items-center mb-6">
    <h2 class="text-2xl font-bold">Daftar Diskon Produk</h2>
    <a href="{{ route('admin.diskon.create') }}" 
       class="bg-purple-700 text-white font-bold py-2 px-4 rounded hover:bg-purple-800">
      + Tambah Diskon
    </a>
  </div>

  {{-- Alert Sukses --}}
  @if (session('success'))
    <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative mb-4" role="alert">
      <span class="block sm:inline">{{ session('success') }}</span>
    </div>
  @endif

  <div class="bg-white shadow-md rounded-lg overflow-hidden">
    <table class="w-full table-auto">
      <thead class="bg-purple-700 text-white">
        <tr>
          <th class="px-4 py-3 text-left text-xs font-medium uppercase tracking-wider">Nama Produk</th>
          <th class="px-4 py-3 text-left text-xs font-medium uppercase tracking-wider">Diskon</th>
          <th class="px-4 py-3 text-left text-xs font-medium uppercase tracking-wider">Tanggal Mulai</th>
          <th class="px-4 py-3 text-left text-xs font-medium uppercase tracking-wider">Tanggal Akhir</th>
          <th class="px-4 py-3 text-left text-xs font-medium uppercase tracking-wider">Aksi</th>
        </tr>
      </thead>
      <tbody class="divide-y divide-gray-200">
        @forelse($discounts as $discount)
          <tr class="hover:bg-gray-50">
            <td class="px-4 py-4 whitespace-nowrap font-medium text-gray-900">
              {{ $discount->product->nama_produk ?? 'Produk Telah Dihapus' }}
            </td>
            <td class="px-4 py-4 whitespace-nowrap">
              <span class="bg-red-100 text-red-600 font-bold px-2 py-1 rounded">
                {{ $discount->persentase_diskon }}%
              </span>
            </td>
            <td class="px-4 py-4 whitespace-nowrap text-gray-500">
              {{ optional($discount->tanggal_mulai)->format('d M Y') }}
            </td>
            <td class="px-4 py-4 whitespace-nowrap text-gray-500">
              {{ optional($discount->tanggal_akhir)->format('d M Y') }}
            </td>
            <td class="px-4 py-4 whitespace-nowrap text-sm font-medium">
              <a href="{{ route('admin.diskon.edit', $discount->id_diskon) }}" 
                 class="text-indigo-600 hover:text-indigo-900 mr-4">Edit</a>
              <form action="{{ route('admin.diskon.destroy', $discount->id_diskon) }}" 
                    method="POST" 
                    class="inline-block" 
                    onsubmit="return confirm('Apakah Anda yakin ingin menghapus diskon ini?');">
                @csrf
                @method('DELETE')
                <button type="submit" class="text-red-600 hover:text-red-900">Hapus</button>
              </form>
            </td>
          </tr>
        @empty
          <tr>
            <td colspan="5" class="text-center py-10 text-gray-500">
              Belum ada data diskon.
            </td>
          </tr>
        @endforelse
      </tbody>
    </table>
  </div>

  {{-- Pagination --}}
  <div class="mt-6">
    @if ($discounts->hasPages())
      {{ $discounts->links() }}
    @endif
  </div>
@endsection
