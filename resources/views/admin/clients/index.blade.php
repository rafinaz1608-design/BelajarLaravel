@extends('layouts.admin')

@section('title', 'Kelola Klien')
@section('page-title', 'Kelola Klien')
@section('breadcrumb', 'Clients')

@section('content')

<div class="page-header">
  <div class="page-header-left">
    <h2>🤝 Kelola Klien & Mitra</h2>
    <p>Kelola logo dan status mitra yang ditampilkan di halaman utama.</p>
  </div>
  <div class="page-header-right">
    <a href="{{ route('admin.clients.create') }}" class="btn btn-primary" id="btn-add-client">
      <i class="bi bi-plus-lg"></i> Tambah Klien
    </a>
  </div>
</div>

<div class="admin-card">
  <div class="admin-table-wrap">
    @if($clients->isEmpty())
      <div class="empty-state">
        <i class="bi bi-people"></i>
        <h4>Belum ada klien</h4>
        <p>Tambahkan logo mitra untuk ditampilkan di website.</p>
      </div>
    @else
      <table class="admin-table" id="clients-table">
        <thead>
          <tr>
            <th>Logo</th>
            <th>Nama Klien</th>
            <th>Website</th>
            <th>Status</th>
            <th>Ditambahkan</th>
            <th>Aksi</th>
          </tr>
        </thead>
        <tbody>
          @foreach($clients as $client)
          <tr>
            <td>
              @if($client->logo)
                @php
                  $logoUrl = Str::startsWith($client->logo, 'assets/') ? asset($client->logo) : Storage::url($client->logo);
                @endphp
                <img src="{{ $logoUrl }}" alt="{{ $client->name }}"
                  style="height:40px;max-width:80px;object-fit:contain;filter:brightness(0.9)">
              @else
                <div style="width:60px;height:40px;background:rgba(255,255,255,0.05);border-radius:8px;display:flex;align-items:center;justify-content:center">
                  <i class="bi bi-building" style="color:var(--text-muted)"></i>
                </div>
              @endif
            </td>
            <td><strong>{{ $client->name }}</strong></td>
            <td>
              @if($client->website)
                <a href="{{ $client->website }}" target="_blank" style="color:var(--accent-cyan);font-size:13px">
                  <i class="bi bi-link-45deg"></i> {{ $client->website }}
                </a>
              @else
                <span style="color:var(--text-muted);font-size:13px">-</span>
              @endif
            </td>
            <td>
              @if($client->is_active)
                <span class="badge badge-active"><i class="bi bi-check-circle-fill"></i> Aktif</span>
              @else
                <span class="badge badge-inactive"><i class="bi bi-x-circle"></i> Nonaktif</span>
              @endif
            </td>
            <td style="font-size:12px;color:var(--text-muted)">{{ $client->created_at->format('d M Y') }}</td>
            <td>
              <div class="d-flex gap-8">
                <form action="{{ route('admin.clients.toggle', $client) }}" method="POST">
                  @csrf
                  <button type="submit" class="btn {{ $client->is_active ? 'btn-secondary' : 'btn-success' }} btn-icon"
                          title="{{ $client->is_active ? 'Nonaktifkan' : 'Aktifkan' }}">
                    <i class="bi bi-{{ $client->is_active ? 'toggle-on' : 'toggle-off' }}"></i>
                  </button>
                </form>
                <a href="{{ route('admin.clients.edit', $client) }}" class="btn btn-primary btn-icon" title="Edit">
                  <i class="bi bi-pencil"></i>
                </a>
                <form action="{{ route('admin.clients.destroy', $client) }}" method="POST" data-confirm="Hapus klien '{{ $client->name }}'?">
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

@if($clients->hasPages())
  <div style="margin-top:20px">{{ $clients->links() }}</div>
@endif

@endsection
