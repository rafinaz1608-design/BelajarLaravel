@extends('layouts.admin')

@section('title', 'Kelola produk')
@section('page-title', 'Kelola Produk')
@section('breadcrumb', 'Products')

@section('content')

<div class="page-header">
  <div class="page-header-left">
    <h2>🤝 Kelola Produk</h2>
    <p>Kelola detail produk yang ditampilkan di website.</p>
  </div>
  <div class="page-header-right">
    <a href="{{ route('admin.products.create') }}" class="btn btn-primary" id="btn-add-product">
      <i class="bi bi-plus-lg"></i> Tambah Produk
    </a>
  </div>
</div>

<div class="admin-card">
  <div class="admin-table-wrap">
    @if($products->isEmpty())
      <div class="empty-state">
        <i class="bi bi-box-seam"></i>
        <h4>Belum ada produk</h4>
        <p>Tambahkan produk baru untuk ditampilkan di website.</p>
      </div>
    @else
      <table class="admin-table" id="products-table">
        <thead>
          <tr>
            <th>Gambar</th>
            <th>Nama Produk</th>
            <th>Harga</th>
            <th>Status</th>
            <th>Ditambahkan</th>
            <th>Aksi</th>
          </tr>
        </thead>
        <tbody>
          @foreach($products as $product)
          <tr>
            <td>
              @if($product->image)
                <img src="{{ Storage::url($product->image) }}" alt="{{ $product->name }}"
                  style="height:40px;max-width:80px;object-fit:contain;filter:brightness(0.9)">
              @else
                <div style="width:60px;height:40px;background:rgba(255,255,255,0.05);border-radius:8px;display:flex;align-items:center;justify-content:center">
                  <i class="bi bi-box-seam" style="color:var(--text-muted)"></i>
                </div>
              @endif
            </td>
            <td><strong>{{ $product->name }}</strong></td>
            <td>Rp {{ number_format($product->price, 0, ',', '.') }}</td>
            <td>
              @if($product->is_active)
                <span class="badge badge-active"><i class="bi bi-check-circle-fill"></i> Aktif</span>
              @else
                <span class="badge badge-inactive"><i class="bi bi-x-circle"></i> Nonaktif</span>
              @endif
            </td>
            <td style="font-size:12px;color:var(--text-muted)">{{ $product->created_at->format('d M Y') }}</td>
            <td>
              <div class="d-flex gap-8">
                
                <a href="{{ route('admin.products.edit', $product) }}" class="btn btn-primary btn-icon" title="Edit">
                  <i class="bi bi-pencil"></i>
                </a>
                <form action="{{ route('admin.products.destroy', $product) }}" method="POST" data-confirm="Hapus produk '{{ $product->name }}'?">
                  @csrf @method('DELETE')
                  <button type="submit" class="btn btn-danger btn-icon" title="Hapus">
                    <i class="bi bi-trash3"></i>
                  </button>
                </form>
              </div>
            </td>
          </tr>
          @endforeach
        </tbody>
      </table>
    @endif
  </div>
</div>

@if($products->hasPages())
  <div style="margin-top:20px">{{ $products->links() }}</div>
@endif

@endsection

                                