@extends('layouts.admin')

@section('title', 'Edit Proyek')
@section('page-title', 'Edit Proyek')
@section('breadcrumb', 'Projects')

@section('content')

<div class="page-header">
  <div class="page-header-left">
    <h2>✏️ Edit Proyek</h2>
    <p>Perbarui detail proyek: <strong>{{ $project->title }}</strong></p>
  </div>
  <div class="page-header-right">
    <a href="{{ route('admin.projects.index') }}" class="btn btn-secondary">
      <i class="bi bi-arrow-left"></i> Kembali
    </a>
  </div>
</div>

{{-- Hidden Delete Form --}}
<form id="delete-project-form" action="{{ route('admin.projects.destroy', $project) }}" method="POST" data-confirm="Hapus proyek '{{ $project->title }}'?" style="display:none">
  @csrf @method('DELETE')
</form>

<form action="{{ route('admin.projects.update', $project) }}" method="POST" enctype="multipart/form-data" id="project-edit-form">
  @csrf @method('PUT')

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
              <input type="text" id="title" name="title" class="form-control" value="{{ old('title', $project->title) }}" required>
            </div>
            <div class="form-group">
              <label class="form-label" for="slug">Slug URL</label>
              <input type="text" id="slug" name="slug" class="form-control" value="{{ old('slug', $project->slug) }}">
            </div>
            <div class="form-group">
              <label class="form-label" for="category">Kategori <span class="req">*</span></label>
              <input type="text" id="category" name="category" class="form-control" value="{{ old('category', $project->category) }}" required>
            </div>
            <div class="form-group">
              <label class="form-label" for="client_name">Nama Klien</label>
              <input type="text" id="client_name" name="client_name" class="form-control" value="{{ old('client_name', $project->client_name) }}">
            </div>
            <div class="form-group">
              <label class="form-label" for="location">Lokasi</label>
              <input type="text" id="location" name="location" class="form-control" value="{{ old('location', $project->location) }}">
            </div>
            <div class="form-group">
              <label class="form-label" for="completion_date">Tanggal Selesai</label>
              <input type="text" id="completion_date" name="completion_date" class="form-control" value="{{ old('completion_date', $project->completion_date) }}">
            </div>
            <div class="form-group full">
              <label class="form-label" for="short_description">Deskripsi Singkat <span class="req">*</span></label>
              <textarea id="short_description" name="short_description" class="form-control" rows="3" required>{{ old('short_description', $project->short_description) }}</textarea>
            </div>
            <div class="form-group full">
              <label class="form-label" for="full_description">Deskripsi Lengkap <span class="req">*</span></label>
              <textarea id="full_description" name="full_description" class="form-control" rows="6" required>{{ old('full_description', $project->full_description) }}</textarea>
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
            @forelse($project->features ?? [] as $feature)
              <li class="feature-item">
                <input type="text" name="features[]" class="form-control" value="{{ $feature }}">
                <button type="button" class="btn-remove-feature" onclick="removeFeature(this)"><i class="bi bi-x"></i></button>
              </li>
            @empty
              <li class="feature-item">
                <input type="text" name="features[]" class="form-control" placeholder="Tambahkan poin...">
                <button type="button" class="btn-remove-feature" onclick="removeFeature(this)"><i class="bi bi-x"></i></button>
              </li>
            @endforelse
          </ul>
          <button type="button" class="btn-add-feature" onclick="addFeature()">
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
          @if($project->image)
            <div style="margin-bottom:12px;border-radius:var(--radius-md);overflow:hidden;border:1px solid var(--border-color)">
              <img src="{{ Storage::url($project->image) }}" alt="{{ $project->title }}" style="width:100%;height:160px;object-fit:cover">
            </div>
            <div class="form-hint mb-12">Upload baru untuk mengganti foto.</div>
          @endif
          <input type="file" id="image" name="image" class="form-control" accept="image/*" data-preview="#img-preview">
          <div class="img-preview-wrap" id="img-preview"><img src="" alt="Preview"></div>
        </div>
      </div>

      <div class="admin-card">
        <div class="admin-card-body" style="display:flex;flex-direction:column;gap:10px">
          <button type="submit" class="btn btn-primary w-100 btn-lg" id="btn-update-project">
            <i class="bi bi-check-circle-fill"></i> Perbarui Proyek
          </button>

          <button type="submit" form="delete-project-form" class="btn btn-danger w-100" id="btn-delete-project">
            <i class="bi bi-trash3"></i> Hapus Proyek
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
