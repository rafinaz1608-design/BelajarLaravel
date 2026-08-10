@extends('layouts.app')

@section('content')

  @include('partials.navbar')

  <main class="main">

    <!-- Page Title -->
    <div class="page-title" data-aos="fade">
      <div class="container d-lg-flex justify-content-between align-items-center">
        <h1 class="mb-2 mb-lg-0">{{ $project->title }}</h1>
        <nav class="breadcrumbs">
          <ol>
            <li><a href="{{ url('/') }}">Beranda</a></li>
            <li><a href="{{ url('/') }}#proyek">Proyek Kami</a></li>
            <li class="current">{{ $project->title }}</li>
          </ol>
        </nav>
      </div>
    </div><!-- End Page Title -->

    <!-- Project Details Section -->
    <section id="project-details" class="project-details section">

      <div class="container">

        <div class="row gy-5">

          <div class="col-lg-4" data-aos="fade-up" data-aos-delay="100">

            <div class="service-box">
              <h4>Informasi Proyek</h4>
              <ul class="list-group list-group-flush mb-3">
                <li class="list-group-item bg-transparent px-0 d-flex justify-content-between">
                  <span class="text-secondary fw-semibold">Kategori:</span>
                  <span class="badge bg-danger">{{ $project->category }}</span>
                </li>
                @if($project->client_name)
                  <li class="list-group-item bg-transparent px-0 d-flex justify-content-between">
                    <span class="text-secondary fw-semibold">Klien / Partner:</span>
                    <span class="fw-bold text-dark">{{ $project->client_name }}</span>
                  </li>
                @endif
                @if($project->location)
                  <li class="list-group-item bg-transparent px-0 d-flex justify-content-between">
                    <span class="text-secondary fw-semibold">Lokasi:</span>
                    <span class="fw-bold text-dark">{{ $project->location }}</span>
                  </li>
                @endif
                @if($project->completion_date)
                  <li class="list-group-item bg-transparent px-0 d-flex justify-content-between">
                    <span class="text-secondary fw-semibold">Tahun Pekerjaan:</span>
                    <span class="fw-bold text-dark">{{ $project->completion_date }}</span>
                  </li>
                @endif
              </ul>
            </div><!-- End Project Info -->

            @if($allProjects->count() > 0)
              <div class="service-box">
                <h4>Proyek Lainnya</h4>
                <div class="services-list">
                  @foreach($allProjects as $item)
                    <a href="{{ route('projects.show', $item->slug) }}">
                      <i class="bi bi-arrow-right-circle me-2"></i>
                      <span>{{ Str::limit($item->title, 35) }}</span>
                    </a>
                  @endforeach
                </div>
              </div><!-- End Other Projects List -->
            @endif

            <div class="help-box d-flex flex-column justify-content-center align-items-center">
              <i class="bi bi-headset help-icon"></i>
              <h4>Butuh Layanan Serupa?</h4>
              <p class="d-flex align-items-center mt-2 mb-0"><i class="bi bi-telephone me-2"></i> <span>0813-5703-5381</span></p>
              <p class="d-flex align-items-center mt-1 mb-0"><i class="bi bi-envelope me-2"></i> <a href="mailto:pem@pratamaenergymandiri.co.id">pem@pratamaenergymandiri.co.id</a></p>
              <a href="{{ url('/') }}#contact" class="btn btn-warning text-white mt-3 fw-bold rounded-pill px-4">Konsultasi Sekarang</a>
            </div>

          </div>

          <div class="col-lg-8 ps-lg-5" data-aos="fade-up" data-aos-delay="200">
            <img src="{{ asset($project->image ?? 'assets/img/features-1.jpg') }}" alt="{{ $project->title }}" class="img-fluid rounded-4 shadow-sm mb-4 w-100" style="max-height: 450px; object-fit: cover;">
            
            <span class="badge mb-2 px-3 py-2 fs-6" style="background-color: var(--accent-color, #800000); color: #fff;">{{ $project->category }}</span>
            <h2 class="fw-bold mb-3">{{ $project->title }}</h2>
            
            <div class="lead text-secondary mb-4">
              {{ $project->short_description }}
            </div>

            <hr class="my-4">

            <h4 class="fw-bold mb-3">Deskripsi Lengkap Pekerjaan</h4>
            <div class="text-dark mb-4" style="line-height: 1.8;">
              {{ $project->full_description }}
            </div>

            @if(!empty($project->features))
              <h4 class="fw-bold mt-4 mb-3">Cakupan & Fitur Utama Pekerjaan:</h4>
              <div class="row g-3">
                @foreach($project->features as $feature)
                  <div class="col-md-6">
                    <div class="p-3 border rounded-3 bg-light h-100 d-flex align-items-start">
                      <i class="bi bi-check-circle-fill text-primary fs-5 me-2"></i>
                      <span class="fw-medium text-dark">{{ $feature }}</span>
                    </div>
                  </div>
                @endforeach
              </div>
            @endif

            <div class="card border-0 bg-light p-4 mt-5 rounded-4 shadow-sm">
              <h5 class="fw-bold text-dark mb-2">Komitmen PT. Pratama Energy Mandiri</h5>
              <p class="mb-0 text-muted">
                Seluruh proyek pengerjaan distribusi gas CNG, infrastruktur gas, serta layanan konstruksi dilaksanakan dengan mengutamakan standar keselamatan kerja tinggi (K3), kepatuhan legalitas, dan kualitas mutu terbaik bagi mitra industri.
              </p>
            </div>

            <div class="mt-4 text-end">
              <a href="{{ url('/') }}#proyek" class="btn btn-outline-primary rounded-pill px-4">
                <i class="bi bi-arrow-left me-1"></i> Kembali ke Daftar Proyek
              </a>
            </div>

          </div>

        </div>

      </div>

    </section><!-- /Project Details Section -->

  </main>

  @include('partials.footer')

  @include('partials.scripts')

@endsection
