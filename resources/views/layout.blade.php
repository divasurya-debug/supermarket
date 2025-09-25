<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>@yield('title', 'Supermarket')</title>

  <!-- Bootstrap 5 CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

  <style>
    /* Tambahan styling biar sidebar rapi */
    .offcanvas-body a {
        display: flex;
        align-items: center;
        padding: 10px;
        text-decoration: none;
        color: #333;
        border-radius: 6px;
        transition: background 0.2s;
    }
    .offcanvas-body a:hover {
        background: #f1f1f1;
    }
    .logout-btn {
        background: red;
        color: #fff;
        border-radius: 6px;
        padding: 10px;
        text-align: center;
        display: block;
        margin-top: 15px;
        text-decoration: none;
    }
    .logout-btn:hover {
        background: darkred;
    }
  </style>

  @stack('styles')
</head>
<body>
  <!-- Navbar -->
  <nav class="navbar navbar-dark bg-dark px-3">
    <div class="container-fluid">
      <a class="navbar-brand" href="#">Supermarket Admin</a>

      <!-- Tombol titik tiga -->
      <button class="btn btn-dark" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasMenu">
        &#x22EE; <!-- simbol titik tiga vertikal -->
      </button>
    </div>
  </nav>

  <!-- Sidebar versi offcanvas -->
  <div class="offcanvas offcanvas-start" tabindex="-1" id="offcanvasMenu">
    <div class="offcanvas-header bg-purple text-white">
      <h5 class="offcanvas-title">Supermarket Admin</h5>
      <button type="button" class="btn-close btn-close-white" data-bs-dismiss="offcanvas"></button>
    </div>
    <div class="offcanvas-body">
      <a href="/admin">🏠 Dashboard</a>
      <a href="/brands">🏷 Brands</a>
      <a href="/kategori">📂 Kategori</a>
      <a href="/produk">🍎 Produk</a>
      <a href="/diskon">💸 Diskon</a>
      <a href="/banner">🖼 Banner</a>
      <a href="/keranjang">🛒 Keranjang</a>
      <a href="/checkout">✅ Checkout</a>
      <a href="/akun-admin">👤 Akun Admin</a>
      <a href="/pengaturan">⚙ Pengaturan</a>

      <a href="/logout" class="logout-btn">Logout</a>
    </div>
  </div>

  <div class="container py-4">
    @yield('content')
  </div>

  <!-- Bootstrap Bundle -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
  @stack('scripts')
</body>
</html>
