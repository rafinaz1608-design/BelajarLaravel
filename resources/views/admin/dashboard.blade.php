@extends('layouts.admin')

@section('title', 'Dashboard')
@section('page-title', 'Dashboard')
@section('breadcrumb', 'Beranda')

@section('content')

{{-- ==================== STAT CARDS ==================== --}}
<div class="stat-grid fade-in">

  <div class="stat-card purple fade-in fade-in-delay-1">
    @if($unreadCount > 0)
      <span class="stat-badge new">{{ $unreadCount }} Baru</span>
    @endif
    <div class="stat-icon"><i class="bi bi-envelope-fill"></i></div>
    <div class="stat-value">{{ $unreadCount }}</div>
    <div class="stat-label">Pesan Belum Dibaca</div>
    <div class="stat-trend"><i class="bi bi-arrow-up-right"></i> Dari total pesan masuk</div>
  </div>

  <div class="stat-card cyan fade-in fade-in-delay-2">
    <div class="stat-icon"><i class="bi bi-folder2-open"></i></div>
    <div class="stat-value">{{ $totalProjects }}</div>
    <div class="stat-label">Total Proyek</div>
    <div class="stat-trend"><i class="bi bi-collection"></i> Portofolio aktif</div>
  </div>

  <div class="stat-card green fade-in fade-in-delay-3">
    <div class="stat-icon"><i class="bi bi-tools"></i></div>
    <div class="stat-value">{{ $activeServices }}</div>
    <div class="stat-label">Layanan Aktif</div>
    <div class="stat-trend"><i class="bi bi-check-circle"></i> Ditampilkan di website</div>
  </div>

  <div class="stat-card orange fade-in fade-in-delay-4">
    <div class="stat-icon"><i class="bi bi-people-fill"></i></div>
    <div class="stat-value">{{ $totalClients + $totalTestimonials }}</div>
    <div class="stat-label">Klien & Testimoni</div>
    <div class="stat-trend">
      <i class="bi bi-person-check"></i> {{ $totalClients }} klien · {{ $totalTestimonials }} testimoni
    </div>
  </div>

</div>

{{-- ==================== MAIN GRID ==================== --}}
<div class="row-three">

  {{-- Recent Messages --}}
  <div class="admin-card fade-in">
    <div class="admin-card-header">
      <span class="admin-card-title">
        <i class="bi bi-inbox-fill"></i> Pesan Masuk Terbaru
      </span>
      <a href="{{ route('admin.contacts.index') }}" class="btn btn-secondary btn-sm">
        Lihat Semua <i class="bi bi-arrow-right"></i>
      </a>
    </div>
    <div class="admin-table-wrap">
      @if($recentContacts->isEmpty())
        <div class="empty-state">
          <i class="bi bi-inbox"></i>
          <h4>Belum ada pesan</h4>
          <p>Pesan dari pengunjung akan muncul di sini.</p>
        </div>
      @else
        <table class="admin-table">
          <thead>
            <tr>
              <th>Pengirim</th>
              <th>Subjek</th>
              <th>Tanggal</th>
              <th>Status</th>
              <th>Aksi</th>
            </tr>
          </thead>
          <tbody>
            @foreach($recentContacts as $contact)
            <tr class="{{ $contact->status === 'unread' ? 'unread' : '' }}">
              <td>
                <strong>{{ $contact->name }}</strong>
                <div class="text-muted-sm">{{ $contact->email }}</div>
              </td>
              <td>
                <span class="truncate" style="max-width:180px">{{ $contact->subject }}</span>
              </td>
              <td>
                <span style="font-size:12px;color:var(--text-muted)">
                  {{ $contact->created_at->format('d M Y') }}<br>
                  {{ $contact->created_at->format('H:i') }}
                </span>
              </td>
              <td>
                @if($contact->status === 'unread')
                  <span class="badge badge-unread-msg"><i class="bi bi-circle-fill" style="font-size:8px"></i> Belum Dibaca</span>
                @else
                  <span class="badge badge-read"><i class="bi bi-check2"></i> Sudah Dibaca</span>
                @endif
              </td>
              <td>
                <a href="{{ route('admin.contacts.show', $contact) }}" class="btn btn-secondary btn-icon btn-sm" title="Lihat Detail">
                  <i class="bi bi-eye"></i>
                </a>
              </td>
            </tr>
            @endforeach
          </tbody>
        </table>
      @endif
    </div>
  </div>

  {{-- Quick Actions --}}
  <div class="admin-card fade-in" style="align-self:start">
    <div class="admin-card-header">
      <span class="admin-card-title">
        <i class="bi bi-lightning-charge"></i> Aksi Cepat
      </span>
    </div>
    <div class="admin-card-body">
      <div class="quick-actions" style="grid-template-columns:1fr">
        <a href="{{ route('admin.projects.create') }}" class="quick-action-btn purple" id="qa-add-project">
          <i class="bi bi-folder-plus"></i>
          <div>
            <div style="font-weight:600;font-size:13px;color:var(--text-primary)">+ Tambah Proyek</div>
            <div style="font-size:11px;color:var(--text-muted)">Upload portofolio baru</div>
          </div>
        </a>
        <a href="{{ route('admin.services.create') }}" class="quick-action-btn cyan" id="qa-add-service">
          <i class="bi bi-plus-square-fill"></i>
          <div>
            <div style="font-weight:600;font-size:13px;color:var(--text-primary)">+ Tambah Layanan</div>
            <div style="font-size:11px;color:var(--text-muted)">Buat layanan baru</div>
          </div>
        </a>
        <a href="{{ route('admin.testimonials.create') }}" class="quick-action-btn green" id="qa-add-testimonial">
          <i class="bi bi-chat-quote"></i>
          <div>
            <div style="font-weight:600;font-size:13px;color:var(--text-primary)">+ Tambah Testimoni</div>
            <div style="font-size:11px;color:var(--text-muted)">Tambah ulasan klien</div>
          </div>
        </a>
        <a href="{{ route('admin.clients.create') }}" class="quick-action-btn" id="qa-add-client" style="border-color:rgba(245,158,11,0.3)">
          <i class="bi bi-person-plus-fill" style="color:var(--accent-orange)"></i>
          <div>
            <div style="font-weight:600;font-size:13px;color:var(--text-primary)">+ Tambah Klien</div>
            <div style="font-size:11px;color:var(--text-muted)">Upload logo mitra baru</div>
          </div>
        </a>
        <a href="{{ route('admin.contacts.index', ['status'=>'unread']) }}" class="quick-action-btn" id="qa-view-unread" style="border-color:rgba(239,68,68,0.3)">
          <i class="bi bi-envelope-exclamation" style="color:var(--accent-red)"></i>
          <div>
            <div style="font-weight:600;font-size:13px;color:var(--text-primary)">Pesan Belum Dibaca</div>
            <div style="font-size:11px;color:var(--accent-red)">{{ $unreadCount }} pesan menunggu</div>
          </div>
        </a>
      </div>
    </div>
  </div>
</div>

@endsection
