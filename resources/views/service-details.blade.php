@extends('layouts.app')

@section('content')

  @include('partials.navbar')

  <main class="main">

    <!-- Page Title -->
    <div class="page-title" data-aos="fade">
      <div class="container d-lg-flex justify-content-between align-items-center">
        <h1 class="mb-2 mb-lg-0"></h1>
        <nav class="breadcrumbs">
          <ol>
            <li><a href="{{ url('/') }}"></a></li>
            <li><a href="{{ url('/') }}#services"></a></li>
            <li class="current"></li>
          </ol>
        </nav>
      </div>
    </div><!-- End Page Title -->

    <!-- Service Details Section -->
    <section id="service-details" class="service-details section">

      <div class="container">

        <div class="row gy-5">

          <div class="col-lg-4" data-aos="fade-up" data-aos-delay="100">

            <div class="service-box">
              <h4>Daftar Layanan Kami</h4>
              <div class="services-list">
                @foreach($allServices as $item)
                  <a href="{{ route('services.show', $item->slug) }}" class="{{ $item->id === $service->id ? 'active' : '' }}">
                    <i class="bi bi-arrow-right-circle"></i>
                    <span>{{ $item->title }}</span>
                  </a>
                @endforeach
              </div>
            </div><!-- End Services List -->

            <div class="service-box">
              <h4>Katalog & Dokumen</h4>
              <div class="download-catalog">
                <a href="#"><i class="bi bi-filetype-pdf"></i><span>Company Profile PDF</span></a>
                <a href="#"><i class="bi bi-file-earmark-word"></i><span>Katalog Layanan DOC</span></a>
              </div>
            </div><!-- End Download Catalog -->

            <div class="help-box d-flex flex-column justify-content-center align-items-center">
              <i class="bi bi-headset help-icon"></i>
              <h4>Ada Pertanyaan?</h4>
              <p class="d-flex align-items-center mt-2 mb-0"><i class="bi bi-telephone me-2"></i> <span>0813-5703-5381</span></p>
              <p class="d-flex align-items-center mt-1 mb-0"><i class="bi bi-envelope me-2"></i> <a href="mailto:pem@pratamaenergymandiri.co.id">pem@pratamaenergymandiri.co.id</a></p>
              <a href="{{ url('/') }}#contact" class="btn btn-warning text-white mt-3 fw-bold rounded-pill px-4">Konsultasi Sekarang</a>
            </div>

          </div>

          <div class="col-lg-8 ps-lg-5" data-aos="fade-up" data-aos-delay="200">
            <img src="{{ asset($service->image ?? 'assets/img/services.jpg') }}" alt="{{ $service->title }}" class="img-fluid services-img mb-4 rounded shadow-sm">
            
            <h2 class="fw-bold mb-3">{{ $service->title }}</h2>
            
            <div class="service-description lead text-secondary mb-4">
              {{ $service->full_description }}
            </div>

            @if(!empty($service->features))
              <h4 class="fw-bold mt-4 mb-3">Keunggulan & Fitur Layanan:</h4>
              <ul class="list-unstyled">
                @foreach($service->features as $feature)
                  <li class="d-flex align-items-start mb-2">
                    <i class="bi bi-check-circle-fill text-primary me-2 mt-1"></i>
                    <span>{{ $feature }}</span>
                  </li>
                @endforeach
              </ul>
            @endif

            <div class="card border-0 bg-light p-4 mt-5 rounded-4 shadow-sm">
              <h5 class="fw-bold text-dark mb-2">Mengapa Memilih Layanan Ini dari PT Pratama Energy Mandiri?</h5>
              <p class="mb-0 text-muted">
                Kami berkomitmen memberikan standar keselamatan kerja tinggi (K3), efisiensi biaya, serta jaminan mutu operasional untuk setiap layanan di bidang energi dan konstruksi.
              </p>
            </div>

          </div>

        </div>

      </div>

    </section><!-- /Service Details Section -->

  </main>

  @include('partials.footer')

  @include('partials.scripts')

@endsection