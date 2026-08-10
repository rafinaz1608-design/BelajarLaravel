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





    <!-- Testimonials Section -->
    <section id="testimonials" class="testimonials section light-background">

      <!-- Section Title -->
      <div class="container section-title" data-aos="fade-up">
        <h2>Testimoni Client</h2>
      </div><!-- End Section Title -->

      <div class="container" data-aos="fade-up" data-aos-delay="100">

        <div class="swiper init-swiper">
          <script type="application/json" class="swiper-config">
            {
              "loop": true,
              "speed": 600,
              "autoplay": {
                "delay": 5000
              },
              "slidesPerView": "auto",
              "pagination": {
                "el": ".swiper-pagination",
                "type": "bullets",
                "clickable": true
              },
              "breakpoints": {
                "320": {
                  "slidesPerView": 1,
                  "spaceBetween": 40
                },
                "1200": {
                  "slidesPerView": 3,
                  "spaceBetween": 1
                }
              }
            }
          </script>
          <div class="swiper-wrapper">

            <div class="swiper-slide">
              <div class="testimonial-item">
                <div class="stars">
                  <i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i>
                </div>
                <p>
                  "Pelayanan yang diberikan sangat profesional dan responsif. Proses distribusi CNG berjalan sesuai jadwal dengan standar keselamatan yang baik. Kami puas dengan kualitas layanan PT. Pratama Energy Mandiri."
                </p>
                <div class="profile mt-auto">
                  <img src="{{ asset('assets/img/testimonials/default-avatar.png') }}" class="testimonial-img" alt="">
                  <h3>PT. Surya Industri Indonesia</h3>
                  <h4>Manufacturing Company</h4>
                </div>
              </div>
            </div><!-- End testimonial item -->

            <div class="swiper-slide">
              <div class="testimonial-item">
                <div class="stars">
                  <i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i>
                </div>
                <p>
                  "Tim konstruksi bekerja dengan rapi, tepat waktu, dan sesuai spesifikasi proyek. Komunikasi selama pengerjaan juga sangat baik sehingga pekerjaan dapat diselesaikan dengan lancar."
                </p>
                <div class="profile mt-auto">
                  <img src="{{ asset('assets/img/testimonials/default-avatar.png') }}" class="testimonial-img" alt="">
                  <h3>CV. Karya Teknik Mandiri</h3>
                  <h4>Project Partner</h4>
                </div>
              </div>
            </div><!-- End testimonial item -->

            <div class="swiper-slide">
              <div class="testimonial-item">
                <div class="stars">
                  <i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i>
                </div>
                <p>
                  "Kami mempercayakan kebutuhan energi perusahaan kepada PT. Pratama Energy Mandiri karena layanan yang cepat, aman, dan didukung tenaga kerja yang berpengalaman."
                </p>
                <div class="profile mt-auto">
                  <img src="{{ asset('assets/img/testimonials/default-avatar.png') }}" class="testimonial-img" alt="">
                  <h3>PT. Nusantara Logistik</h3>
                  <h4>Industrial Client</h4>
                </div>
              </div>
            </div><!-- End testimonial item -->

            <div class="swiper-slide">
              <div class="testimonial-item">
                <div class="stars">
                  <i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i>
                </div>
                <p>
                  "Mulai dari konsultasi hingga pelaksanaan proyek, seluruh proses berjalan dengan profesional. Kami berharap dapat terus menjalin kerja sama pada proyek berikutnya."
                </p>
                <div class="profile mt-auto">
                  <img src="{{ asset('assets/img/testimonials/default-avatar.png') }}" class="testimonial-img" alt="">
                  <h3>PT. Cipta Konstruksi Sejahtera</h3>
                  <h4>Business Partner</h4>
                </div>
              </div>
            </div><!-- End testimonial item -->

          </div>
          <div class="swiper-pagination"></div>
        </div>

      </div>

    </section><!-- /Testimonials Section -->
