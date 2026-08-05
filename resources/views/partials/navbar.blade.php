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

      <a class="btn-getstarted" href="{{ url('/') }}#about">Get Buy Produk</a>

    </div>
  </header>
