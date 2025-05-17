<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>Login</title>
  <link rel="stylesheet" href="{{ asset('css/bg.css') }}">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.5/dist/css/bootstrap.min.css" rel="stylesheet" />
  <style>
    body {
      margin: 0;
      padding: 0;
      min-height: 100vh;
      display: flex;
      align-items: center;
      justify-content: center;
    }
    .login-card {
      background: white;
      border-radius: 15px;
      padding: 2rem;
      box-shadow: 0 8px 20px rgba(0, 0, 0, 0.1);
      width: 100%;
      max-width: 400px;
    }
  </style>
</head>
<body>
  <div class="login-card">
    <h4 class="text-center mb-4">Login</h4>

    {{-- Menampilkan pesan error --}}
    @if ($errors->any())
        <div class="alert alert-danger">
            @foreach ($errors->all() as $error)
                <p>{{ $error }}</p>
            @endforeach
        </div>
    @endif

    <form action="{{ route('login.authenticate') }}" method="POST">
      @csrf

      <div class="mb-3">
        <label for="email" class="form-label">Email address</label>
        <input type="email" class="form-control" id="email" name="email" placeholder="Enter email" required>
      </div>

      <div class="mb-3">
        <label for="password" class="form-label">Password</label>
        <input type="password" class="form-control" id="password" name="password" placeholder="Password" required>
      </div>

      <div class="mb-3 form-check">
        <input type="checkbox" class="form-check-input" id="rememberMe" name="remember">
        <label class="form-check-label" for="rememberMe">Remember me</label>
      </div>

      <button type="submit" class="btn btn-primary w-100">Login</button>
    </form>
    <div class="mt-3 text-center">
        <span>Belum punya akun?</span>
        <a href="{{ route('register') }}" class="btn btn-link">Daftar di sini</a>
    </div>

  </div>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.5/dist/js/bootstrap.bundle.min.js"></script>
  <script>
    // Menunggu DOM selesai dimuat
    document.addEventListener("DOMContentLoaded", function() {
      // Cek jika ada alert
      const alert = document.querySelector('.alert');
      if (alert) {
        // Set timeout untuk menghilangkan alert setelah 1.8 detik
        setTimeout(function() {
          alert.style.display = 'none';
        }, 1800); // 1800 milidetik = 1.8 detik
      }
    });
  </script>

</body>
</html>
