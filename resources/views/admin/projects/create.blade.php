@extends('layouts.admin')

@section('title', 'Tambah Proyek')
@section('page-title', 'Tambah Proyek')
@section('breadcrumb', 'Projects')

@section('content')

<div class="page-header">
  <div class="page-header-left">
    <h2>➕ Tambah Proyek Baru</h2>
    <p>Tambahkan portofolio proyek ke dalam website.</p>
  </div>
  <div class="page-header-right">
    <a href="{{ route('admin.projects.index') }}" class="btn btn-secondary">
      <i class="bi bi-arrow-left"></i> Kembali
    </a>
  </div>
</div>

<form action="{{ route('admin.projects.store') }}" method="POST" enctype="multipart/form-data" id="project-form">
  @csrf

  <div style="display:grid;grid-template-columns:2fr 1fr;gap:20px">

    <div style="display:flex;flex-direction:column;gap:20px">

      <div class="admin-card">
        <div class="admin-card-header">
          <span class="admin-card-title"><i class="bi bi-info-circle"></i> Detail Proyek</span>
        </div>
        <div class="admin-card-body">
          <div class="form-grid">
            <div class="form-group">
              <label class="form-label" for="title">Judul Proyek <span class="req">*</span></label>
              <input type="text" id="title" name="title" class="form-control" placeholder="cth: Gedung Perkantoran Modern" value="{{ old('title') }}" required>
            </div>
            <div class="form-group">
              <label class="form-label" for="slug">Slug URL</label>
              <input type="text" id="slug" name="slug" class="form-control" placeholder="auto-generate" value="{{ old('slug') }}">
            </div>
            <div class="form-group">
              <label class="form-label" for="category">Kategori <span class="req">*</span></label>
              <input type="text" id="category" name="category" class="form-control" placeholder="cth: Konstruksi, IT, Desain" value="{{ old('category') }}" required>
            </div>
            <div class="form-group">
              <label class="form-label" for="client_name">Nama Klien</label>
              <input type="text" id="client_name" name="client_name" class="form-control" placeholder="cth: PT. Maju Bersama" value="{{ old('client_name') }}">
            </div>
            <div class="form-group">
              <label class="form-label" for="location">Lokasi</label>
              <input type="text" id="location" name="location" class="form-control" placeholder="cth: Jakarta, Indonesia" value="{{ old('location') }}">
            </div>
            <div class="form-group">
              <label class="form-label" for="completion_date">Tanggal Selesai</label>
              <input type="text" id="completion_date" name="completion_date" class="form-control" placeholder="cth: Desember 2024" value="{{ old('completion_date') }}">
            </div>
            <div class="form-group full">
              <label class="form-label" for="short_description">Deskripsi Singkat <span class="req">*</span></label>
              <textarea id="short_description" name="short_description" class="form-control" rows="3" placeholder="Ringkasan singkat proyek..." required>{{ old('short_description') }}</textarea>
            </div>
            <div class="form-group full">
              <label class="form-label" for="full_description">Deskripsi Lengkap <span class="req">*</span></label>
              <textarea id="full_description" name="full_description" class="form-control" rows="6" placeholder="Penjelasan detail proyek, tantangan, solusi yang diberikan..." required>{{ old('full_description') }}</textarea>
            </div>
          </div>
        </div>
      </div>

      <div class="admin-card">
        <div class="admin-card-header">
          <span class="admin-card-title"><i class="bi bi-check2-square"></i> Fitur / Pencapaian</span>
        </div>
        <div class="admin-card-body">
          <ul class="features-list" id="features-list">
            <li class="feature-item">
              <input type="text" name="features[]" class="form-control" placeholder="cth: Menyelesaikan proyek 2 minggu lebih cepat dari jadwal">
              <button type="button" class="btn-remove-feature" onclick="removeFeature(this)"><i class="bi bi-x"></i></button>
            </li>
          </ul>
          <button type="button" class="btn-add-feature" id="btn-add-feature" onclick="addFeature()">
            <i class="bi bi-plus"></i> Tambah Poin
          </button>
        </div>
      </div>

    </div>

    <div style="display:flex;flex-direction:column;gap:20px">

      <div class="admin-card">
        <div class="admin-card-header">
          <span class="admin-card-title"><i class="bi bi-image"></i> Foto Proyek</span>
        </div>
        <div class="admin-card-body">
          <div class="form-group mb-0">
            <label class="form-label" for="image">Upload Foto</label>
            <input type="file" id="image" name="image" class="form-control" accept="image/*" data-preview="#img-preview">
            <div class="form-hint">JPG, PNG, WebP. Maks 3MB. Disarankan rasio 16:9.</div>
            <div class="img-preview-wrap" id="img-preview"><img src="" alt="Preview"></div>
          </div>
        </div>
      </div>

      <div class="admin-card">
        <div class="admin-card-body">
          <button type="submit" class="btn btn-primary w-100 btn-lg" id="btn-save-project">
            <i class="bi bi-check-circle-fill"></i> Simpan Proyek
          </button>
        </div>
      </div>

    </div>
  </div>
</form>

@push('scripts')
<script>
  document.getElementById('title').addEventListener('input', function () {
    const slugField = document.getElementById('slug');
    if (!slugField.dataset.manual) {
      slugField.value = this.value.toLowerCase().replace(/[^a-z0-9]+/g, '-').replace(/^-|-$/g, '');
    }
  });
  document.getElementById('slug').addEventListener('input', function () { this.dataset.manual = '1'; });

  function addFeature() {
    const li = document.createElement('li');
    li.className = 'feature-item';
    li.innerHTML = `<input type="text" name="features[]" class="form-control" placeholder="Tambahkan poin...">
      <button type="button" class="btn-remove-feature" onclick="removeFeature(this)"><i class="bi bi-x"></i></button>`;
    document.getElementById('features-list').appendChild(li);
    li.querySelector('input').focus();
  }
  function removeFeature(btn) {
    const list = document.getElementById('features-list');
    if (list.children.length > 1) btn.closest('.feature-item').remove();
  }
</script>
@endpush

@endsection
