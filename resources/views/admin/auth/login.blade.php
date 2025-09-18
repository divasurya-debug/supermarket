<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Admin</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
        body {
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            background: linear-gradient(135deg, #f9d976, #a1c4fd);
        }

        .login-card {
            background: #fff;
            border-radius: 20px;
            padding: 30px;
            width: 100%;
            max-width: 400px;
            box-shadow: 0px 8px 20px rgba(0,0,0,0.15);
        }

        .login-icon {
            font-size: 60px;
            color: #0d6efd;
            text-align: center;
            margin-bottom: 20px;
        }

        .form-control {
            border-radius: 30px;
            padding-left: 1rem; /* kembalikan normal */
            padding-right: 1rem;
        }

        .btn-login {
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

<div class="login-card">

    <div class="login-icon">
        <i class="bi bi-people-fill"></i>
    </div>

    <h3 class="text-center mb-4 fw-bold">Login Admin</h3>

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

    <form action="{{ route('admin.login.post') }}" method="POST">
        @csrf
        <div class="mb-3">
            <input type="text" name="username" class="form-control" placeholder="Username" required autofocus>
        </div>
        <div class="mb-3">
            <input type="password" name="password" class="form-control" placeholder="Password" required>
        </div>
        <button type="submit" class="btn btn-primary w-100 btn-login">LOGIN</button>
    </form>

    <p class="text-center mt-3">
        Belum punya akun? <a href="{{ route('admin.register') }}">Daftar di sini</a>
    </p>
</div>

<!-- Bootstrap Icon (tetap boleh dipakai untuk logo atas) -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">
</body>
</html>
