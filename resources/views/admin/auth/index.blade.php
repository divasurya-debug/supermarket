<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard Admin</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">

<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <div class="container">
        <a class="navbar-brand fw-bold" href="{{ route('admin.dashboard') }}">Admin Panel</a>
        <form action="{{ route('admin.logout') }}" method="POST" class="d-inline">
            @csrf
            <button type="submit" class="btn btn-danger btn-sm">Logout</button>
        </form>
    </div>
</nav>

<div class="container py-5">
    <div class="card shadow-lg border-0">
        <div class="card-body">
            <h2 class="fw-bold mb-3">Selamat Datang, {{ Auth::guard('admin')->user()->username ?? 'Admin' }}</h2>
            <p class="text-muted">Ini adalah dashboard admin. Dari sini Anda bisa mengelola produk, kategori, banner, diskon, dan lainnya.</p>

            <div class="row mt-4">
                <div class="col-md-3">
                    <div class="card text-center shadow-sm">
                        <div class="card-body">
                            <h5 class="fw-bold">Produk</h5>
                            <a href="{{ route('admin.produk.index') }}" class="btn btn-outline-primary btn-sm mt-2">Kelola</a>
                        </div>
                    </div>
                </div>

                <div class="col-md-3">
                    <div class="card text-center shadow-sm">
                        <div class="card-body">
                            <h5 class="fw-bold">Kategori</h5>
                            <a href="{{ route('admin.kategori.index') }}" class="btn btn-outline-primary btn-sm mt-2">Kelola</a>
                        </div>
                    </div>
                </div>

                <div class="col-md-3">
                    <div class="card text-center shadow-sm">
                        <div class="card-body">
                            <h5 class="fw-bold">Banner</h5>
                            <a href="{{ route('admin.banner.index') }}" class="btn btn-outline-primary btn-sm mt-2">Kelola</a>
                        </div>
                    </div>
                </div>

                <div class="col-md-3">
                    <div class="card text-center shadow-sm">
                        <div class="card-body">
                            <h5 class="fw-bold">Diskon</h5>
                            <a href="{{ route('admin.diskon.index') }}" class="btn btn-outline-primary btn-sm mt-2">Kelola</a>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>

</body>
</html>
