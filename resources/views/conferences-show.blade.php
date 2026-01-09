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

          .blog__post-item-four {
              border: 1px solid #e3e3e3;
              background: var(--tg-common-color-white);
              border-radius: 0px;
              padding: 30px 30px 35px;
              margin-bottom: 30px;
              margin-top: 20px;
          }

          /* h4.title {
              height: 60px;
          } */
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

      <div class="container">
          <div class="row">
              @forelse($conference as $c)
              <div class="col-md-6 col-sm-12">
                  <div class="blog__post-item-four shine__animate-item text-center" style="border:1px solid #eee;">

                      <h4 class="title">
                          <a href="{{ route('show-page', $c->slug) }}">
                              {{ $c->title }}
                          </a>
                      </h4>
                  </div>
              </div>
              @empty
              <div class="col-12 text-center">
                  <p>No results available.</p>
              </div>
              @endforelse
          </div>
      </div>
      @endsection