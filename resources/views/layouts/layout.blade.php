<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>@yield('title', 'Dashboard Admin Supermarket')</title>
  <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="flex h-screen bg-gray-100">
  <!-- Sidebar -->
  <aside class="w-64 bg-purple-800 text-white flex flex-col">
    <div class="p-6 text-2xl font-bold border-b border-purple-700">
      Supermarket Admin
    </div>
    <nav class="flex-1 p-4 space-y-2">
      <button onclick="showPage('dashboard')" class="flex items-center w-full text-left p-2 rounded hover:bg-purple-600">
        🏠 <span class="ml-2">Dashboard</span>
      </button>
      <button onclick="showPage('brands')" class="flex items-center w-full text-left p-2 rounded hover:bg-purple-600">
        🏷️ <span class="ml-2">Brands</span>
      </button>
      <button onclick="showPage('produk')" class="flex items-center w-full text-left p-2 rounded hover:bg-purple-600">
        📦 <span class="ml-2">Produk</span>
      </button>
      <button onclick="showPage('diskon')" class="flex items-center w-full text-left p-2 rounded hover:bg-purple-600">
        💸 <span class="ml-2">Diskon</span>
      </button>
      <button onclick="showPage('banner')" class="flex items-center w-full text-left p-2 rounded hover:bg-purple-600">
        🖼️ <span class="ml-2">Banner</span>
      </button>
      <button onclick="showPage('pengaturan')" class="flex items-center w-full text-left p-2 rounded hover:bg-purple-600">
        ⚙️ <span class="ml-2">Pengaturan</span>
      </button>
    </nav>
    <div class="p-4 border-t border-purple-700">
      <button class="w-full bg-red-600 hover:bg-red-700 py-2 rounded">Logout</button>
    </div>
  </aside>

  <!-- Main Content -->
  <main class="flex-1 p-6 overflow-y-auto">
      {{-- Semua section konten --}}
      <div id="dashboard" class="page">
        @yield('dashboard')
      </div>
      <div id="brands" class="page hidden">
        @yield('brands')
      </div>
      <div id="produk" class="page hidden">
        @yield('produk')
      </div>
      <div id="diskon" class="page hidden">
        @yield('diskon')
      </div>
      <div id="banner" class="page hidden">
        @yield('banner')
      </div>
      <div id="pengaturan" class="page hidden">
        @yield('pengaturan')
      </div>
  </main>

  <script>
    function showPage(pageId) {
      document.querySelectorAll('.page').forEach(p => p.classList.add('hidden'));
      document.getElementById(pageId).classList.remove('hidden');
    }
  </script>
</body>
</html>
