    <!-- Services Section -->
    <section id="services" class="services section light-background">

      <!-- Section Title -->
      <div class="container section-title" data-aos="fade-up">
        <h2>Layanan Kami</h2>
        <p>Kami menyediakan berbagai solusi di bidang energi dan konstruksi untuk memenuhi kebutuhan industri dengan mengutamakan kualitas, keselamatan, dan profesionalisme.</p>
      </div><!-- End Section Title -->

      <div class="container">

        <div class="row g-5">

          @foreach($services as $service)
            <div class="col-lg-6" data-aos="fade-up" data-aos-delay="{{ ($loop->index + 1) * 100 }}">
              <div class="service-item {{ $service->color_class ?? 'item-cyan' }} position-relative">
                <i class="{{ $service->icon ?? 'bi bi-activity' }} icon"></i>
                <div>
                  <h3>{{ $service->title }}</h3>
                  <p>{{ $service->short_description }}</p>
                  <a href="{{ route('services.show', $service->slug) }}" class="read-more stretched-link">Detail Layanan <i class="bi bi-arrow-right"></i></a>
                </div>
              </div>
            </div><!-- End Service Item -->
          @endforeach

        </div>

      </div>

    </section><!-- /Services Section -->

    <!-- More Features Section -->
    <section id="more-features" class="more-features section">

      <div class="container">

        <div class="row justify-content-around gy-4">

          <div class="col-lg-6 d-flex flex-column justify-content-center order-2 order-lg-1" data-aos="fade-up" data-aos-delay="100">
            <h3>Mengapa Memilih PT. Pratama Energy Mandiri?</h3>
            <p>PT. Pratama Energy Mandiri berkomitmen menghadirkan solusi energi dan konstruksi yang berkualitas melalui pelayanan profesional, tenaga kerja kompeten, serta standar keselamatan yang tinggi. Kami terus berinovasi untuk memberikan layanan yang andal dan berkelanjutan bagi setiap mitra dan pelanggan.</p>

            <div class="row">

              <div class="col-lg-6 icon-box d-flex">
                <i class="bi bi-person-check flex-shrink-0"></i>
                <div>
                  <h4>Profesional</h4>
                  <p>Didukung tenaga kerja yang berpengalaman dan kompeten dalam bidang energi serta konstruksi untuk memberikan hasil kerja yang optimal.</p>
                </div>
              </div><!-- End Icon Box -->

              <div class="col-lg-6 icon-box d-flex">
                <i class="bi bi-patch-check flex-shrink-0"></i>
                <div>
                  <h4>Kualitas Terjamin</h4>
                  <p>Setiap layanan dilaksanakan dengan mengutamakan standar mutu, keselamatan kerja, dan kepuasan pelanggan.</p>
                </div>
              </div><!-- End Icon Box -->

              <div class="col-lg-6 icon-box d-flex">
                <i class="bi bi-diagram-3 flex-shrink-0"></i>
                <div>
                  <h4>Solusi Terintegrasi</h4>
                  <p>Menyediakan layanan mulai dari distribusi CNG, pembangunan infrastruktur gas, hingga pekerjaan Civil, Mechanical, dan Electrical dalam satu layanan terpadu.</p>
                </div>
              </div><!-- End Icon Box -->

              <div class="col-lg-6 icon-box d-flex">
                <i class="bi bi-emoji-smile flex-shrink-0"></i>
                <div>
                  <h4>Berorientasi pada Kepuasan Pelanggan</h4>
                  <p>Membangun hubungan jangka panjang dengan pelanggan melalui pelayanan terbaik, ketepatan waktu, dan komitmen terhadap keberlanjutan.</p>
                </div>
              </div><!-- End Icon Box -->

            </div>

          </div>

          <div class="features-image col-lg-5 order-1 order-lg-2" data-aos="fade-up" data-aos-delay="200">
            <img src="{{ asset('assets/img/features-3.jpg') }}" alt="">
          </div>

        </div>

      </div>

    </section><!-- /More Features Section -->

