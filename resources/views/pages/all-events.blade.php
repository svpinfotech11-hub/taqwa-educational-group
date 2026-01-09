      @extends('pages.partials.app')
      @section('content')

      <style>
          .section-pt-140 {
              padding-top: 50px;
          }

          ul.pagination {
              display: flex;
              align-items: center;
              justify-content: center;
          }

          .hover-shadow:hover {
              box-shadow: 0 8px 25px rgba(0, 0, 0, 0.08);
              transform: translateY(-3px);
              transition: all 0.3s ease-in-out;
          }

          .hover-primary:hover {
              color: #0d6efd !important;
          }
      </style>
      <section class="breadcrumb__area breadcrumb__bg" data-background="{{ asset('subpage_banners/'.$page->image) }}">
          <div class="container">
              <div class="row">
                  <div class="col-12">
                      <div class="breadcrumb__content">
                          <h3 class="title text-center text-white">{{ $page->title }}</h3>
                          <nav class="breadcrumb">
                              <span property="itemListElement" typeof="ListItem">
                                  <!-- <a href="{{ route('pages.home') }}">Home</a> -->
                              </span>
                              <!-- <span class="breadcrumb-separator"><i class="fas fa-angle-right"></i></span> -->
                              <!-- <span property="itemListElement" typeof="ListItem">News List</span> -->
                          </nav>
                      </div>
                  </div>
              </div>
          </div>
          <div class="breadcrumb__shape-wrap">
              <img src="{{ asset('assets/img/others/breadcrumb_shape01.svg') }}" alt="img" class="alltuchtopdown">
              <img src="{{ asset('assets/img/others/breadcrumb_shape02.svg') }}" alt="img" data-aos="fade-right" data-aos-delay="300">
              <img src="{{ asset('assets/img/others/breadcrumb_shape03.svg') }}" alt="img" data-aos="fade-up" data-aos-delay="400">
              <img src="{{ asset('assets/img/others/breadcrumb_shape04.svg') }}" alt="img" data-aos="fade-down-left" data-aos-delay="400">
              <img src="{{ asset('assets/img/others/breadcrumb_shape05.svg') }}" alt="img" data-aos="fade-left" data-aos-delay="400">
          </div>
      </section>

      <!-- blog-area -->
      <section class="blog__post-area-six section-pt-140 section-pb-110" style="background-color: #f8f9fa;">
          <div class="container">
              <!-- Section Header -->
              <div class="row justify-content-center mb-5">
                  <div class="col-xl-6">
                      <div class="section__title text-center">
                          <h2 class="title fw-bold">📰 Our Latest News</h2>
                          <p class="text-muted">Stay updated with the latest happenings and announcements.</p>
                      </div>
                  </div>
              </div>

              <!-- News List -->
              <div class="row justify-content-center">
                    <div class="row">
                          @forelse ($allEvents as $event)
                          <div class="col-lg-3 col-md-4 mb-4">
                              <div class="p-3 rounded shadow-sm bg-white hover-shadow transition h-100 d-flex flex-column">
                                  <!-- Image -->
                                  <a href="{{ route('pages.news-details', $event->id) }}">
                                      <img src="{{ asset('events/' . $event->image) }}"
                                          alt="{{ $event->name }}"
                                          class="img-fluid rounded-3 w-100"
                                          style="height: 200px; object-fit: cover;">
                                  </a>

                                  <!-- Content -->
                                  <div class="news-content mt-3">
                                      <h5 class="fw-bold mb-2">
                                          <a style="font-size:16px" href="{{ route('pages.news-details', $event->id) }}"
                                              class="text-dark text-decoration-none hover-primary">
                                              {{ $event->name }}
                                          </a>
                                      </h5>

                                      <p class="text-muted mb-2" style="line-height: 1.4;">
                                          {{ Str::limit(strip_tags($event->desc), 20, '...') }}
                                      </p>

                                      <div class="mb-2 text-muted">
                                          <i class="flaticon-calendar me-1"></i>
                                          {{ \Carbon\Carbon::parse($event->event_date)->format('d M Y') }}
                                      </div>

                                      <a href="{{ route('pages.event-detail-page', $event->id) }}"
                                          class="btn btn-outline-primary btn-sm mt-auto">
                                          Read More <i class="fas fa-arrow-right ms-1"></i>
                                      </a>
                                  </div>
                              </div>
                          </div>
                          @empty
                          <p>No events found.</p>
                          @endforelse
                      </div>
              </div>

              <!-- Pagination -->
              <div class="row text-center mt-4">
                  <div class="col-12">
                      {{ $allEvents->links('pagination::bootstrap-4') }}
                  </div>
              </div>
          </div>
      </section>


      @endsection