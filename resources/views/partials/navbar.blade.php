  <header id="header" class="header d-flex align-items-center fixed-top">
    <div class="container-fluid container-xl position-relative d-flex align-items-center">

      <a href="{{ url('/') }}" class="logo d-flex align-items-center me-auto">
        <img src="{{ asset('assets/img/logo-pem.png') }}" alt="">
      </a>

      <nav id="navmenu" class="navmenu">
        <ul>
          <li><a href="{{ url('/') }}#hero" class="active">Beranda</a></li>
          <li><a href="{{ url('/') }}#about">Keunggulan</a></li>
          <li><a href="{{ url('/') }}#features">Tentang Kami</a></li>
          <li><a href="{{ url('/') }}#services">Layanan</a></li>
          <li><a href="{{ url('/') }}#clients">Client</a></li>
          <li><a href="{{ url('/') }}#contact">Contact</a></li>
        </ul>
        <i class="mobile-nav-toggle d-xl-none bi bi-list"></i>
      </nav>

      <div class="d-flex align-items-center gap-2">
        <a class="btn-getstarted" href="{{ url('/') }}#about">Get Buy Produk</a>
        @auth
          <a class="btn-btn-admin btn btn-outline-danger btn-sm rounded-pill px-3" href="{{ route('admin.dashboard') }}" style="border-color: #800000; color: #800000; font-weight: 600;">
            <i class="bi bi-speedometer2 me-1"></i> Dashboard
          </a>
        @else
          <a class="btn-btn-admin btn btn-outline-danger btn-sm rounded-pill px-3" href="{{ route('admin.login') }}" style="border-color: #800000; color: #800000; font-weight: 600;">
            <i class="bi bi-person-lock me-1"></i> Login Admin
          </a>
        @endauth
      </div>

    </div>
  </header>
