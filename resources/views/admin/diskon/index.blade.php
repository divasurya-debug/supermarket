<div class="bg-white shadow-md rounded-lg overflow-hidden">
  <div class="overflow-x-auto"> {{-- Tambahan agar tabel bisa di-scroll di HP --}}
    <table class="w-full table-auto min-w-[600px]">
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
</div>
