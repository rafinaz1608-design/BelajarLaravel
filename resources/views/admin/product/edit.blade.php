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