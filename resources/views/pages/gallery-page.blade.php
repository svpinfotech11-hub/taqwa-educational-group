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
      <!-- gallery-page.blade.php -->
      <section class="blog__post-area-six section-pt-140 section-pb-110">
          <div class="container">
              <div class="row justify-content-center">
                  <div class="col-xl-6">
                      <div class="section__title text-center mb-50">
                          <h2 class="title">Gallery</h2>
                      </div>
                  </div>
              </div>

              <div class="row justify-content-center">
                  @forelse ($galleries as $gallery)
                  <div class="col-lg-4 col-md-6 mb-4">
                      <div class="blog__post-item-four shine__animate-item">
                          <div class="blog__post-thumb-four">
                              <a href="{{ route('pages.gallery-details', $gallery->id) }}" class="shine__animate-link">
                                  <img
                                      src="{{ $gallery->thumbnail 
                                        ? asset('galleries/' . $gallery->thumbnail) 
                                        : asset('assets/img/no-image.jpg') }}"
                                      alt="{{ $gallery->title }}"
                                      class="img-fluid">
                              </a>
                          </div>
                          <div class="blog__post-content-four text-center">
                              <h2 class="title">
                                  <a href="{{ route('pages.gallery-details', $gallery->id) }}">
                                      {{ $gallery->title }}
                                  </a>
                              </h2>
                              <div class="blog__post-meta">
                                  <ul class="list-wrap">
                                      <!-- <li>
                                          <i class="flaticon-calendar"></i>
                                          {{ $gallery->created_at ? $gallery->created_at->format('d M Y') : '—' }}
                                      </li> -->
                                      <!-- <li>
                                          <i class="flaticon-picture"></i>
                                          {{ $gallery->images->count() }} photos
                                      </li> -->
                                  </ul>
                              </div>
                          </div>
                      </div>
                  </div>
                  @empty
                  <div class="col-12 text-center">
                      <p>No galleries available at the moment.</p>
                  </div>
                  @endforelse
              </div>

              <!-- Pagination -->
              <div class="row text-center mt-4">
                  <div class="col-12">
                      {{ $galleries->links('pagination::bootstrap-4') }}
                  </div>
              </div>
          </div>
      </section>


      @endsection