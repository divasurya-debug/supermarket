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
      <a href="{{ route('admin.dashboard') }}" class="flex items-center w-full text-left p-2 rounded hover:bg-purple-600">
        🏠 <span class="ml-2">Dashboard</span>
      </a>
      <a href="{{ route('admin.brands.index') }}" class="flex items-center w-full text-left p-2 rounded hover:bg-purple-600">
        🏷️ <span class="ml-2">Brands</span>
      </a>
      <a href="{{ route('admin.kategori.index') }}" class="flex items-center w-full text-left p-2 rounded hover:bg-purple-600">
        📂 <span class="ml-2">Kategori</span>
      </a>
      <a href="{{ route('admin.produk.index') }}" class="flex items-center w-full text-left p-2 rounded hover:bg-purple-600">
        📦 <span class="ml-2">Produk</span>
      </a>
      <a href="{{ route('admin.diskon.index') }}" class="flex items-center w-full text-left p-2 rounded hover:bg-purple-600">
        💸 <span class="ml-2">Diskon</span>
      </a>
      <a href="{{ route('admin.banner.index') }}" class="flex items-center w-full text-left p-2 rounded hover:bg-purple-600">
        🖼️ <span class="ml-2">Banner</span>
      </a>
      
      <!-- Tambahan Menu -->
      <a href="{{ route('admin.keranjang.index') }}" class="flex items-center w-full text-left p-2 rounded hover:bg-purple-600">
        🛒 <span class="ml-2">Keranjang</span>
      </a>
      <a href="{{ route('admin.checkout.index') }}" class="flex items-center w-full text-left p-2 rounded hover:bg-purple-600">
        ✅ <span class="ml-2">Checkout</span>
      </a>
      <a href="{{ route('admin.akun.index') }}" class="flex items-center w-full text-left p-2 rounded hover:bg-purple-600">
        👤 <span class="ml-2">Akun Admin</span>
      </a>
       <a href="{{ route('admin.pengaturan') }}" class="flex items-center w-full text-left p-2 rounded hover:bg-purple-600">
        ⚙️ <span class="ml-2">Pengaturan</span>
      </a>

    </nav>
    <div class="p-4 border-t border-purple-700">
    <form action="{{ route('admin.logout') }}" method="POST">
        @csrf
        <button type="submit" class="w-full bg-red-600 hover:bg-red-700 py-2 rounded text-white">
            Logout
        </button>
    </form>
</div>

  </aside>

  <!-- Main Content -->
  <main class="flex-1 p-6 overflow-y-auto">
    @yield('content')
  </main>
</body>
</html>
