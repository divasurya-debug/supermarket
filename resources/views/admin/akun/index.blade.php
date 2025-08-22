{{-- resources/views/admin/akun/index.blade.php --}}
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Akun Admin</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">

    <div class="container d-flex justify-content-center align-items-center vh-100">
        <div class="card shadow-lg rounded-4 w-100" style="max-width: 500px;">
            
            {{-- Header --}}
            <div class="card-header bg-primary text-white text-center rounded-top-4">
                <h3 class="mb-0">👤 Profil Admin</h3>
            </div>

            {{-- Body --}}
            <div class="card-body">
                <p><strong>Nama:</strong> {{ Auth::user()->name ?? 'Admin Default' }}</p>
                <p><strong>Email:</strong> {{ Auth::user()->email ?? 'admin@example.com' }}</p>
                <p><strong>Role:</strong> Administrator</p>
            </div>

            {{-- Footer --}}
            <div class="card-footer text-center bg-white rounded-bottom-4">
                <form id="logout-form" action="{{ route('logout') }}" method="POST">
                    @csrf
                    <button type="submit" class="btn btn-danger px-4">
                        Logout
                    </button>
                </form>
            </div>

        </div>
    </div>

</body>
</html>
