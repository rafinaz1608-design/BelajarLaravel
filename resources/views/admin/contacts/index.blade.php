@extends('layouts.admin')

@section('title', 'Pesan Masuk')
@section('page-title', 'Pesan Masuk')
@section('breadcrumb', 'Contacts')

@section('content')

<div class="page-header">
  <div class="page-header-left">
    <h2>📬 Pesan Masuk</h2>
    <p>Daftar pesan dari pengunjung website. Klik baris untuk membaca detail.</p>
  </div>
  <div class="page-header-right">
    <div class="filter-bar">
      <a href="{{ route('admin.contacts.index') }}" class="filter-pill {{ $filter === 'all' ? 'active' : '' }}" id="filter-all">
        Semua
      </a>
      <a href="{{ route('admin.contacts.index', ['status'=>'unread']) }}" class="filter-pill {{ $filter === 'unread' ? 'active' : '' }}" id="filter-unread">
        <i class="bi bi-circle-fill" style="font-size:8px;color:var(--accent-red)"></i>
        Belum Dibaca
        @if($unreadCount > 0)
          <span style="background:var(--accent-red);color:#fff;border-radius:20px;padding:1px 6px;font-size:10px">{{ $unreadCount }}</span>
        @endif
      </a>
      <a href="{{ route('admin.contacts.index', ['status'=>'read']) }}" class="filter-pill {{ $filter === 'read' ? 'active' : '' }}" id="filter-read">
        <i class="bi bi-check2"></i> Sudah Dibaca
      </a>
    </div>
  </div>
</div>

<div class="admin-card">
  <div class="admin-table-wrap">
    @if($contacts->isEmpty())
      <div class="empty-state">
        <i class="bi bi-inbox"></i>
        <h4>Tidak ada pesan</h4>
        <p>Belum ada pesan yang cocok dengan filter ini.</p>
      </div>
    @else
      <table class="admin-table" id="contacts-table">
        <thead>
          <tr>
            <th>#</th>
            <th>Pengirim</th>
            <th>Subjek</th>
            <th>Pesan</th>
            <th>Tanggal</th>
            <th>Status</th>
            <th>Aksi</th>
          </tr>
        </thead>
        <tbody>
          @foreach($contacts as $contact)
          <tr class="{{ $contact->status === 'unread' ? 'unread' : '' }}">
            <td style="font-size:12px;color:var(--text-muted)">{{ $contact->id }}</td>
            <td>
              <strong>{{ $contact->name }}</strong>
              <div class="text-muted-sm">{{ $contact->email }}</div>
            </td>
            <td>
              <span class="truncate">{{ $contact->subject }}</span>
            </td>
            <td>
              <span class="truncate" style="max-width:200px;color:var(--text-muted);font-size:13px">{{ $contact->message }}</span>
            </td>
            <td style="font-size:12px;color:var(--text-muted);white-space:nowrap">
              {{ $contact->created_at->format('d M Y') }}<br>
              {{ $contact->created_at->format('H:i') }}
            </td>
            <td>
              @if($contact->status === 'unread')
                <span class="badge badge-unread-msg"><i class="bi bi-circle-fill" style="font-size:8px"></i> Belum Dibaca</span>
              @else
                <span class="badge badge-read"><i class="bi bi-check2"></i> Sudah Dibaca</span>
              @endif
            </td>
            <td>
              <div class="d-flex gap-8">
                <a href="{{ route('admin.contacts.show', $contact) }}" class="btn btn-secondary btn-icon" title="Lihat Detail">
                  <i class="bi bi-eye"></i>
                </a>

                @if($contact->status === 'unread')
                  <form action="{{ route('admin.contacts.read', $contact) }}" method="POST">
                    @csrf
                    <button type="submit" class="btn btn-success btn-icon" title="Tandai Sudah Dibaca">
                      <i class="bi bi-check2-all"></i>
                    </button>
                  </form>
                @else
                  <form action="{{ route('admin.contacts.unread', $contact) }}" method="POST">
                    @csrf
                    <button type="submit" class="btn btn-secondary btn-icon" title="Tandai Belum Dibaca">
                      <i class="bi bi-envelope"></i>
                    </button>
                  </form>
                @endif

                <a href="mailto:{{ $contact->email }}?subject=Re: {{ urlencode($contact->subject) }}" class="btn btn-cyan btn-icon" title="Balas via Email">
                  <i class="bi bi-send"></i>
                </a>

                <form action="{{ route('admin.contacts.destroy', $contact) }}" method="POST" data-confirm="Hapus pesan dari {{ $contact->name }}?">
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

{{-- Pagination --}}
@if($contacts->hasPages())
  <div class="admin-pagination" style="margin-top:20px">
    {{ $contacts->appends(['status' => $filter])->links() }}
  </div>
@endif

@endsection
