@extends('layouts.admin')

@section('title', 'Edit Produk')
@section('page-title', 'Edit Produk')
@section('breadcrumb', 'Products')

@section('content')

<div class="page-header">
  <div class="page-header-left">
    <h2>✏️ Edit Produk</h2>
    <p>Perbarui detail produk: <strong>{{ $product->name }}</strong></p>
  </div>

  <div class="page-header-right">
    <a href="{{ route('admin.products.index') }}" class="btn btn-secondary">
      <i class="bi bi-arrow-left"></i> Kembali
    </a>
  </div>
</div>

<div style="max-width: 560px;">
  <div class="alert alert-info">
    <i class="bi bi-info-circle-fill"></i>
    Perbarui informasi produk yang akan ditampilkan di website.
  </div>

  <form action="{{ route('admin.products.update', $product) }}" method="POST" enctype="multipart/form-data" id="product-form">
    @csrf
    @method('PUT')

    <div class="admin-card">
      <div class="admin-card-header">
        <span class="admin-card-title">
          <i class="bi bi-building"></i> Informasi Produk
        </span>
      </div>

      <div class="admin-card-body">

        {{-- Nama Produk --}}
        <div class="form-group">
          <label class="form-label" for="name">
            Nama Produk <span class="req">*</span>
          </label>

          <input
            type="text"
            id="name"
            name="name"
            class="form-control @error('name') is-invalid @enderror"
            placeholder="cth: PT. Teknologi Maju"
            value="{{ old('name', $product->name) }}"
            required
          >

          @error('name')
            <span class="form-error">
              <i class="bi bi-exclamation-circle-fill"></i> {{ $message }}
            </span>
          @enderror
        </div>

        {{-- Harga Produk --}}
        <div class="form-group">
          <label class="form-label" for="price">
            Harga Produk <span class="req">*</span>
          </label>

          <input
            type="number"
            id="price"
            name="price"
            class="form-control @error('price') is-invalid @enderror"
            placeholder="cth: 1000000"
            value="{{ old('price', $product->price) }}"
            required
          >

          @error('price')
            <span class="form-error">
              <i class="bi bi-exclamation-circle-fill"></i> {{ $message }}
            </span>
          @enderror
        </div>

        {{-- Gambar Produk --}}
        <div class="form-group">
          <label class="form-label" for="image">
            Gambar Produk
          </label>

          <input
            type="file"
            id="image"
            name="image"
            class="form-control @error('image') is-invalid @enderror"
            accept="image/*"
            data-preview="#image-preview"
          >

          <div class="form-hint">
            PNG transparan lebih baik. JPG, WebP diterima. Maks 1MB.
          </div>

          {{-- Gambar lama --}}
          @if($product->image)
            <div style="margin-top: 10px;">
              <div class="form-hint">Gambar saat ini:</div>
              <div class="img-preview-wrap" style="display:block;">
                <img
                  src="{{ asset('storage/' . $product->image) }}"
                  alt="{{ $product->name }}"
                >
              </div>
            </div>
          @endif

          {{-- Preview gambar baru --}}
          <div class="img-preview-wrap" id="image-preview">
            <img src="" alt="Preview Gambar Baru">
          </div>

          @error('image')
            <span class="form-error">
              <i class="bi bi-exclamation-circle-fill"></i> {{ $message }}
            </span>
          @enderror
        </div>

        <button type="submit" class="btn btn-primary w-100 btn-lg" id="btn-save-product">
          <i class="bi bi-check-circle-fill"></i> Update Produk
        </button>

      </div>
    </div>

  </form>
</div>

@endsection
