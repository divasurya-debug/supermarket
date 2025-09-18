<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register Admin</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">
    <style>
        body {
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            background: linear-gradient(135deg, #f9d976, #a1c4fd);
        }
        .register-card {
            background: #fff;
            border-radius: 20px;
            padding: 30px;
            width: 100%;
            max-width: 450px;
            box-shadow: 0px 8px 20px rgba(0,0,0,0.15);
        }
        .register-icon {
            font-size: 60px;
            color: #0d6efd;
            text-align: center;
            margin-bottom: 20px;
        }
        .form-control {
            border-radius: 30px;
            padding-left: 1rem;
            padding-right: 1rem;
        }
        .btn-register {
            border-radius: 30px;
            font-weight: bold;
            padding: 10px;
        }
        .extra-links {
            text-align: center;
            margin-top: 10px;
            font-size: 14px;
        }
    </style>
</head>
<body>

<div class="register-card">

    <div class="register-icon">
        <i class="bi bi-person-plus-fill"></i>
    </div>

    <h3 class="text-center mb-4 fw-bold">Daftar Admin Baru</h3>

    <!-- Alert Error -->
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul class="mb-0">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <!-- Alert Success -->
    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <form action="{{ route('admin.register.post') }}" method="POST">
        @csrf
        <div class="mb-3">
            <input type="text" name="username" class="form-control" placeholder="Username" required autofocus>
        </div>
        <div class="mb-3">
            <input type="email" name="email" class="form-control" placeholder="Email" required>
        </div>
        <div class="mb-3">
            <input type="password" name="password" class="form-control" placeholder="Password" required>
        </div>
        <div class="mb-3">
            <input type="password" name="password_confirmation" class="form-control" placeholder="Konfirmasi Password" required>
        </div>
        <button type="submit" class="btn btn-primary w-100 btn-register">DAFTAR</button>
    </form>

    <p class="text-center mt-3">
        Sudah punya akun? <a href="{{ route('admin.login') }}">Login di sini</a>
    </p>
</div>

</body>
</html>
