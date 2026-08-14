@extends('layouts.admin')

@section('title', 'Kelola Layanan')
@section('page-title', 'Kelola Layanan')
@section('breadcrumb', 'Services')

@section('content')

<div class="page-header">
  <div class="page-header-left">
    <h2>🛠️ Kelola Layanan</h2>
    <p>Tambah, edit, atau hapus layanan yang ditampilkan di website.</p>
  </div>
  <div class="page-header-right">
    <a href="{{ route('admin.services.create') }}" class="btn btn-primary" id="btn-add-service">
      <i class="bi bi-plus-lg"></i> Tambah Layanan
    </a>
  </div>
</div>

<div class="admin-card">
  <div class="admin-table-wrap">
    @if($services->isEmpty())
      <div class="empty-state">
        <i class="bi bi-tools"></i>
        <h4>Belum ada layanan</h4>
        <p>Klik tombol "Tambah Layanan" untuk menambahkan layanan baru.</p>
      </div>
    @else
      <table class="admin-table" id="services-table">
        <thead>
          <tr>
            <th>#</th>
            <th>Icon</th>
            <th>Judul Layanan</th>
            <th>Slug</th>
            <th>Deskripsi Singkat</th>
            <th>Fitur</th>
            <th>Aksi</th>
          </tr>
        </thead>
        <tbody>
          @foreach($services as $service)
          <tr>
            <td style="color:var(--text-muted);font-size:12px">{{ $service->id }}</td>
            <td>
              @if($service->icon)
                <div style="width:40px;height:40px;background:rgba(124,58,237,0.15);border-radius:8px;display:flex;align-items:center;justify-content:center">
                  <i class="{{ $service->icon }}" style="font-size:20px;color:var(--accent-purple)"></i>
                </div>
              @else
                <div style="width:40px;height:40px;background:rgba(255,255,255,0.05);border-radius:8px;display:flex;align-items:center;justify-content:center">
                  <i class="bi bi-tools" style="color:var(--text-muted)"></i>
                </div>
              @endif
            </td>
            <td>
              <strong>{{ $service->title }}</strong>
            </td>
            <td>
              <span class="badge badge-purple">{{ $service->slug }}</span>
            </td>
            <td>
              <span class="truncate" style="max-width:220px;font-size:13px;color:var(--text-muted)">{{ $service->short_description }}</span>
            </td>
            <td style="color:var(--text-muted);font-size:13px">
              {{ count($service->features ?? []) }} fitur
            </td>
            <td>
              <div class="d-flex gap-8">
                <a href="{{ route('services.show', $service->slug) }}" target="_blank" class="btn btn-secondary btn-icon" title="Lihat di Website">
                  <i class="bi bi-eye"></i>
                </a>
                <a href="{{ route('admin.services.edit', $service) }}" class="btn btn-primary btn-icon" title="Edit">
                  <i class="bi bi-pencil"></i>
                </a>
                <form action="{{ route('admin.services.destroy', $service) }}" method="POST" data-confirm="Hapus layanan '{{ $service->title }}'?">
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

@if($services->hasPages())
  <div style="margin-top:20px">{{ $services->links() }}</div>
@endif

@endsection
