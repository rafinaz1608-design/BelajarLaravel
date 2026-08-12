@extends('layouts.admin')

@section('title', 'Edit Klien')
@section('page-title', 'Edit Klien')
@section('breadcrumb', 'Clients')

@section('content')

<div class="page-header">
  <div class="page-header-left">
    <h2>✏️ Edit Klien</h2>
    <p>Perbarui informasi klien: <strong>{{ $client->name }}</strong></p>
  </div>
  <div class="page-header-right">
    <a href="{{ route('admin.clients.index') }}" class="btn btn-secondary">
      <i class="bi bi-arrow-left"></i> Kembali
    </a>
  </div>
</div>

{{-- Hidden Delete Form --}}
<form id="delete-client-form" action="{{ route('admin.clients.destroy', $client) }}" method="POST" data-confirm="Hapus klien '{{ $client->name }}'?" style="display:none">
  @csrf @method('DELETE')
</form>

<div style="max-width:560px">
  <form action="{{ route('admin.clients.update', $client) }}" method="POST" enctype="multipart/form-data" id="client-edit-form">
    @csrf @method('PUT')

    <div class="admin-card">
      <div class="admin-card-header">
        <span class="admin-card-title"><i class="bi bi-building"></i> Informasi Klien</span>
      </div>
      <div class="admin-card-body">

        <div class="form-group">
          <label class="form-label" for="name">Nama Klien / Perusahaan <span class="req">*</span></label>
          <input type="text" id="name" name="name" class="form-control" value="{{ old('name', $client->name) }}" required>
        </div>

        <div class="form-group">
          <label class="form-label" for="website">Website</label>
          <input type="url" id="website" name="website" class="form-control" value="{{ old('website', $client->website) }}">
        </div>

        <div class="form-group">
          <label class="form-label" for="logo">Logo Perusahaan</label>
          @if($client->logo)
            <div style="margin-bottom:12px;padding:16px;background:rgba(255,255,255,0.03);border-radius:var(--radius-md);border:1px solid var(--border-color);display:flex;align-items:center;gap:12px">
              <img src="{{ Storage::url($client->logo) }}" alt="{{ $client->name }}" style="height:50px;object-fit:contain">
              <span style="font-size:12px;color:var(--text-muted)">Logo saat ini</span>
            </div>
          @endif
          <input type="file" id="logo" name="logo" class="form-control" accept="image/*" data-preview="#logo-preview">
          <div class="form-hint">Upload baru untuk mengganti logo.</div>
          <div class="img-preview-wrap" id="logo-preview"><img src="" alt="Preview Logo"></div>
        </div>

        <div class="form-check" style="margin-bottom:24px">
          <input type="checkbox" id="is_active" name="is_active" value="1" {{ old('is_active', $client->is_active) ? 'checked' : '' }}>
          <label for="is_active">Tampilkan di website (Aktif)</label>
        </div>

        <div style="display:flex;flex-direction:column;gap:10px">
          <button type="submit" class="btn btn-primary w-100 btn-lg" id="btn-update-client">
            <i class="bi bi-check-circle-fill"></i> Perbarui Klien
          </button>

          <button type="submit" form="delete-client-form" class="btn btn-danger w-100" id="btn-delete-client">
            <i class="bi bi-trash3"></i> Hapus Klien
          </button>
        </div>

      </div>
    </div>

  </form>
</div>

@endsection
