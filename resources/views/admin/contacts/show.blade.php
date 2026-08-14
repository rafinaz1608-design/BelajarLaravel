@extends('layouts.admin')

@section('title', 'Detail Pesan')
@section('page-title', 'Detail Pesan')
@section('breadcrumb', 'Pesan Masuk')

@section('content')

<div class="page-header">
  <div class="page-header-left">
    <h2>✉️ Detail Pesan</h2>
    <p>Dari: <strong>{{ $contact->name }}</strong> — {{ $contact->created_at->format('d M Y, H:i') }}</p>
  </div>
  <div class="page-header-right">
    <a href="{{ route('admin.contacts.index') }}" class="btn btn-secondary">
      <i class="bi bi-arrow-left"></i> Kembali
    </a>
  </div>
</div>

<div style="display:grid;grid-template-columns:2fr 1fr;gap:20px">

  {{-- Message Content --}}
  <div class="admin-card">
    <div class="admin-card-header">
      <span class="admin-card-title"><i class="bi bi-envelope-open-fill"></i> Isi Pesan</span>
      @if($contact->status === 'unread')
        <span class="badge badge-unread-msg"><i class="bi bi-circle-fill" style="font-size:8px"></i> Baru Dibaca</span>
      @else
        <span class="badge badge-read"><i class="bi bi-check2"></i> Sudah Dibaca</span>
      @endif
    </div>
    <div class="admin-card-body">
      <div class="message-detail">
        <div class="message-meta">
          <div class="message-meta-item"><strong>Dari:</strong> {{ $contact->name }}</div>
          <div class="message-meta-item"><strong>Email:</strong> {{ $contact->email }}</div>
          <div class="message-meta-item"><strong>Subjek:</strong> {{ $contact->subject }}</div>
          <div class="message-meta-item"><strong>Tanggal:</strong> {{ $contact->created_at->format('d M Y H:i') }}</div>
        </div>
        <hr class="separator">
        <div class="message-content">{{ $contact->message }}</div>
      </div>
    </div>
  </div>

  {{-- Actions --}}
  <div style="display:flex;flex-direction:column;gap:16px">

    <div class="admin-card">
      <div class="admin-card-header">
        <span class="admin-card-title"><i class="bi bi-lightning-charge"></i> Aksi Cepat</span>
      </div>
      <div class="admin-card-body" style="display:flex;flex-direction:column;gap:10px">

        <a href="mailto:{{ $contact->email }}?subject=Re: {{ urlencode($contact->subject) }}"
           class="btn btn-primary w-100" id="btn-reply-email">
          <i class="bi bi-send-fill"></i> Balas via Email
        </a>

        @php
          $waMsg = urlencode("Halo {$contact->name}, terima kasih telah menghubungi kami. Mengenai pesan Anda tentang \"{$contact->subject}\"...");
        @endphp

        <a href="https://wa.me/?text={{ $waMsg }}" target="_blank"
           class="btn btn-success w-100" id="btn-reply-wa">
          <i class="bi bi-whatsapp"></i> Balas via WhatsApp
        </a>

        <hr class="separator" style="margin:4px 0">

        @if($contact->status === 'unread')
          <form action="{{ route('admin.contacts.read', $contact) }}" method="POST">
            @csrf
            <button type="submit" class="btn btn-cyan w-100" id="btn-mark-read">
              <i class="bi bi-check2-all"></i> Tandai Sudah Dibaca
            </button>
          </form>
        @else
          <form action="{{ route('admin.contacts.unread', $contact) }}" method="POST">
            @csrf
            <button type="submit" class="btn btn-secondary w-100" id="btn-mark-unread">
              <i class="bi bi-envelope"></i> Tandai Belum Dibaca
            </button>
          </form>
        @endif

        <form action="{{ route('admin.contacts.destroy', $contact) }}" method="POST"
              data-confirm="Yakin ingin menghapus pesan dari {{ $contact->name }}?">
          @csrf @method('DELETE')
          <button type="submit" class="btn btn-danger w-100" id="btn-delete">
            <i class="bi bi-trash3"></i> Hapus Pesan
          </button>
        </form>
      </div>
    </div>

    <div class="admin-card">
      <div class="admin-card-header">
        <span class="admin-card-title"><i class="bi bi-info-circle"></i> Info Pengirim</span>
      </div>
      <div class="admin-card-body">
        <div style="font-size:13px;display:flex;flex-direction:column;gap:10px">
          <div>
            <div style="color:var(--text-muted);font-size:11px;font-weight:600;text-transform:uppercase;margin-bottom:3px">Nama</div>
            <div style="color:var(--text-primary);font-weight:600">{{ $contact->name }}</div>
          </div>
          <div>
            <div style="color:var(--text-muted);font-size:11px;font-weight:600;text-transform:uppercase;margin-bottom:3px">Email</div>
            <div style="color:var(--accent-cyan)">{{ $contact->email }}</div>
          </div>
          <div>
            <div style="color:var(--text-muted);font-size:11px;font-weight:600;text-transform:uppercase;margin-bottom:3px">ID Pesan</div>
            <div style="color:var(--text-muted)">#{{ $contact->id }}</div>
          </div>
          <div>
            <div style="color:var(--text-muted);font-size:11px;font-weight:600;text-transform:uppercase;margin-bottom:3px">Diterima</div>
            <div style="color:var(--text-secondary)">{{ $contact->created_at->diffForHumans() }}</div>
          </div>
        </div>
      </div>
    </div>

  </div>
</div>

@endsection
