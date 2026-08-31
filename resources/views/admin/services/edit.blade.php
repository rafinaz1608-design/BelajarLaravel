@extends('layouts.admin')

@section('title', 'Edit Layanan')
@section('page-title', 'Edit Layanan')
@section('breadcrumb', 'Services')

@section('content')

<div class="page-header">
  <div class="page-header-left">
    <h2>✏️ Edit Layanan</h2>
    <p>Perbarui detail layanan: <strong>{{ $service->title }}</strong></p>
  </div>
  <div class="page-header-right">
    <a href="{{ route('admin.services.index') }}" class="btn btn-secondary">
      <i class="bi bi-arrow-left"></i> Kembali
    </a>
  </div>
</div>

{{-- Hidden Delete Form --}}
<form id="delete-service-form" action="{{ route('admin.services.destroy', $service) }}" method="POST" data-confirm="Hapus layanan '{{ $service->title }}'?" style="display:none">
  @csrf @method('DELETE')
</form>

<form action="{{ route('admin.services.update', $service) }}" method="POST" enctype="multipart/form-data" id="service-edit-form">
  @csrf @method('PUT')

  <div style="display:grid;grid-template-columns:2fr 1fr;gap:20px">

    <div style="display:flex;flex-direction:column;gap:20px">

      <div class="admin-card">
        <div class="admin-card-header">
          <span class="admin-card-title"><i class="bi bi-info-circle"></i> Informasi Dasar</span>
        </div>
        <div class="admin-card-body">
          <div class="form-grid">
            <div class="form-group">
              <label class="form-label" for="title">Judul Layanan <span class="req">*</span></label>
              <input type="text" id="title" name="title" class="form-control @error('title') is-invalid @enderror" value="{{ old('title', $service->title) }}" required>
              @error('title') <span class="form-error"><i class="bi bi-exclamation-circle-fill"></i> {{ $message }}</span> @enderror
            </div>
            <div class="form-group">
              <label class="form-label" for="slug">Slug URL</label>
              <input type="text" id="slug" name="slug" class="form-control @error('slug') is-invalid @enderror" value="{{ old('slug', $service->slug) }}">
              @error('slug') <span class="form-error"><i class="bi bi-exclamation-circle-fill"></i> {{ $message }}</span> @enderror
            </div>
            <div class="form-group">
              <label class="form-label" for="icon">Bootstrap Icon Class</label>
              <input type="text" id="icon" name="icon" class="form-control @error('icon') is-invalid @enderror" value="{{ old('icon', $service->icon) }}" placeholder="cth: bi bi-palette-fill">
              @if($service->icon)
                <div class="mt-8" style="display:flex;align-items:center;gap:8px;font-size:13px;color:var(--text-muted)">
                  <i class="{{ $service->icon }}" style="font-size:20px;color:var(--accent-purple)"></i> Preview icon saat ini
                </div>
              @endif
              @error('icon') <span class="form-error"><i class="bi bi-exclamation-circle-fill"></i> {{ $message }}</span> @enderror
            </div>
            <div class="form-group">
              <label class="form-label" for="color_class">Warna / Color Class</label>
              <input type="text" id="color_class" name="color_class" class="form-control @error('color_class') is-invalid @enderror" value="{{ old('color_class', $service->color_class) }}">
              @error('color_class') <span class="form-error"><i class="bi bi-exclamation-circle-fill"></i> {{ $message }}</span> @enderror
            </div>
            <div class="form-group full">
              <label class="form-label" for="short_description">Deskripsi Singkat <span class="req">*</span></label>
              <textarea id="short_description" name="short_description" class="form-control @error('short_description') is-invalid @enderror" rows="3" required>{{ old('short_description', $service->short_description) }}</textarea>
              @error('short_description') <span class="form-error"><i class="bi bi-exclamation-circle-fill"></i> {{ $message }}</span> @enderror
            </div>
            <div class="form-group full">
              <label class="form-label" for="full_description">Deskripsi Lengkap <span class="req">*</span></label>
              <textarea id="full_description" name="full_description" class="form-control @error('full_description') is-invalid @enderror" rows="6" required>{{ old('full_description', $service->full_description) }}</textarea>
              @error('full_description') <span class="form-error"><i class="bi bi-exclamation-circle-fill"></i> {{ $message }}</span> @enderror
            </div>
          </div>
              <textarea id="full_description" name="full_description" class="form-control" rows="6" required>{{ old('full_description', $service->full_description) }}</textarea>
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
            @forelse($service->features ?? [] as $feature)
              <li class="feature-item">
                <input type="text" name="features[]" class="form-control" value="{{ $feature }}">
                <button type="button" class="btn-remove-feature" onclick="removeFeature(this)"><i class="bi bi-x"></i></button>
              </li>
            @empty
              <li class="feature-item">
                <input type="text" name="features[]" class="form-control" placeholder="Fitur unggulan...">
                <button type="button" class="btn-remove-feature" onclick="removeFeature(this)"><i class="bi bi-x"></i></button>
              </li>
            @endforelse
          </ul>
          <button type="button" class="btn-add-feature" id="btn-add-feature" onclick="addFeature()">
            <i class="bi bi-plus"></i> Tambah Fitur
          </button>
        </div>
      </div>

    </div>

    <div style="display:flex;flex-direction:column;gap:20px">

      <div class="admin-card">
        <div class="admin-card-header">
          <span class="admin-card-title"><i class="bi bi-image"></i> Gambar Layanan</span>
        </div>
        <div class="admin-card-body">
          @if($service->image)
            @php
              $serviceImg = Str::startsWith($service->image, 'assets/') ? asset($service->image) : Storage::url($service->image);
            @endphp
            <div style="margin-bottom:12px;border-radius:var(--radius-md);overflow:hidden;border:1px solid var(--border-color)">
              <img src="{{ $serviceImg }}" alt="Gambar saat ini" style="width:100%;height:160px;object-fit:cover">
            </div>
            <div class="form-hint mb-12">Upload baru untuk mengganti gambar di atas.</div>
          @endif
          <div class="form-group mb-0">
            <label class="form-label" for="image">Upload Gambar Baru</label>
            <input type="file" id="image" name="image" class="form-control @error('image') is-invalid @enderror" accept="image/*" data-preview="#img-preview">
            @error('image') <span class="form-error" style="color:var(--accent-red);font-size:13px;display:block;margin-top:5px"><i class="bi bi-exclamation-circle-fill"></i> {{ $message }}</span> @enderror
            <div class="img-preview-wrap" id="img-preview"><img src="" alt="Preview"></div>
          </div>
        </div>
      </div>

      <div class="admin-card">
        <div class="admin-card-header">
          <span class="admin-card-title"><i class="bi bi-file-earmark-arrow-up"></i> Katalog</span>
        </div>
        <div class="admin-card-body">
          @if($service->catalog_pdf)
            <div class="mb-12" style="font-size:13px;color:var(--accent-green)"><i class="bi bi-file-earmark-pdf"></i> PDF sudah ada</div>
          @endif
          <div class="form-group">
            <label class="form-label" for="catalog_pdf">Upload PDF Baru</label>
            <input type="file" id="catalog_pdf" name="catalog_pdf" class="form-control" accept=".pdf">
          </div>
          @if($service->catalog_doc)
            <div class="mb-12" style="font-size:13px;color:var(--accent-green)"><i class="bi bi-file-earmark-word"></i> DOC sudah ada</div>
          @endif
          <div class="form-group mb-0">
            <label class="form-label" for="catalog_doc">Upload DOC Baru</label>
            <input type="file" id="catalog_doc" name="catalog_doc" class="form-control" accept=".doc,.docx">
          </div>
        </div>
      </div>

      <div class="admin-card">
        <div class="admin-card-body" style="display:flex;flex-direction:column;gap:10px">
          <button type="submit" class="btn btn-primary w-100 btn-lg" id="btn-update-service">
            <i class="bi bi-check-circle-fill"></i> Perbarui Layanan
          </button>

          <button type="submit" form="delete-service-form" class="btn btn-danger w-100" id="btn-delete-service">
            <i class="bi bi-trash3"></i> Hapus Layanan
          </button>
        </div>
      </div>

    </div>
  </div>
</form>

@push('scripts')
<script>
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
