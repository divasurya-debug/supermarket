<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>@yield('title', 'Supermarket')</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

    {{-- Tambahan untuk style custom --}}
    @stack('styles')
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark px-3">
        <a class="navbar-brand" href="#">Supermarket Admin</a>
        <div class="collapse navbar-collapse">
            <ul class="navbar-nav ms-auto">
                <li class="nav-item"><a href="/admin" class="nav-link">Admin</a></li>
                <li class="nav-item"><a href="/brands" class="nav-link">Brands</a></li>
                <li class="nav-item"><a href="/produk" class="nav-link">Produk</a></li>
                <li class="nav-item"><a href="/diskon" class="nav-link">Diskon</a></li>
                <li class="nav-item"><a href="/banner" class="nav-link">Banner</a></li>
            </ul>
        </div>
    </nav>

    <div class="container py-4">
        @yield('content')
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

    {{-- Tambahan untuk script custom --}}
    @stack('scripts')
</body>
</html>
