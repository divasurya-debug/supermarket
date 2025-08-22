<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Klik Supermarket</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Bootstrap Icons -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css" rel="stylesheet">

    <style>
        /* Supaya dropdown muncul saat hover */
        .nav-item.dropdown:hover .dropdown-menu {
            display: block;
            margin-top: 0; /* biar rapet ke navbar */
        }
    </style>
</head>
<body class="bg-light">

    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-light bg-white shadow-sm">
        <div class="container">
            <!-- Logo -->
            <a class="navbar-brand fw-bold text-primary" href="#">KlikSupermarket</a>

            <!-- Kategori dengan Dropdown -->
            <ul class="navbar-nav ms-3">
                <li class="nav-item dropdown">
                    <a class="nav-link text-dark fw-semibold dropdown-toggle"
                    href="#"
                    id="kategoriDropdown"
                    role="button"
                    data-bs-toggle="dropdown"
                    aria-expanded="false">
                        Kategori <i class="bi bi-caret-down-fill ms-1"></i>
                    </a>
                    <ul class="dropdown-menu" aria-labelledby="kategoriDropdown">
                        @foreach($kategori as $cat)
                            <li>
                                <a class="dropdown-item" href="#">{{ $cat->nama_kategori }}</a>
                            </li>
                        @endforeach
                    </ul>
                </li>
            </ul>


            <!-- Search -->
            <form class="d-flex ms-auto">
                <input class="form-control me-2" type="search" placeholder="Cari produk...">
                <button class="btn btn-outline-primary">Cari</button>
            </form>

            <!-- Buttons -->
            <div class="ms-3">
                <button class="btn btn-primary btn-sm">Masuk</button>
                <button class="btn btn-outline-primary btn-sm">Daftar</button>
            </div>
        </div>
    </nav>

    <!-- Content -->
    <main class="py-4">
        @yield('content')
    </main>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
