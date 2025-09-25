<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>@yield('title', 'Dashboard Admin Supermarket')</title>

  <!-- Tailwind CSS CDN -->
  <script src="https://cdn.tailwindcss.com"></script>

  <!-- Sidebar Toggle Script -->
  <script>
    function toggleSidebar() {
      const sidebar = document.getElementById('sidebar');
      const overlay = document.getElementById('overlay');
      sidebar.classList.toggle('-translate-x-full');
      overlay.classList.toggle('hidden');
    }

    function closeSidebar() {
      document.getElementById('sidebar').classList.add('-translate-x-full');
      document.getElementById('overlay').classList.add('hidden');
    }
  </script>
</head>
<body class="bg-gray-100 min-h-screen flex flex-col">

  <!-- Navbar (Mobile Only) -->
  <header class="bg-purple-800 text-white flex items-center justify-between px-6 py-4 md:hidden">
    <h1 class="text-lg font-bold">Supermarket Admin</h1>
    <button onclick="toggleSidebar()" class="text-2xl">☰</button>
  </header>

  <!-- Overlay (Mobile Only) -->
  <div id="overlay" onclick="closeSidebar()" class="fixed inset-0 bg-black bg-opacity-50 z-40 hidden md:hidden"></div>

  <!-- Wrapper -->
  <div class="flex flex-1 min-h-screen">

    <!-- Sidebar -->
    <aside id="sidebar"
      class="bg-purple-800 text-white w-64 space-y-2 p-4 fixed inset-y-0 left-0 z-50 transform -translate-x-full md:relative md:translate-x-0 transition-transform duration-300 ease-in-out h-full">

      <!-- Sidebar Header -->
      <div class="text-2xl font-bold mb-4 border-b border-purple-700 pb-2 flex justify-between items-center">
        Supermarket Admin
        <button onclick="closeSidebar()" class="md:hidden text-xl">✖</button>
      </div>

      <!-- Navigation Links -->
      <nav class="space-y-2">
        <a href="{{ route('admin.dashboard') }}" class="flex items-center p-2 rounded hover:bg-purple-600">🏠 <span class="ml-2">Dashboard</span></a>
        <a href="{{ route('admin.brands.index') }}" class="flex items-center p-2 rounded hover:bg-purple-600">🏷️ <span class="ml-2">Brands</span></a>
        <a href="{{ route('admin.kategori.index') }}" class="flex items-center p-2 rounded hover:bg-purple-600">📂 <span class="ml-2">Kategori</span></a>
        <a href="{{ route('admin.produk.index') }}" class="flex items-center p-2 rounded hover:bg-purple-600">📦 <span class="ml-2">Produk</span></a>
        <a href="{{ route('admin.diskon.index') }}" class="flex items-center p-2 rounded hover:bg-purple-600">💸 <span class="ml-2">Diskon</span></a>
        <a href="{{ route('admin.banner.index') }}" class="flex items-center p-2 rounded hover:bg-purple-600">🖼️ <span class="ml-2">Banner</span></a>
        <a href="{{ route('admin.keranjang.index') }}" class="flex items-center p-2 rounded hover:bg-purple-600">🛒 <span class="ml-2">Keranjang</span></a>
        <a href="{{ route('admin.checkout.index') }}" class="flex items-center p-2 rounded hover:bg-purple-600">✅ <span class="ml-2">Checkout</span></a>
        <a href="{{ route('admin.akun.index') }}" class="flex items-center p-2 rounded hover:bg-purple-600">👤 <span class="ml-2">Akun Admin</span></a>
        <a href="{{ route('admin.pengaturan') }}" class="flex items-center p-2 rounded hover:bg-purple-600">⚙️ <span class="ml-2">Pengaturan</span></a>
      </nav>

      <!-- Logout Button -->
      <form action="{{ route('admin.logout') }}" method="POST" class="pt-4">
        @csrf
        <button type="submit" class="w-full bg-red-600 hover:bg-red-700 py-2 rounded text-white">
          Logout
        </button>
      </form>
    </aside>

    <!-- Main Content -->
    <main class="flex-1 p-4 md:p-6 overflow-auto">
      @yield('content')
    </main>
  </div>
</body>
</html>
