
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - Sistem Akademik</title>

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">

    <div class="container">
        <div class="row justify-content-center align-items-center min-vh-100">
            <div class="col-md-5 col-lg-4">

                <div class="card shadow border-0">
                    <div class="card-body p-4">

                        <h3 class="text-center mb-2">Login</h3>
                        <p class="text-center text-muted mb-4">
                            Sistem Informasi Akademik
                        </p>

                        @if ($errors->any())
                            <div class="alert alert-danger">
                                {{ $errors->first() }}
                            </div>
                        @endif

                        <form action="{{ url('/login') }}" method="POST">
                            @csrf

                            <div class="mb-3">
                                <label class="form-label">Email</label>
                                <input
                                    type="email"
                                    name="email"
                                    class="form-control"
                                    placeholder="Masukkan email"
                                    value="{{ old('email') }}"
                                    required
                                >
                            </div>

                            <div class="mb-4">
                                <label class="form-label">Password</label>
                                <input
                                    type="password"
                                    name="password"
                                    class="form-control"
                                    placeholder="Masukkan password"
                                    required
                                >
                            </div>

                            <button type="submit" class="btn btn-primary w-100">
                                Login
                            </button>
                        </form>

                    </div>
                </div>

                <p class="text-center text-muted mt-3 small">
                    &copy; 2026 Sistem Informasi Akademik
                </p>

            </div>
        </div>
    </div>

</body>
</html>
