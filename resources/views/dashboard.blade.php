
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard - Sistem Akademik</title>

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">

    <nav class="navbar navbar-dark bg-primary">
        <div class="container">
            <span class="navbar-brand mb-0 h1">
                Sistem Informasi Akademik
            </span>

            <!-- Tombol Logout -->
            <form action="{{ url('/logout') }}" method="POST"
                  onsubmit="return confirm('Apakah Anda yakin ingin logout?')">
                @csrf
                <button type="submit" class="btn btn-danger btn-sm">
                    Logout
                </button>
            </form>
        </div>
    </nav>

    <div class="container mt-5">

        <div class="card shadow-sm border-0">
            <div class="card-body p-4">

                <h3>Dashboard</h3>
                <p class="text-muted">
                    Selamat datang di Sistem Informasi Akademik.
                </p>

                <hr>

                <div class="mb-3">
                    <strong>Nama:</strong>
                    {{ Auth::user()->name }}
                </div>

                <div class="mb-3">
                    <strong>Email:</strong>
                    {{ Auth::user()->email }}
                </div>

                <div class="mb-3">
                    <strong>Role:</strong>
                    <span class="badge bg-primary">
                        {{ ucfirst(Auth::user()->role) }}
                    </span>
                </div>

            </div>
        </div>

    </div>

</body>
</html>
