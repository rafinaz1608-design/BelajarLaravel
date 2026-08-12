@extends('layouts.admin')

@section('title', 'Tambah Testimoni')
@section('page-title', 'Tambah Testimoni')
@section('breadcrumb', 'Testimonials')

@section('content')

<div class="page-header">
  <div class="page-header-left">
    <h2>➕ Tambah Testimoni</h2>
    <p>Tambahkan ulasan atau review dari klien.</p>
  </div>
  <div class="page-header-right">
    <a href="{{ route('admin.testimonials.index') }}" class="btn btn-secondary">
      <i class="bi bi-arrow-left"></i> Kembali
    </a>
  </div>
</div>

<div style="display:grid;grid-template-columns:2fr 1fr;gap:20px;max-width:900px">

  <form action="{{ route('admin.testimonials.store') }}" method="POST" enctype="multipart/form-data" id="testimonial-form">
    @csrf

    <div class="admin-card">
      <div class="admin-card-header">
        <span class="admin-card-title"><i class="bi bi-person-circle"></i> Data Klien</span>
      </div>
      <div class="admin-card-body">
        <div class="form-grid">
          <div class="form-group">
            <label class="form-label" for="client_name">Nama Klien <span class="req">*</span></label>
            <input type="text" id="client_name" name="client_name" class="form-control" placeholder="cth: Budi Santoso" value="{{ old('client_name') }}" required>
          </div>
          <div class="form-group">
            <label class="form-label" for="company">Perusahaan <span class="req">*</span></label>
            <input type="text" id="company" name="company" class="form-control" placeholder="cth: PT. Maju Jaya" value="{{ old('company') }}" required>
          </div>
          <div class="form-group full">
            <label class="form-label" for="role">Jabatan</label>
            <input type="text" id="role" name="role" class="form-control" placeholder="cth: CEO, Direktur, Manager" value="{{ old('role') }}">
          </div>
        </div>

        <div class="form-group">
          <label class="form-label">Rating <span class="req">*</span></label>
          <div class="star-rating" id="star-rating-input">
            @for($i = 5; $i >= 1; $i--)
              <input type="radio" id="star{{ $i }}" name="rating" value="{{ $i }}" {{ old('rating', 5) == $i ? 'checked' : '' }}>
              <label for="star{{ $i }}" title="{{ $i }} bintang">★</label>
            @endfor
          </div>
        </div>

        <div class="form-group">
          <label class="form-label" for="content">Isi Ulasan <span class="req">*</span></label>
          <textarea id="content" name="content" class="form-control" rows="5"
            placeholder="Tuliskan ulasan dari klien di sini..." required>{{ old('content') }}</textarea>
        </div>

        <div class="form-check" style="margin-bottom:20px">
          <input type="checkbox" id="is_active" name="is_active" value="1" {{ old('is_active', true) ? 'checked' : '' }}>
          <label for="is_active">Tampilkan di website</label>
        </div>

        <button type="submit" class="btn btn-primary w-100 btn-lg" id="btn-save-testimonial">
          <i class="bi bi-check-circle-fill"></i> Simpan Testimoni
        </button>

      </div>
    </div>
  </form>

  <div class="admin-card" style="align-self:start">
    <div class="admin-card-header">
      <span class="admin-card-title"><i class="bi bi-image"></i> Foto Klien</span>
    </div>
    <div class="admin-card-body">
      <div style="text-align:center;margin-bottom:16px">
        <div id="avatar-placeholder" style="width:80px;height:80px;border-radius:50%;background:var(--gradient-primary);display:flex;align-items:center;justify-content:center;font-size:32px;font-weight:700;color:#fff;margin:0 auto 8px">
          <i class="bi bi-person"></i>
        </div>
        <div style="font-size:12px;color:var(--text-muted)">Preview Foto</div>
      </div>
      <div class="form-group mb-0">
        <label class="form-label" for="avatar">Upload Foto</label>
        <input type="file" id="avatar" name="avatar" class="form-control" accept="image/*">
        <div class="form-hint">Foto persegi/bulat lebih baik. Maks 1MB.</div>
      </div>
    </div>
  </div>

</div>

@push('scripts')
<script>
  // Avatar preview as circle
  document.getElementById('avatar').addEventListener('change', function () {
    const file = this.files[0];
    if (file && file.type.startsWith('image/')) {
      const reader = new FileReader();
      reader.onload = e => {
        const placeholder = document.getElementById('avatar-placeholder');
        placeholder.innerHTML = `<img src="${e.target.result}" style="width:80px;height:80px;border-radius:50%;object-fit:cover">`;
      };
      reader.readAsDataURL(file);
    }
  });
</script>
@endpush

@endsection
