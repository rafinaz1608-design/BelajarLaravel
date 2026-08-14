@extends('layouts.admin')

@section('title', 'Kelola Testimoni')
@section('page-title', 'Kelola Testimoni')
@section('breadcrumb', 'Testimonials')

@section('content')

<div class="page-header">
  <div class="page-header-left">
    <h2>💬 Kelola Testimoni</h2>
    <p>Tambah dan kelola ulasan klien yang ditampilkan di website.</p>
  </div>
  <div class="page-header-right">
    <a href="{{ route('admin.testimonials.create') }}" class="btn btn-primary" id="btn-add-testimonial">
      <i class="bi bi-plus-lg"></i> Tambah Testimoni
    </a>
  </div>
</div>

<div class="admin-card">
  <div class="admin-table-wrap">
    @if($testimonials->isEmpty())
      <div class="empty-state">
        <i class="bi bi-chat-quote"></i>
        <h4>Belum ada testimoni</h4>
        <p>Tambahkan ulasan klien untuk meningkatkan kepercayaan pengunjung.</p>
      </div>
    @else
      <table class="admin-table" id="testimonials-table">
        <thead>
          <tr>
            <th>Klien</th>
            <th>Jabatan / Perusahaan</th>
            <th>Ulasan</th>
            <th>Rating</th>
            <th>Status</th>
            <th>Aksi</th>
          </tr>
        </thead>
        <tbody>
          @foreach($testimonials as $t)
          <tr>
            <td>
              <div class="d-flex align-center gap-12">
                @if($t->avatar)
                  <img src="{{ Storage::url($t->avatar) }}" alt="{{ $t->client_name }}" class="testimonial-avatar">
                @else
                  <div class="testimonial-avatar-placeholder">{{ strtoupper(substr($t->client_name, 0, 1)) }}</div>
                @endif
                <strong>{{ $t->client_name }}</strong>
              </div>
            </td>
            <td style="font-size:13px;color:var(--text-muted)">
              {{ $t->role ?? '-' }}<br>
              <span style="color:var(--text-secondary)">{{ $t->company }}</span>
            </td>
            <td>
              <span class="truncate" style="max-width:200px;font-size:13px;color:var(--text-muted)">{{ $t->content }}</span>
            </td>
            <td>
              <div class="stars">
                @for($i = 1; $i <= 5; $i++)
                  <i class="bi bi-star{{ $i <= $t->rating ? '-fill' : '' }}"></i>
                @endfor
              </div>
              <div style="font-size:11px;color:var(--text-muted)">{{ $t->rating }}/5</div>
            </td>
            <td>
              @if($t->is_active)
                <span class="badge badge-active"><i class="bi bi-eye-fill"></i> Tampil</span>
              @else
                <span class="badge badge-inactive"><i class="bi bi-eye-slash"></i> Tersembunyi</span>
              @endif
            </td>
            <td>
              <div class="d-flex gap-8">
                <form action="{{ route('admin.testimonials.toggle', $t) }}" method="POST">
                  @csrf
                  <button type="submit" class="btn {{ $t->is_active ? 'btn-secondary' : 'btn-success' }} btn-icon"
                          title="{{ $t->is_active ? 'Sembunyikan' : 'Tampilkan' }}">
                    <i class="bi bi-{{ $t->is_active ? 'eye-slash' : 'eye' }}"></i>
                  </button>
                </form>
                <a href="{{ route('admin.testimonials.edit', $t) }}" class="btn btn-primary btn-icon" title="Edit">
                  <i class="bi bi-pencil"></i>
                </a>
                <form action="{{ route('admin.testimonials.destroy', $t) }}" method="POST" data-confirm="Hapus testimoni dari {{ $t->client_name }}?">
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

@if($testimonials->hasPages())
  <div style="margin-top:20px">{{ $testimonials->links() }}</div>
@endif

@endsection
