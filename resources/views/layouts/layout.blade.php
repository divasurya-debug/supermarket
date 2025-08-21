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
      <a href="{{ route('admin.dashboard') }}"
         class="flex items-center w-full text-left p-2 rounded hover:bg-purple-600 {{ request()->routeIs('admin.dashboard') ? 'bg-purple-700' : '' }}">
        🏠 <span class="ml-2">Dashboard</span>
      </a>
      <a href="{{ route('admin.brands') }}"
         class="flex items-center w-full text-left p-2 rounded hover:bg-purple-600 {{ request()->routeIs('admin.brands') ? 'bg-purple-700' : '' }}">
        🏷️ <span class="ml-2">Brands</span>
      </a>
     <a href="{{ route('admin.produk.index') }}"
         class="flex items-center w-full text-left p-2 rounded hover:bg-purple-600 {{ request()->routeIs('admin.produk') ? 'bg-purple-700' : '' }}">
        📦 <span class="ml-2">Produk</span>
      </a>
      <a href="{{ route('admin.diskon') }}"
         class="flex items-center w-full text-left p-2 rounded hover:bg-purple-600 {{ request()->routeIs('admin.diskon') ? 'bg-purple-700' : '' }}">
        💸 <span class="ml-2">Diskon</span>
      </a>
      <a href="{{ route('admin.banner.index') }}"
         class="flex items-center w-full text-left p-2 rounded hover:bg-purple-600 {{ request()->routeIs('admin.banner.*') ? 'bg-purple-700' : '' }}">
        🖼️ <span class="ml-2">Banner</span>
      </a>
    </nav>
    <div class="p-4 border-t border-purple-700">
      <button class="w-full bg-red-600 hover:bg-red-700 py-2 rounded">Logout</button>
    </div>
  </aside>

  <!-- Main Content -->
  <main class="flex-1 p-6 overflow-y-auto">
    @yield('content')
  </main>
</body>
</html>
