<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>@yield('title', 'Supermarket')</title>

  <!-- Bootstrap 5 CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

  <style>
    /* ==== Sidebar Menu ==== */
    .offcanvas-body a {
        display: flex;
        align-items: center;
        padding: 12px 15px;
        font-size: 16px;
        text-decoration: none;
        color: #333;
        border-radius: 6px;
        transition: background 0.2s;
    }
    .offcanvas-body a:hover {
        background: #f1f1f1;
    }

    /* ==== Tombol Logout ==== */
    .logout-btn {
        background: red;
        color: #fff;
        border-radius: 6px;
        padding: 12px;
        text-align: center;
        display: block;
        width: 100%;
        margin-top: 20px;
        font-weight: bold;
        text-decoration: none;
    }
    .logout-btn:hover {
        background: darkred;
    }

    /* ==== Offcanvas Header ==== */
    .offcanvas-header {
        background: #6f42c1; /* purple bootstrap */
        color: #fff;
    }
    .offcanvas-title {
        font-size: 18px;
        font-weight: bold;
    }

    /* ==== Navbar ==== */
    .navbar-custom {
        background: #6f42c1; /* ungu */
    }
    .navbar-custom .navbar-brand,
    .navbar-custom .btn {
        color: #fff;
    }
    .navbar-custom .btn:hover {
        background: rgba(255,255,255,0.2);
    }
  </style>

  @stack('styles')
</head>
<body>
  <!-- Navbar -->
  <nav class="navbar navbar-custom px-3">
    <div class="container-fluid d-flex justify-content-between align-items-center">
      <a class="navbar-brand fw-bold" href="#">Supermarket Admin</a>
      <!-- Tombol menu (3 garis) -->
      <button class="btn" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasMenu">
        ☰
      </button>
    </div>
  </nav>

  <!-- Sidebar versi offcanvas -->
  <div class="offcanvas offcanvas-start" tabindex="-1" id="offcanvasMenu">
    <div class="offcanvas-header">
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

  <!-- Konten utama -->
  <div class="container py-4">
    @yield('content')
  </div>

  <!-- Bootstrap Bundle -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
  @stack('scripts')
</body>
</html>
