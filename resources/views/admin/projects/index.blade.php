@extends('layouts.admin')

@section('title', 'Kelola Portofolio')
@section('page-title', 'Kelola Portofolio')
@section('breadcrumb', 'Projects')

@section('content')

<div class="page-header">
  <div class="page-header-left">
    <h2>📁 Kelola Portofolio</h2>
    <p>Kelola proyek dan portofolio yang ditampilkan di website.</p>
  </div>
  <div class="page-header-right">
    <a href="{{ route('admin.projects.create') }}" class="btn btn-primary" id="btn-add-project">
      <i class="bi bi-plus-lg"></i> Tambah Proyek
    </a>
  </div>
</div>

<div class="admin-card">
  <div class="admin-table-wrap">
    @if($projects->isEmpty())
      <div class="empty-state">
        <i class="bi bi-folder2-open"></i>
        <h4>Belum ada proyek</h4>
        <p>Klik "Tambah Proyek" untuk menambahkan portofolio pertama.</p>
      </div>
    @else
      <table class="admin-table" id="projects-table">
        <thead>
          <tr>
            <th>Gambar</th>
            <th>Judul</th>
            <th>Kategori</th>
            <th>Klien</th>
            <th>Lokasi</th>
            <th>Selesai</th>
            <th>Aksi</th>
          </tr>
        </thead>
        <tbody>
          @foreach($projects as $project)
          <tr>
            <td>
              @if($project->image)
                <img src="{{ Storage::url($project->image) }}" alt="{{ $project->title }}"
                  style="width:60px;height:44px;object-fit:cover;border-radius:8px;border:1px solid var(--border-color)">
              @else
                <div style="width:60px;height:44px;background:rgba(255,255,255,0.05);border-radius:8px;display:flex;align-items:center;justify-content:center">
                  <i class="bi bi-image" style="color:var(--text-muted)"></i>
                </div>
              @endif
            </td>
            <td>
              <strong>{{ $project->title }}</strong>
              <div class="text-muted-sm">{{ $project->slug }}</div>
            </td>
            <td><span class="badge badge-purple">{{ $project->category }}</span></td>
            <td style="font-size:13px;color:var(--text-muted)">{{ $project->client_name ?? '-' }}</td>
            <td style="font-size:13px;color:var(--text-muted)">{{ $project->location ?? '-' }}</td>
            <td style="font-size:13px;color:var(--text-muted)">{{ $project->completion_date ?? '-' }}</td>
            <td>
              <div class="d-flex gap-8">
                <a href="{{ route('projects.show', $project->slug) }}" target="_blank" class="btn btn-secondary btn-icon" title="Lihat">
                  <i class="bi bi-eye"></i>
                </a>
                <a href="{{ route('admin.projects.edit', $project) }}" class="btn btn-primary btn-icon" title="Edit">
                  <i class="bi bi-pencil"></i>
                </a>
                <form action="{{ route('admin.projects.destroy', $project) }}" method="POST" data-confirm="Hapus proyek '{{ $project->title }}'?">
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

@if($projects->hasPages())
  <div style="margin-top:20px">{{ $projects->links() }}</div>
@endif

@endsection
