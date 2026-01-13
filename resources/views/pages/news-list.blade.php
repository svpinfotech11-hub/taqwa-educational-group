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
          <section class="breadcrumb__area breadcrumb__bg" data-background="{{ asset('subpage_banners/' . $page->image) }}">
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
                  <img src="{{ asset('assets/img/others/breadcrumb_shape02.svg') }}" alt="img" data-aos="fade-right"
                      data-aos-delay="300">
                  <img src="{{ asset('assets/img/others/breadcrumb_shape03.svg') }}" alt="img" data-aos="fade-up"
                      data-aos-delay="400">
                  <img src="{{ asset('assets/img/others/breadcrumb_shape04.svg') }}" alt="img"
                      data-aos="fade-down-left" data-aos-delay="400">
                  <img src="{{ asset('assets/img/others/breadcrumb_shape05.svg') }}" alt="img" data-aos="fade-left"
                      data-aos-delay="400">
              </div>
          </section>

          <!-- blog-area -->
          <section class="about-area-three section-py-120">
              <div class="container">
                  <div class="row justify-content-center">
                      <div class="col-lg-8">
                          <div class="about-card text-center">

                              <span class="about-subtitle">
                                  <i class="bi bi-newspaper"></i>
                                  Latest Updates
                              </span>

                              <h2 class="about-title">
                                  {{ $news->title ?? '' }}
                              </h2>

                              <p class="about-desc">
                                  {!! $news->description ?? '' !!}
                              </p>

                          </div>
                      </div>
                  </div>
              </div>
          </section>

          <div class="media-area">
              <div class="container">
                  <div class="row g-4">
                      @forelse ($news->details as $detail)
                          @if ($detail->image)
                              <div class="col-lg-3 col-md-4 col-sm-6">
                                  <div class="bg-white shadow-sm rounded h-100 p-3">

                                      <img src="{{ asset('news/images/' . $detail->image) }}"
                                          class="img-fluid rounded w-100" style="height:200px; object-fit:cover;"
                                          alt="News Image">

                                  </div>
                              </div>
                          @endif
                          @if ($detail->video)
                              <div class="col-lg-3 col-md-4 col-sm-6">
                                  <div class="bg-white shadow-sm rounded h-100 p-3">

                                      <video class="w-100 rounded" controls style="height:200px; object-fit:cover;"
                                          poster="{{ asset('uploads/news/video_thumbs/' . $detail->thumbnail) }}">
                                          <source src="{{ asset('news/videos/' . $detail->video) }}" type="video/mp4">
                                          Your browser does not support the video tag.
                                      </video>

                                  </div>
                              </div>
                          @endif
                      @empty
                          <div class="col-12 text-center py-5">
                              <h5 class="text-muted">No news found.</h5>
                          </div>
                      @endforelse
                  </div>
              </div>
          </div>
      @endsection
