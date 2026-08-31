@extends('layouts.admin')

@section('title', 'Edit Testimoni')
@section('page-title', 'Edit Testimoni')
@section('breadcrumb', 'Testimonials')

@section('content')

<div class="page-header">
  <div class="page-header-left">
    <h2>✏️ Edit Testimoni</h2>
    <p>Perbarui ulasan dari: <strong>{{ $testimonial->client_name }}</strong></p>
  </div>
  <div class="page-header-right">
    <a href="{{ route('admin.testimonials.index') }}" class="btn btn-secondary">
      <i class="bi bi-arrow-left"></i> Kembali
    </a>
  </div>
</div>

{{-- Hidden Form for Delete --}}
<form id="delete-testimonial-form" action="{{ route('admin.testimonials.destroy', $testimonial) }}" method="POST" data-confirm="Hapus testimoni dari {{ $testimonial->client_name }}?" style="display:none">
  @csrf @method('DELETE')
</form>

<form action="{{ route('admin.testimonials.update', $testimonial) }}" method="POST" enctype="multipart/form-data" id="testimonial-edit-form">
  @csrf @method('PUT')

  <div style="display:grid;grid-template-columns:2fr 1fr;gap:20px;max-width:900px">

    <div style="display:flex;flex-direction:column;gap:20px">
      <div class="admin-card">
        <div class="admin-card-header">
          <span class="admin-card-title"><i class="bi bi-person-circle"></i> Data Klien</span>
        </div>
        <div class="admin-card-body">
          <div class="form-grid">
            <div class="form-group">
              <label class="form-label" for="client_name">Nama Klien <span class="req">*</span></label>
              <input type="text" id="client_name" name="client_name" class="form-control @error('client_name') is-invalid @enderror" value="{{ old('client_name', $testimonial->client_name) }}" required>
              @error('client_name') <span class="form-error"><i class="bi bi-exclamation-circle-fill"></i> {{ $message }}</span> @enderror
            </div>
            <div class="form-group">
              <label class="form-label" for="company">Perusahaan <span class="req">*</span></label>
              <input type="text" id="company" name="company" class="form-control @error('company') is-invalid @enderror" value="{{ old('company', $testimonial->company) }}" required>
              @error('company') <span class="form-error"><i class="bi bi-exclamation-circle-fill"></i> {{ $message }}</span> @enderror
            </div>
            <div class="form-group full">
              <label class="form-label" for="role">Jabatan</label>
              <input type="text" id="role" name="role" class="form-control @error('role') is-invalid @enderror" value="{{ old('role', $testimonial->role) }}">
              @error('role') <span class="form-error"><i class="bi bi-exclamation-circle-fill"></i> {{ $message }}</span> @enderror
            </div>
          </div>

          <div class="form-group">
            <label class="form-label">Rating <span class="req">*</span></label>
            <div class="star-rating">
              @for($i = 5; $i >= 1; $i--)
                <input type="radio" id="star{{ $i }}" name="rating" value="{{ $i }}" {{ old('rating', $testimonial->rating) == $i ? 'checked' : '' }}>
                <label for="star{{ $i }}" title="{{ $i }} bintang">★</label>
              @endfor
            </div>
            @error('rating') <span class="form-error"><i class="bi bi-exclamation-circle-fill"></i> {{ $message }}</span> @enderror
          </div>

          <div class="form-group">
            <label class="form-label" for="content">Isi Ulasan <span class="req">*</span></label>
            <textarea id="content" name="content" class="form-control @error('content') is-invalid @enderror" rows="5" required>{{ old('content', $testimonial->content) }}</textarea>
            @error('content') <span class="form-error"><i class="bi bi-exclamation-circle-fill"></i> {{ $message }}</span> @enderror
          </div>

          <div class="form-check" style="margin-bottom:20px">
            <input type="checkbox" id="is_active" name="is_active" value="1" {{ old('is_active', $testimonial->is_active) ? 'checked' : '' }}>
            <label for="is_active">Tampilkan di website</label>
          </div>

          <div style="display:flex;flex-direction:column;gap:10px">
            <button type="submit" class="btn btn-primary w-100 btn-lg" id="btn-update-testimonial">
              <i class="bi bi-check-circle-fill"></i> Perbarui Testimoni
            </button>

            <button type="submit" form="delete-testimonial-form" class="btn btn-danger w-100" id="btn-delete-testimonial">
              <i class="bi bi-trash3"></i> Hapus Testimoni
            </button>
          </div>
        </div>
      </div>
    </div>

    <div class="admin-card" style="align-self:start">
      <div class="admin-card-header">
        <span class="admin-card-title"><i class="bi bi-image"></i> Foto Klien</span>
      </div>
      <div class="admin-card-body">
        <div style="text-align:center;margin-bottom:16px" id="avatar-display">
          @if($testimonial->avatar)
            @php
              $avatarUrl = Str::startsWith($testimonial->avatar, 'assets/') ? asset($testimonial->avatar) : Storage::url($testimonial->avatar);
            @endphp
            <img src="{{ $avatarUrl }}" alt="{{ $testimonial->client_name }}"
              style="width:80px;height:80px;border-radius:50%;object-fit:cover;border:2px solid var(--border-color)">
          @else
            <div style="width:80px;height:80px;border-radius:50%;background:var(--gradient-primary);display:flex;align-items:center;justify-content:center;font-size:32px;font-weight:700;color:#fff;margin:0 auto">
              {{ strtoupper(substr($testimonial->client_name, 0, 1)) }}
            </div>
          @endif
          <div style="font-size:12px;color:var(--text-muted);margin-top:8px">Foto saat ini</div>
        </div>
        <div class="form-group mb-0">
          <label class="form-label" for="avatar">Ganti Foto</label>
          <input type="file" id="avatar" name="avatar" class="form-control @error('avatar') is-invalid @enderror" accept="image/*">
          <div class="form-hint">Kosongkan jika tidak ingin mengganti.</div>
          @error('avatar') <span class="form-error"><i class="bi bi-exclamation-circle-fill"></i> {{ $message }}</span> @enderror
        </div>
      </div>
    </div>

  </div>
</form>

@endsection
