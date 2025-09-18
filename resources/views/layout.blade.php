<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <title>KlikSupermarket</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet" />
    <style>
      /* Kamu bisa masukkan style CSS yang global di sini */
    </style>
</head>
<body>
    <nav class="navbar navbar-expand-lg sticky-top shadow-sm navbar-custom">
        <div class="container">
            <a class="navbar-brand fw-bold fs-3 text-white" href="#">
                <i class="bi bi-basket2-fill me-2"></i> KlikSupermarket
            </a>
            <button class="navbar-toggler border-0" type="button" data-bs-toggle="collapse" data-bs-target="#navbarContent">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarContent">
                @yield('navbar') <!-- Kalau mau bikin section navbar dinamis, atau langsung hardcode navbar di sini -->
            </div>
        </div>
    </nav>

    <div class="page-wrapper">
        @yield('content')
    </div>

    <footer class="footer-custom">
      <!-- Footer seperti yang kamu punya -->
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
