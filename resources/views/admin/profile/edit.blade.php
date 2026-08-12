@extends('layouts.admin')

@section('title', 'Profil & Pengaturan')
@section('page-title', 'Profil & Pengaturan')
@section('breadcrumb', 'Profil')

@section('content')

<div class="page-header">
  <div class="page-header-left">
    <h2>⚙️ Profil & Pengaturan Admin</h2>
    <p>Perbarui informasi akun dan kata sandi Anda.</p>
  </div>
</div>

<div style="display:grid;grid-template-columns:1fr 1fr;gap:20px;max-width:860px">

  {{-- Profile Info --}}
  <div class="admin-card">
    <div class="admin-card-header">
      <span class="admin-card-title"><i class="bi bi-person-circle"></i> Informasi Profil</span>
    </div>
    <div class="admin-card-body">
      <form action="{{ route('admin.profile.update') }}" method="POST" id="profile-form">
        @csrf @method('PUT')

        <div style="text-align:center;margin-bottom:24px">
          <div style="width:72px;height:72px;border-radius:50%;background:var(--gradient-primary);display:flex;align-items:center;justify-content:center;font-size:28px;font-weight:800;color:#fff;margin:0 auto 12px;box-shadow:var(--shadow-glow)">
            {{ strtoupper(substr(auth()->user()->name, 0, 1)) }}
          </div>
          <div style="font-size:16px;font-weight:700;color:var(--text-primary)">{{ auth()->user()->name }}</div>
          <div style="font-size:13px;color:var(--text-muted)">Administrator</div>
        </div>

        <div class="form-group">
          <label class="form-label" for="name">Nama Lengkap <span class="req">*</span></label>
          <input type="text" id="name" name="name" class="form-control"
            value="{{ old('name', auth()->user()->name) }}" required>
        </div>

        <div class="form-group">
          <label class="form-label" for="email">Email <span class="req">*</span></label>
          <input type="email" id="email" name="email" class="form-control"
            value="{{ old('email', auth()->user()->email) }}" required>
        </div>

        <button type="submit" class="btn btn-primary w-100" id="btn-update-profile">
          <i class="bi bi-check-circle-fill"></i> Perbarui Profil
        </button>

      </form>
    </div>
  </div>

  {{-- Change Password --}}
  <div class="admin-card">
    <div class="admin-card-header">
      <span class="admin-card-title"><i class="bi bi-shield-lock-fill"></i> Ganti Password</span>
    </div>
    <div class="admin-card-body">
      <form action="{{ route('admin.profile.update') }}" method="POST" id="password-form">
        @csrf @method('PUT')
        <input type="hidden" name="name" value="{{ auth()->user()->name }}">
        <input type="hidden" name="email" value="{{ auth()->user()->email }}">

        <div class="alert alert-info" style="margin-bottom:20px">
          <i class="bi bi-info-circle-fill"></i>
          Kosongkan form ini jika tidak ingin mengubah password.
        </div>

        <div class="form-group">
          <label class="form-label" for="current_password">Password Saat Ini</label>
          <div class="input-icon-wrap" style="position:relative">
            <i class="bi bi-lock-fill"></i>
            <input type="password" id="current_password" name="current_password" class="form-control" placeholder="••••••••">
          </div>
          @error('current_password')
            <div class="form-error">{{ $message }}</div>
          @enderror
        </div>

        <div class="form-group">
          <label class="form-label" for="password">Password Baru</label>
          <div class="input-icon-wrap" style="position:relative">
            <i class="bi bi-key-fill"></i>
            <input type="password" id="password" name="password" class="form-control" placeholder="Min 8 karakter">
          </div>
        </div>

        <div class="form-group">
          <label class="form-label" for="password_confirmation">Konfirmasi Password Baru</label>
          <div class="input-icon-wrap" style="position:relative">
            <i class="bi bi-key-fill"></i>
            <input type="password" id="password_confirmation" name="password_confirmation" class="form-control" placeholder="Ulangi password baru">
          </div>
        </div>

        <button type="submit" class="btn btn-success w-100" id="btn-change-password">
          <i class="bi bi-shield-check"></i> Simpan Password Baru
        </button>

      </form>
    </div>
  </div>

  {{-- Danger Zone --}}
  <div class="admin-card" style="grid-column:1/-1;border-color:rgba(239,68,68,0.2)">
    <div class="admin-card-header">
      <span class="admin-card-title" style="color:var(--accent-red)"><i class="bi bi-exclamation-triangle-fill"></i> Zona Bahaya</span>
    </div>
    <div class="admin-card-body">
      <div class="d-flex align-center justify-between flex-wrap" style="gap:16px">
        <div>
          <div style="font-weight:600;color:var(--text-primary);margin-bottom:4px">Keluar dari Sesi</div>
          <div style="font-size:13px;color:var(--text-muted)">Anda akan logout dari semua perangkat aktif saat ini.</div>
        </div>
        <form action="{{ route('admin.logout') }}" method="POST">
          @csrf
          <button type="submit" class="btn btn-danger" id="btn-logout">
            <i class="bi bi-box-arrow-right"></i> Logout Sekarang
          </button>
        </form>
      </div>
    </div>
  </div>

</div>

@endsection
