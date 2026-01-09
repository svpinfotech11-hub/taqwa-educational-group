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
                  <div class="col-lg-10">
                      @forelse ($news as $item)
                      <div class="row align-items-center mb-5 p-3 rounded shadow-sm bg-white hover-shadow transition">
                          <!-- Image -->
                          <div class="col-md-6 mb-3 mb-md-0">
                              <a href="{{ route('pages.news-details', $item->id) }}">
                                  <img src="{{ asset('uploads/news/' . $item->image) }}"
                                      alt="{{ $item->title }}"
                                      class="img-fluid rounded-3 w-100"
                                      style="height: 280px; object-fit: cover;">
                              </a>
                          </div>

                          <!-- Content -->
                          <div class="col-md-6">
                              <div class="news-content ps-md-3">
                                  <h3 class="fw-bold mb-3">
                                      <a href="{{ route('pages.news-details', $item->id) }}"
                                          class="text-dark text-decoration-none hover-primary">
                                          {{ $item->title }}
                                      </a>
                                  </h3>

                                  <p class="text-muted mb-3" style="line-height: 1.6;">
                                      {{ Str::limit(strip_tags($item->description), 180, '...') }}
                                  </p>

                                  <div class="d-flex align-items-center text-muted small">
                                      <i class="flaticon-calendar me-2"></i>
                                      {{ \Carbon\Carbon::parse($item->news_date)->format('d M Y') }}
                                  </div>

                                  <a href="{{ route('pages.news-details', $item->id) }}"
                                      class="btn btn-outline-primary btn-sm mt-3 px-4">
                                      Read More <i class="fas fa-arrow-right ms-2"></i>
                                  </a>
                              </div>
                          </div>
                      </div>
                      @empty
                      <div class="text-center py-5">
                          <h5 class="text-muted">No news available at the moment.</h5>
                      </div>
                      @endforelse
                  </div>
              </div>

              <!-- Pagination -->
              <div class="row text-center mt-4">
                  <div class="col-12">
                      {{ $news->links('pagination::bootstrap-4') }}
                  </div>
              </div>
          </div>
      </section>


      @endsection