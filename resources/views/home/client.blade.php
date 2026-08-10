    <!-- Clients & Testimonials Section -->
    <section id="clients" class="clients section light-background">

      <!-- Section Title -->
      <div class="container section-title" data-aos="fade-up">
        <h2>Klien & Mitra Kepercayaan</h2>
        <p>Mitra industri dan perusahaan terkemuka yang mempercayakan kebutuhan energi CNG dan proyek konstruksi kepada PT. Pratama Energy Mandiri.</p>
      </div><!-- End Section Title -->

      <div class="container" data-aos="fade-up" data-aos-delay="100">

        <!-- Logo Klien & Partner -->
        <div class="row gy-4 justify-content-center align-items-center mb-5">
          @foreach($clients as $client)
            <div class="col-xl-2 col-md-3 col-6 client-logo d-flex justify-content-center align-items-center p-3">
              <img src="{{ asset($client->logo) }}" class="img-fluid" alt="{{ $client->name }}" title="{{ $client->name }}">
            </div><!-- End Client Item -->
          @endforeach
        </div>

      </div>

      <!-- Testimoni Klien -->
      <div class="container" data-aos="fade-up" data-aos-delay="200">

        <div class="text-center mb-4">
          <h3 class="fw-bold text-dark mb-1">Apa Kata Klien Kami</h3>
          <p class="text-muted small">Ulasan dan testimoni langsung dari mitra kerja yang telah bekerjasama dengan kami.</p>
        </div>

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
                  "spaceBetween": 20
                }
              }
            }
          </script>
          <div class="swiper-wrapper">

            @foreach($testimonials as $testimonial)
              <div class="swiper-slide">
                <div class="testimonial-item h-100 p-4 rounded-4 shadow-sm bg-white border d-flex flex-column justify-content-between">
                  <div>
                    <div class="stars text-warning mb-3">
                      @for($i = 0; $i < ($testimonial->rating ?? 5); $i++)
                        <i class="bi bi-star-fill"></i>
                      @endfor
                    </div>
                    <p class="fst-italic text-secondary mb-4">
                      "{{ $testimonial->content }}"
                    </p>
                  </div>
                  <div class="profile d-flex align-items-center pt-3 border-top mt-auto">
                    <img src="{{ asset($testimonial->avatar ?? 'assets/img/testimonials/default-avatar.png') }}" class="testimonial-img rounded-circle me-3" alt="{{ $testimonial->client_name }}" style="width: 50px; height: 50px; object-fit: cover;">
                    <div>
                      <h5 class="fw-bold mb-0 text-dark fs-6">{{ $testimonial->client_name }}</h5>
                      <small class="text-primary fw-medium">{{ $testimonial->company }} @if($testimonial->role) — {{ $testimonial->role }} @endif</small>
                    </div>
                  </div>
                </div>
              </div><!-- End testimonial item -->
            @endforeach

          </div>
          <div class="swiper-pagination mt-4 position-relative"></div>
        </div>

      </div>

    </section><!-- /Clients & Testimonials Section -->
