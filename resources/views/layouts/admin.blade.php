<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>@yield('title', 'Dashboard') — Admin Panel</title>
  <meta name="description" content="Admin Dashboard Panel">
  <meta name="csrf-token" content="{{ csrf_token() }}">

  <!-- Fonts -->
  <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">
  <!-- Bootstrap Icons -->
  <link href="{{ asset('assets/vendor/bootstrap-icons/bootstrap-icons.css') }}" rel="stylesheet">
  <!-- Admin CSS -->
  <link href="{{ asset('assets/css/admin.css') }}" rel="stylesheet">
  <!-- SweetAlert2 CSS -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.css">

  @stack('styles')
</head>
<body class="admin-page">

  <!-- ==================== SIDEBAR ==================== -->
  <aside class="admin-sidebar" id="adminSidebar">

    <div class="sidebar-brand">
      <div class="sidebar-brand-icon">
        <i class="bi bi-lightning-charge-fill"></i>
      </div>
      <div class="sidebar-brand-text">
        Admin Panel
        <span>Control Center</span>
      </div>
    </div>

    <nav class="sidebar-nav">
      <div class="sidebar-section-label">Menu Utama</div>

      <a href="{{ route('admin.dashboard') }}" class="{{ request()->routeIs('admin.dashboard') ? 'active' : '' }}" id="nav-dashboard">
        <i class="bi bi-grid-1x2-fill"></i>
        <span>Dashboard</span>
      </a>

      <a href="{{ route('admin.contacts.index') }}" class="{{ request()->routeIs('admin.contacts.*') ? 'active' : '' }}" id="nav-contacts">
        <i class="bi bi-envelope-fill"></i>
        <span>Pesan Masuk</span>
        @if(($unreadCount ?? 0) > 0)
          <span class="badge-unread">{{ $unreadCount }}</span>
        @endif
      </a>

      <div class="sidebar-section-label" style="margin-top:12px">Konten Website</div>

      <a href="{{ route('admin.services.index') }}" class="{{ request()->routeIs('admin.services.*') ? 'active' : '' }}" id="nav-services">
        <i class="bi bi-tools"></i>
        <span>Kelola Layanan</span>
      </a>

      <a href="{{ route('admin.projects.index') }}" class="{{ request()->routeIs('admin.projects.*') ? 'active' : '' }}" id="nav-projects">
        <i class="bi bi-folder2-open"></i>
        <span>Kelola Portofolio</span>
      </a>

      <a href="{{ route('admin.clients.index') }}" class="{{ request()->routeIs('admin.clients.*') ? 'active' : '' }}" id="nav-clients">
        <i class="bi bi-people-fill"></i>
        <span>Kelola Klien</span>
      </a>

      <a href="{{ route('admin.testimonials.index') }}" class="{{ request()->routeIs('admin.testimonials.*') ? 'active' : '' }}" id="nav-testimonials">
        <i class="bi bi-chat-quote-fill"></i>
        <span>Kelola Testimoni</span>
      </a>

      <div class="sidebar-section-label" style="margin-top:12px">Akun</div>

      <a href="{{ route('admin.profile.edit') }}" class="{{ request()->routeIs('admin.profile.*') ? 'active' : '' }}" id="nav-profile">
        <i class="bi bi-person-gear"></i>
        <span>Profil & Pengaturan</span>
      </a>

      <a href="{{ url('/') }}" target="_blank" id="nav-frontend">
        <i class="bi bi-globe2"></i>
        <span>Lihat Website</span>
      </a>
    </nav>

    <div class="sidebar-footer">
      <div class="sidebar-user">
        <div class="sidebar-user-avatar">
          {{ strtoupper(substr(auth()->user()->name ?? 'A', 0, 1)) }}
        </div>
        <div class="sidebar-user-info">
          <div class="sidebar-user-name">{{ auth()->user()->name ?? 'Admin' }}</div>
          <div class="sidebar-user-role">Administrator</div>
        </div>
        <form action="{{ route('admin.logout') }}" method="POST" style="margin:0">
          @csrf
          <button type="submit" style="background:none;border:none;cursor:pointer;padding:4px" title="Logout">
            <i class="bi bi-box-arrow-right" style="color:var(--text-muted);font-size:18px"></i>
          </button>
        </form>
      </div>
    </div>
  </aside>

  <!-- ==================== MAIN ==================== -->
  <main class="admin-main">

    <!-- TOPBAR -->
    <header class="admin-topbar">
      <div class="topbar-left">
        <button class="topbar-btn" id="sidebarToggle" title="Toggle Sidebar" style="display:none">
          <i class="bi bi-list"></i>
        </button>
        <div>
          <h1>@yield('page-title', 'Dashboard')</h1>
          <div class="topbar-breadcrumb">
            <a href="{{ route('admin.dashboard') }}">Home</a>
            <i class="bi bi-chevron-right" style="font-size:10px"></i>
            <span>@yield('breadcrumb', 'Dashboard')</span>
          </div>
        </div>
      </div>
      <div class="topbar-right">
        <span class="topbar-time" id="topbarClock"></span>
        <a href="{{ route('admin.contacts.index', ['status'=>'unread']) }}" class="topbar-btn" title="Pesan Belum Dibaca" style="text-decoration:none">
          <i class="bi bi-bell-fill"></i>
          @if(($unreadCount ?? 0) > 0)
            <span class="dot"></span>
          @endif
        </a>
        <a href="{{ route('admin.profile.edit') }}" class="topbar-btn" title="Profil Admin" style="text-decoration:none">
          <i class="bi bi-person-circle"></i>
        </a>
      </div>
    </header>

    <!-- CONTENT -->
    <div class="admin-content">

      {{-- Flash Messages --}}
      @if(session('success'))
        <div class="alert alert-success fade-in" id="flash-alert">
          <div class="alert-content">
            <i class="bi bi-check-circle-fill"></i>
            <span>{{ session('success') }}</span>
          </div>
          <button type="button" class="alert-close" onclick="this.parentElement.remove()"><i class="bi bi-x-lg"></i></button>
        </div>
      @endif
      @if(session('error') || $errors->any())
        <div class="alert alert-danger fade-in" id="flash-alert">
          <div class="alert-content">
            <i class="bi bi-exclamation-triangle-fill"></i>
            <span>{{ session('error') ?? $errors->first() }}</span>
          </div>
          <button type="button" class="alert-close" onclick="this.parentElement.remove()"><i class="bi bi-x-lg"></i></button>
        </div>
      @endif

      @yield('content')
    </div>
  </main>

  <!-- SweetAlert2 JS -->
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
  <script>
    // Clock
    function updateClock() {
      const now = new Date();
      const opts = { hour: '2-digit', minute: '2-digit', second: '2-digit', hour12: false };
      document.getElementById('topbarClock').textContent = now.toLocaleTimeString('id-ID', opts);
    }
    updateClock();
    setInterval(updateClock, 1000);

    // Mobile sidebar toggle
    const toggleBtn = document.getElementById('sidebarToggle');
    const sidebar   = document.getElementById('adminSidebar');
    if (window.innerWidth <= 768) {
      toggleBtn.style.display = 'flex';
    }
    toggleBtn?.addEventListener('click', () => sidebar.classList.toggle('open'));

    // SweetAlert2 Delete confirmation
    document.querySelectorAll('form[data-confirm]').forEach(form => {
      form.addEventListener('submit', function(e) {
        e.preventDefault();
        const msg = this.dataset.confirm || 'Yakin ingin menghapus data ini?';
        Swal.fire({
          title: 'Konfirmasi Hapus',
          text: msg,
          icon: 'warning',
          showCancelButton: true,
          confirmButtonColor: '#800000',
          cancelButtonColor: '#64748b',
          confirmButtonText: '<i class="bi bi-trash-fill"></i> Ya, Hapus!',
          cancelButtonText: 'Batal',
          reverseButtons: true,
          customClass: {
            popup: 'swal2-dark-popup'
          }
        }).then((result) => {
          if (result.isConfirmed) {
            form.submit();
          }
        });
      });
    });

    // Image preview
    document.querySelectorAll('input[type=file][data-preview]').forEach(input => {
      input.addEventListener('change', function () {
        const previewWrap = document.querySelector(this.dataset.preview);
        if (!previewWrap) return;
        const file = this.files[0];
        if (file && file.type.startsWith('image/')) {
          const reader = new FileReader();
          reader.onload = e => {
            previewWrap.style.display = 'block';
            previewWrap.querySelector('img').src = e.target.result;
          };
          reader.readAsDataURL(file);
        }
      });
    });
  </script>
  @stack('scripts')
</body>
</html>
