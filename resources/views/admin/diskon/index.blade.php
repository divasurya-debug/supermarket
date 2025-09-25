@extends('layouts.admin')

@section('title', 'Diskon Produk - Admin')

@section('content')
  <h1 class="text-3xl font-bold mb-6">Daftar Diskon Produk</h1>

  <!-- Tombol Tambah -->
  <div class="mb-4 flex justify-end">
    <a href="{{ route('admin.diskon.create') }}" 
       class="bg-purple-700 hover:bg-purple-800 text-white font-semibold py-2 px-4 rounded-lg shadow">
      + Tambah Diskon
    </a>
  </div>

  <!-- Alert Sukses -->
  @if (session('success'))
    <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative mb-4">
      {{ session('success') }}
    </div>
  @endif

  <!-- Tabel Data -->
  <div class="bg-white shadow-md rounded-lg overflow-hidden">
    <div class="overflow-x-auto">
      <table class="w-full table-auto">
        <thead class="bg-purple-700 text-white">
          <tr>
            <th class="px-6 py-4 text-left text-sm font-semibold uppercase">ID</th>
            <th class="px-6 py-4 text-left text-sm font-semibold uppercase">Nama Produk</th>
            <th class="px-6 py-4 text-left text-sm font-semibold uppercase">Diskon</th>
            <th class="px-6 py-4 text-left text-sm font-semibold uppercase">Tanggal Mulai</th>
            <th class="px-6 py-4 text-left text-sm font-semibold uppercase">Tanggal Akhir</th>
            <th class="px-6 py-4 text-center text-sm font-semibold uppercase">Aksi</th>
          </tr>
        </thead>
        <tbody class="divide-y divide-gray-200 text-gray-700">
          @forelse($discounts as $discount)
            <tr class="hover:bg-gray-50">
              <td class="px-6 py-4">{{ $discount->id_diskon }}</td>
              <td class="px-6 py-4 font-medium">
                {{ $discount->product->nama_produk ?? 'Produk Telah Dihapus' }}
              </td>
              <td class="px-6 py-4">
                <span class="bg-red-100 text-red-600 font-bold px-3 py-1 rounded-lg">
                  {{ $discount->persentase_diskon }}%
                </span>
              </td>
              <td class="px-6 py-4 text-gray-500 whitespace-nowrap">
                {{ optional($discount->tanggal_mulai)->format('d M Y') }}
              </td>
              <td class="px-6 py-4 text-gray-500 whitespace-nowrap">
                {{ optional($discount->tanggal_akhir)->format('d M Y') }}
              </td>
              <td class="px-6 py-4 text-center">
                <a href="{{ route('admin.diskon.edit', $discount->id_diskon) }}" 
                   class="bg-yellow-400 hover:bg-yellow-500 text-white font-semibold py-1 px-3 rounded mr-2">
                  Edit
                </a>
                <form action="{{ route('admin.diskon.destroy', $discount->id_diskon) }}" 
                      method="POST" 
                      class="inline-block"
                      onsubmit="return confirm('Apakah Anda yakin ingin menghapus diskon ini?');">
                  @csrf
                  @method('DELETE')
                  <button type="submit" 
                          class="bg-red-600 hover:bg-red-700 text-white font-semibold py-1 px-3 rounded">
                    Hapus
                  </button>
                </form>
              </td>
            </tr>
          @empty
            <tr>
              <td colspan="6" class="text-center py-10 text-gray-500">
                Belum ada data diskon.
              </td>
            </tr>
          @endforelse
        </tbody>
      </table>
    </div>
  </div>

  <!-- Pagination -->
  <div class="mt-6">
    @if ($discounts->hasPages())
      {{ $discounts->links() }}
    @endif
  </div>
@endsection
