<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Dashboard Admin Supermarket</title>
  <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="flex h-screen bg-gray-100">
  <!-- Sidebar -->
  <aside class="w-64 bg-purple-800 text-white flex flex-col">
    <div class="p-6 text-2xl font-bold border-b border-purple-700">
      Supermarket Admin
    </div>
    <nav class="flex-1 p-4 space-y-2">
      <a href="{{ route('admin.dashboard') }}" class="flex items-center p-2 rounded hover:bg-purple-600">
        🏠 <span class="ml-2">Dashboard</span>
      </a>
      <a href="{{ route('admin.brands') }}" class="flex items-center p-2 rounded hover:bg-purple-600">
        🏷️ <span class="ml-2">Brands</span>
      </a>
      <a href="{{ route('admin.produk') }}" class="flex items-center p-2 rounded hover:bg-purple-600">
        📦 <span class="ml-2">Produk</span>
      </a>
      <a href="{{ route('admin.diskon') }}" class="flex items-center p-2 rounded hover:bg-purple-600">
        💸 <span class="ml-2">Diskon</span>
      </a>
      <a href="{{ route('admin.banner.index') }}" class="flex items-center p-2 rounded hover:bg-purple-600">
        🖼️ <span class="ml-2">Banner</span>
      </a>
      <a href="#" class="flex items-center p-2 rounded hover:bg-purple-600">
        ⚙️ <span class="ml-2">Pengaturan</span>
      </a>
    </nav>
    <div class="p-4 border-t border-purple-700">
      <button class="w-full bg-red-600 hover:bg-red-700 py-2 rounded">Logout</button>
    </div>
  </aside>

  <!-- Main Content -->
  <main class="flex-1 p-6 overflow-y-auto">
    <h1 class="text-3xl font-bold mb-6">Dashboard Admin Supermarket</h1>

    <!-- Statistik -->
    <div class="grid grid-cols-1 md:grid-cols-4 gap-6 mb-6">
      <div class="bg-white p-4 rounded-lg shadow">
        <h2 class="text-gray-500">Total Produk</h2>
        <p class="text-2xl font-bold">1,250</p>
      </div>
      <div class="bg-white p-4 rounded-lg shadow">
        <h2 class="text-gray-500">Brands</h2>
        <p class="text-2xl font-bold">45</p>
      </div>
      <div class="bg-white p-4 rounded-lg shadow">
        <h2 class="text-gray-500">Diskon Aktif</h2>
        <p class="text-2xl font-bold">12</p>
      </div>
      <div class="bg-white p-4 rounded-lg shadow">
        <h2 class="text-gray-500">Banner</h2>
        <p class="text-2xl font-bold">5</p>
      </div>
    </div>

    <!-- Tabel Produk -->
    <div class="bg-white rounded-lg shadow p-4">
      <div class="flex justify-between items-center mb-4">
        <h2 class="text-xl font-semibold">Daftar Produk</h2>
        <button class="bg-green-600 hover:bg-green-700 text-white px-4 py-2 rounded">+ Tambah Produk</button>
      </div>
      <table class="w-full border-collapse">
        <thead>
          <tr class="bg-gray-200 text-left">
            <th class="p-2 border">ID</th>
            <th class="p-2 border">Nama Produk</th>
            <th class="p-2 border">Brand</th>
            <th class="p-2 border">Harga</th>
            <th class="p-2 border">Stok</th>
            <th class="p-2 border">Aksi</th>
          </tr>
        </thead>
        <tbody>
          <tr>
            <td class="p-2 border">1</td>
            <td class="p-2 border">Minyak Goreng</td>
            <td class="p-2 border">Brand A</td>
            <td class="p-2 border">Rp 15.000</td>
            <td class="p-2 border">120</td>
            <td class="p-2 border">
              <button class="bg-blue-600 hover:bg-blue-700 text-white px-2 py-1 rounded">Edit</button>
              <button class="bg-red-600 hover:bg-red-700 text-white px-2 py-1 rounded">Hapus</button>
            </td>
          </tr>
          <tr>
            <td class="p-2 border">2</td>
            <td class="p-2 border">Beras Premium</td>
            <td class="p-2 border">Brand B</td>
            <td class="p-2 border">Rp 120.000</td>
            <td class="p-2 border">80</td>
            <td class="p-2 border">
              <button class="bg-blue-600 hover:bg-blue-700 text-white px-2 py-1 rounded">Edit</button>
              <button class="bg-red-600 hover:bg-red-700 text-white px-2 py-1 rounded">Hapus</button>
            </td>
          </tr>
        </tbody>
      </table>
    </div>
  </main>
</body>
</html>
