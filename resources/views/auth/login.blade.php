<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Login — Admin Panel</title>
  <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">
  <link href="{{ asset('assets/vendor/bootstrap-icons/bootstrap-icons.css') }}" rel="stylesheet">
  <link href="{{ asset('assets/css/admin.css') }}" rel="stylesheet">
</head>
<body class="login-page">

  <div class="login-card fade-in">
    <div class="login-logo">
      <i class="bi bi-lightning-charge-fill"></i>
    </div>
    <h1 class="login-title">Selamat Datang</h1>
    <p class="login-subtitle">Masuk ke panel admin untuk mengelola konten website.</p>

    @if($errors->any())
      <div class="alert alert-danger" style="margin-bottom:20px">
        <i class="bi bi-exclamation-triangle-fill"></i>
        {{ $errors->first() }}
      </div>
    @endif

    <form action="{{ route('admin.login.post') }}" method="POST">
      @csrf

      <div class="form-group">
        <label class="form-label" for="email">Email</label>
        <div class="input-icon-wrap">
          <i class="bi bi-envelope-fill"></i>
          <input
            id="email"
            type="email"
            name="email"
            class="form-control"
            placeholder="admin@example.com"
            value="{{ old('email') }}"
            autocomplete="email"
            required
          >
        </div>
      </div>

      <div class="form-group">
        <label class="form-label" for="password">Password</label>
        <div class="input-icon-wrap" style="position:relative">
          <i class="bi bi-lock-fill"></i>
          <input
            id="password"
            type="password"
            name="password"
            class="form-control"
            placeholder="••••••••"
            autocomplete="current-password"
            required
          >
          <button type="button" id="togglePass" style="position:absolute;right:13px;top:50%;transform:translateY(-50%);background:none;border:none;cursor:pointer;color:var(--text-muted);">
            <i class="bi bi-eye" id="togglePassIcon"></i>
          </button>
        </div>
      </div>

      <div class="form-check" style="margin-bottom:24px">
        <input type="checkbox" id="remember" name="remember">
        <label for="remember">Ingat saya di perangkat ini</label>
      </div>

      <button type="submit" class="login-submit" id="loginBtn">
        <i class="bi bi-box-arrow-in-right"></i>
        &nbsp; Masuk ke Dashboard
      </button>
    </form>
  </div>

  <script>
    // Toggle password visibility
    document.getElementById('togglePass').addEventListener('click', function () {
      const pwd  = document.getElementById('password');
      const icon = document.getElementById('togglePassIcon');
      if (pwd.type === 'password') {
        pwd.type = 'text';
        icon.className = 'bi bi-eye-slash';
      } else {
        pwd.type = 'password';
        icon.className = 'bi bi-eye';
      }
    });
  </script>
</body>
</html>
