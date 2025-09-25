<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1"> <!-- Penting! -->
    <title>@yield('title', 'Supermarket')</title>

    <!-- Bootstrap 5 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

    {{-- Tambahan untuk style custom --}}
    @stack('styles')
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark px-3">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">Supermarket Admin</a>
            
            <!-- Tombol Hamburger untuk mobile -->
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" 
                aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <!-- Menu navigasi -->
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item"><a href="/admin" class="nav-link">Admin</a></li>
                    <li class="nav-item"><a href="/brands" class="nav-link">Brands</a></li>
                    <li class="nav-item"><a href="/produk" class="nav-link">Produk</a></li>
                    <li class="nav-item"><a href="/diskon" class="nav-link">Diskon</a></li>
                    <li class="nav-item"><a href="/banner" class="nav-link">Banner</a></li>
                </ul>
            </div>
        </div>
    </nav>

    <div class="container py-4">
        @yield('content')
    </div>

    <!-- Bootstrap Bundle (dengan Popper) -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

    {{-- Tambahan untuk script custom --}}
    @stack('scripts')
</body>
</html>
