    <!-- Contact Section -->
    <section id="contact" class="contact section">

      <!-- Section Title -->
      <div class="container section-title" data-aos="fade-up">
        <h2>Hubungi Kami</h2>
        <p>Hubungi kami untuk mendapatkan informasi mengenai layanan distribusi CNG, jasa konstruksi, maupun peluang kerja sama. Tim PT. Pratama Energy Mandiri siap memberikan solusi terbaik sesuai kebutuhan Anda.</p>
      </div><!-- End Section Title -->

      <div class="container" data-aos="fade-up" data-aos-delay="100">

        <div class="row gy-4">

          <div class="col-md-6">
            <div class="info-item d-flex flex-column justify-content-center align-items-center h-100" data-aos="fade-up" data-aos-delay="200">
              <i class="bi bi-geo-alt"></i>
              <h3>Alamat</h3>
              <p class="text-center">Pergudangan Sun City Biz Blok A No. 46<br>Jl. Arteri Baru, Desa/Kelurahan Wunut<br>Kecamatan Porong, Kabupaten Sidoarjo<br>Jawa Timur 61274</p>
            </div>
          </div><!-- End Info Item -->

          <div class="col-md-6">
            <div class="info-item d-flex flex-column justify-content-center align-items-center h-100" data-aos="fade-up" data-aos-delay="300">
              <i class="bi bi-telephone"></i>
              <h3>Telepon</h3>
              <p>0813-5703-5381 (Nikki Ferrari)</p>
            </div>
          </div><!-- End Info Item -->

          <div class="col-md-6">
            <div class="info-item d-flex flex-column justify-content-center align-items-center h-100" data-aos="fade-up" data-aos-delay="400">
              <i class="bi bi-envelope"></i>
              <h3>Email</h3>
              <p>pem@pratamaenergymandiri.co.id</p>
            </div>
          </div><!-- End Info Item -->

          <div class="col-md-6">
            <div class="info-item d-flex flex-column justify-content-center align-items-center h-100" data-aos="fade-up" data-aos-delay="500">
              <i class="bi bi-globe"></i>
              <h3>Website</h3>
              <p>www.pratamaenergy.com</p>
            </div>
          </div><!-- End Info Item -->

        </div>

        <div class="row gy-4 mt-1">
          <div class="col-lg-6" data-aos="fade-up" data-aos-delay="300">
            <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3955.494333088348!2d112.69802059999999!3d-7.5209340000000005!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2dd7df001a74bc23%3A0xe0d7c63c28a93e3e!2sPT%20Pratama%20Energy%20Mandiri!5e0!3m2!1sid!2sid!4v1784786768725!5m2!1sid!2sid" style="border:0; width: 100%; height: 400px;" allowfullscreen="" loading="lazy" referrerpolicy="strict-origin-when-cross-origin"></iframe>
          </div><!-- End Google Maps -->

          <div class="col-lg-6">
            <form action="{{ route('contact.store') }}" method="post" class="php-email-form" data-aos="fade-up" data-aos-delay="400">
              @csrf
              <div class="row gy-4">

                <div class="col-md-6">
                  <input type="text" name="name" class="form-control @error('name') is-invalid @enderror" placeholder="Nama Anda" value="{{ old('name') }}" required="">
                  @error('name')
                    <div class="text-danger small mt-1"><i class="bi bi-exclamation-circle"></i> {{ $message }}</div>
                  @enderror
                </div>

                <div class="col-md-6 ">
                  <input type="email" class="form-control @error('email') is-invalid @enderror" name="email" placeholder="Email Anda" value="{{ old('email') }}" required="">
                  @error('email')
                    <div class="text-danger small mt-1"><i class="bi bi-exclamation-circle"></i> {{ $message }}</div>
                  @enderror
                </div>

                <div class="col-md-12">
                  <input type="text" class="form-control @error('subject') is-invalid @enderror" name="subject" placeholder="Subjek / Topik Konsultasi" value="{{ old('subject') }}" required="">
                  @error('subject')
                    <div class="text-danger small mt-1"><i class="bi bi-exclamation-circle"></i> {{ $message }}</div>
                  @enderror
                </div>

                <div class="col-md-12">
                  <textarea class="form-control @error('message') is-invalid @enderror" name="message" rows="6" placeholder="Pesan / Detail Kebutuhan Proyek" required="">{{ old('message') }}</textarea>
                  @error('message')
                    <div class="text-danger small mt-1"><i class="bi bi-exclamation-circle"></i> {{ $message }}</div>
                  @enderror
                </div>

                <div class="col-md-12 text-center">
                  <div class="loading">Loading</div>
                  <div class="error-message"></div>
                  <div class="sent-message">Pesan Anda telah dikirim. Terima kasih!</div>

                  <button type="submit">Kirim Pesan</button>
                </div>

              </div>
            </form>

            @if(session('success'))
              <div class="alert alert-success mt-3" role="alert">
                {{ session('success') }}
              </div>
            @endif
          </div><!-- End Contact Form -->

        </div>

      </div>

    </section><!-- /Contact Section -->
