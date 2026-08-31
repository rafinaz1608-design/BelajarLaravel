@extends('layouts.admin')

@section('title', 'Tambah Produk')
@section('page-title', 'Tambah Produk')
@section('breadcrumb', 'Products')

@section('content')

<div class="page-header">
  <div class="page-header-left">
    <h2>➕ Tambah Produk Baru</h2>
    <p>Isi detail produk yang akan ditampilkan di website.</p>
  </div>
  <div class="page-header-right">
    <a href="{{ route('admin.products.index') }}" class="btn btn-secondary">
      <i class="bi bi-arrow-left"></i> Kembali
    </a>
  </div>    


  <div style="max-width: 600px;margin-top:20px">
    <div class="alert alert-info">
      <i class="bi bi-info-circle-fill"></i> Produk yang ditambahkan akan ditampilkan di halaman produk website.
    </div>
  <form action="{{ route('admin.products.store') }}" method="POST" enctype="multipart/form-data" id="product-form">
    @csrf

    <div class="admin-card">
      <div class="admin-card-header">
        <span class="admin-card-title"><i class="bi bi-building"></i> Informasi Produk </span>
      </div>
      <div class="admin-card-body">

        <div class="form-group">
          <label class="form-label" for="name">Nama Produk <span class="req">*</span></label>
          <input type="text" id="name" name="name" class="form-control @error('name') is-invalid @enderror" placeholder="cth: PT. Teknologi Maju" value="{{ old('name') }}" required>
          @error('name') <span class="form-error"><i class="bi bi-exclamation-circle-fill"></i> {{ $message }}</span> @enderror
        </div>
        <div class="form-group">
          <label class="form-label" for="price">Harga Produk <span class="req">*</span></label>
          <input type="number" id="price" name="price" class="form-control @error('price') is-invalid @enderror" placeholder="cth: 1000000" value="{{ old('price') }}" required>
          @error('price') <span class="form-error"><i class="bi bi-exclamation-circle-fill"></i> {{ $message }}</span> @enderror
        </div>
        <div class="form-group">
            <label class="form-label" for="image">Gambar Produk</label>
            <input type="file" id="image" name="image" class="form-control @error('image') is-invalid @enderror" accept="image/*" data-preview="#image-preview">
            <div class="form-hint">PNG transparan lebih baik. JPG, WebP diterima. Maks 1MB.</div>
            <div class="img-preview-wrap" id="image-preview"><img src="" alt="Preview Gambar"></div>
            @error('image') <span class="form-error"><i class="bi bi-exclamation-circle-fill"></i> {{ $message }}</span> @enderror

        </div>
        <button type="submit" class="btn btn-primary w-100 btn-lg" id="btn-save-product">
          <i class="bi bi-check-circle-fill"></i> Simpan Produk
        </button>

      </div>
    </div>

  </form>
</div>

@endsection


