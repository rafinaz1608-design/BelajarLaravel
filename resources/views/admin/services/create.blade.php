@extends('layouts.admin')

@section('title', 'Tambah Layanan')
@section('page-title', 'Tambah Layanan')
@section('breadcrumb', 'Services')

@section('content')

<div class="page-header">
  <div class="page-header-left">
    <h2>➕ Tambah Layanan Baru</h2>
    <p>Isi detail layanan yang akan ditampilkan di website.</p>
  </div>
  <div class="page-header-right">
    <a href="{{ route('admin.services.index') }}" class="btn btn-secondary">
      <i class="bi bi-arrow-left"></i> Kembali
    </a>
  </div>
</div>

<form action="{{ route('admin.services.store') }}" method="POST" enctype="multipart/form-data" id="service-form">
  @csrf

  <div style="display:grid;grid-template-columns:2fr 1fr;gap:20px">

    {{-- Left Column --}}
    <div style="display:flex;flex-direction:column;gap:20px">

      <div class="admin-card">
        <div class="admin-card-header">
          <span class="admin-card-title"><i class="bi bi-info-circle"></i> Informasi Dasar</span>
        </div>
        <div class="admin-card-body">
          <div class="form-grid">
            <div class="form-group">
              <label class="form-label" for="title">Judul Layanan <span class="req">*</span></label>
              <input type="text" id="title" name="title" class="form-control" placeholder="cth: Desain Grafis" value="{{ old('title') }}" required>
            </div>
            <div class="form-group">
              <label class="form-label" for="slug">Slug URL</label>
              <input type="text" id="slug" name="slug" class="form-control" placeholder="auto-generate dari judul" value="{{ old('slug') }}">
              <div class="form-hint">Kosongkan untuk generate otomatis dari judul.</div>
            </div>
            <div class="form-group">
              <label class="form-label" for="icon">Bootstrap Icon Class</label>
              <input type="text" id="icon" name="icon" class="form-control" placeholder="cth: bi bi-palette-fill" value="{{ old('icon') }}">
              <div class="form-hint">Lihat icon di <a href="https://icons.getbootstrap.com" target="_blank" style="color:var(--accent-cyan)">icons.getbootstrap.com</a></div>
            </div>
            <div class="form-group">
              <label class="form-label" for="color_class">Warna / Color Class</label>
              <input type="text" id="color_class" name="color_class" class="form-control" placeholder="cth: text-purple" value="{{ old('color_class') }}">
            </div>
            <div class="form-group full">
              <label class="form-label" for="short_description">Deskripsi Singkat <span class="req">*</span></label>
              <textarea id="short_description" name="short_description" class="form-control" rows="3" placeholder="Deskripsi singkat layanan (tampil di halaman utama)" required>{{ old('short_description') }}</textarea>
            </div>
            <div class="form-group full">
              <label class="form-label" for="full_description">Deskripsi Lengkap <span class="req">*</span></label>
              <textarea id="full_description" name="full_description" class="form-control" rows="6" placeholder="Penjelasan detail layanan ini..." required>{{ old('full_description') }}</textarea>
            </div>
          </div>
        </div>
      </div>

      <div class="admin-card">
        <div class="admin-card-header">
          <span class="admin-card-title"><i class="bi bi-check2-square"></i> Fitur-Fitur</span>
        </div>
        <div class="admin-card-body">
          <ul class="features-list" id="features-list">
            <li class="feature-item">
              <input type="text" name="features[]" class="form-control" placeholder="Fitur unggulan 1...">
              <button type="button" class="btn-remove-feature" onclick="removeFeature(this)"><i class="bi bi-x"></i></button>
            </li>
          </ul>
          <button type="button" class="btn-add-feature" id="btn-add-feature" onclick="addFeature()">
            <i class="bi bi-plus"></i> Tambah Fitur
          </button>
        </div>
      </div>

    </div>

    {{-- Right Column --}}
    <div style="display:flex;flex-direction:column;gap:20px">

      <div class="admin-card">
        <div class="admin-card-header">
          <span class="admin-card-title"><i class="bi bi-image"></i> Gambar Layanan</span>
        </div>
        <div class="admin-card-body">
          <div class="form-group mb-0">
            <label class="form-label" for="image">Upload Gambar</label>
            <input type="file" id="image" name="image" class="form-control" accept="image/*" data-preview="#img-preview">
            <div class="form-hint">JPG, PNG, WebP. Maks 2MB.</div>
            <div class="img-preview-wrap" id="img-preview">
              <img src="" alt="Preview">
            </div>
          </div>
        </div>
      </div>

      <div class="admin-card">
        <div class="admin-card-header">
          <span class="admin-card-title"><i class="bi bi-file-earmark-arrow-up"></i> Katalog</span>
        </div>
        <div class="admin-card-body">
          <div class="form-group">
            <label class="form-label" for="catalog_pdf">Katalog PDF</label>
            <input type="file" id="catalog_pdf" name="catalog_pdf" class="form-control" accept=".pdf">
            <div class="form-hint">Maks 10MB.</div>
          </div>
          <div class="form-group mb-0">
            <label class="form-label" for="catalog_doc">Katalog DOC/DOCX</label>
            <input type="file" id="catalog_doc" name="catalog_doc" class="form-control" accept=".doc,.docx">
            <div class="form-hint">Maks 10MB.</div>
          </div>
        </div>
      </div>

      <div class="admin-card">
        <div class="admin-card-body">
          <button type="submit" class="btn btn-primary w-100 btn-lg" id="btn-save-service">
            <i class="bi bi-check-circle-fill"></i> Simpan Layanan
          </button>
        </div>
      </div>

    </div>
  </div>
</form>

@push('scripts')
<script>
  // Auto-generate slug from title
  document.getElementById('title').addEventListener('input', function () {
    const slugField = document.getElementById('slug');
    if (!slugField.dataset.manual) {
      slugField.value = this.value.toLowerCase().replace(/[^a-z0-9]+/g, '-').replace(/^-|-$/g, '');
    }
  });
  document.getElementById('slug').addEventListener('input', function () {
    this.dataset.manual = '1';
  });

  // Dynamic features
  function addFeature() {
    const li = document.createElement('li');
    li.className = 'feature-item';
    li.innerHTML = `<input type="text" name="features[]" class="form-control" placeholder="Tambahkan fitur...">
      <button type="button" class="btn-remove-feature" onclick="removeFeature(this)"><i class="bi bi-x"></i></button>`;
    document.getElementById('features-list').appendChild(li);
    li.querySelector('input').focus();
  }

  function removeFeature(btn) {
    const li = btn.closest('.feature-item');
    const list = document.getElementById('features-list');
    if (list.children.length > 1) li.remove();
  }
</script>
@endpush

@endsection
