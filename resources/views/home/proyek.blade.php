    <!-- Projects Section -->
    <section id="proyek" class="proyek section">

      <!-- Section Title -->
      <div class="container section-title" data-aos="fade-up">
        <h2>Proyek Kami</h2>
        <p>Beberapa dokumentasi pekerjaan dan proyek PT. Pratama Energy Mandiri.</p>
      </div><!-- End Section Title -->

      <div class="container">

        <div class="row gy-4">

          @foreach($projects as $project)
            <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="{{ ($loop->index + 1) * 100 }}">
              <div class="card h-100 border-0 shadow-sm rounded-4 overflow-hidden position-relative">
                @php
                  $projectImg = $project->image
                    ? (Str::startsWith($project->image, 'assets/') ? asset($project->image) : Storage::url($project->image))
                    : asset('assets/img/features-1.jpg');
                @endphp
                <img src="{{ $projectImg }}" class="card-img-top" alt="{{ $project->title }}" style="height: 220px; object-fit: cover;">
                <div class="card-body p-4 d-flex flex-column">
                  <div class="mb-2">
                    <span class="badge px-3 py-2 me-1" style="background-color: var(--accent-color, #800000); color: #fff;">{{ $project->category }}</span>
                    @if($project->location)
                      <span class="badge bg-secondary px-2 py-2"><i class="bi bi-geo-alt me-1"></i>{{ $project->location }}</span>
                    @endif
                  </div>
                  <h5 class="card-title font-weight-bold mb-2">{{ $project->title }}</h5>
                  @if($project->client_name)
                    <p class="text-primary small mb-2 fw-semibold"><i class="bi bi-building me-1"></i>{{ $project->client_name }}</p>
                  @endif
                  <p class="card-text text-muted small mb-3 flex-grow-1">{{ Str::limit($project->short_description, 110) }}</p>
                  <div class="pt-2 border-top">
                    <a href="{{ route('projects.show', $project->slug) }}" class="btn btn-sm text-primary p-0 fw-bold stretched-link">
                      Detail Proyek <i class="bi bi-arrow-right"></i>
                    </a>
                  </div>
                </div>
              </div>
            </div><!-- End Project Item -->
          @endforeach

        </div>

      </div>

    </section><!-- /Projects Section -->
