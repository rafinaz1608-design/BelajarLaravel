@extends('layouts.admin')

@section('title', 'Tambah Klien')
@section('page-title', 'Tambah Klien')
@section('breadcrumb', 'Clients')

@section('content')

<div class="page-header">
  <div class="page-header-left">
    <h2>➕ Tambah Klien / Mitra</h2>
    <p>Upload logo dan informasi mitra baru.</p>
  </div>
  <div class="page-header-right">
    <a href="{{ route('admin.clients.index') }}" class="btn btn-secondary">
      <i class="bi bi-arrow-left"></i> Kembali
    </a>
  </div>
</div>

<div style="max-width:560px">
  <form action="{{ route('admin.clients.store') }}" method="POST" enctype="multipart/form-data" id="client-form">
    @csrf

    <div class="admin-card">
      <div class="admin-card-header">
        <span class="admin-card-title"><i class="bi bi-building"></i> Informasi Klien</span>
      </div>
      <div class="admin-card-body">

        <div class="form-group">
          <label class="form-label" for="name">Nama Klien / Perusahaan <span class="req">*</span></label>
          <input type="text" id="name" name="name" class="form-control" placeholder="cth: PT. Teknologi Maju" value="{{ old('name') }}" required>
        </div>

        <div class="form-group">
          <label class="form-label" for="website">Website (opsional)</label>
          <input type="url" id="website" name="website" class="form-control" placeholder="https://example.com" value="{{ old('website') }}">
        </div>

        <div class="form-group">
          <label class="form-label" for="logo">Logo Perusahaan</label>
          <input type="file" id="logo" name="logo" class="form-control" accept="image/*" data-preview="#logo-preview">
          <div class="form-hint">PNG transparan lebih baik. JPG, WebP diterima. Maks 1MB.</div>
          <div class="img-preview-wrap" id="logo-preview"><img src="" alt="Preview Logo"></div>
        </div>

        <div class="form-check" style="margin-bottom:24px">
          <input type="checkbox" id="is_active" name="is_active" value="1" {{ old('is_active', true) ? 'checked' : '' }}>
          <label for="is_active">Tampilkan di website (Aktif)</label>
        </div>

        <button type="submit" class="btn btn-primary w-100 btn-lg" id="btn-save-client">
          <i class="bi bi-check-circle-fill"></i> Simpan Klien
        </button>

      </div>
    </div>

  </form>
</div>

@endsection
