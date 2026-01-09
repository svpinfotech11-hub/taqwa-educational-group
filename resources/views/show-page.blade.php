      @extends('pages.partials.app')
      @section('content')

      <style>
          .headingText h1 {
              font-size: 29px;
              margin-top: 20px;
              text-align: center;
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

      <div class="container">

          <div class="row">
              <div class="col-10 mx-auto">
                  <!-- Conference Title -->
                  <div class="headingText">
                      <h1>{{ $conference->title }}</h1>
                  </div>

                  <hr>

                  <!-- ========================= -->
                  <!--       ALL PDFs LIST       -->
                  <!-- ========================= -->
                  <h3 class="mt-4">All PDF Files</h3>
                  @if(count($allPdfs) > 0)
                  <div class="row">
                      @foreach ($allPdfs as $pdf)
                      <div class="col-md-3 col-sm-6 mb-3 text-center">
                          <a href="{{ asset($pdf) }}" target="_blank" class="btn btn-outline-primary w-100">
                              Click here
                          </a>
                      </div>
                      @endforeach
                  </div>
                  @else
                  <p>No PDFs uploaded for this conference.</p>
                  @endif

                  <hr>

                  <!-- ========================= -->
                  <!--    ALL VIDEO LINKS LIST   -->
                  <!-- ========================= -->
                  <h3 class="mt-4">All Video Links</h3>
                  @if(count($allVideos) > 0)
                  <div class="row">
                      <!-- @foreach ($allVideos as $video)
              <div class="col-md-4 col-sm-6 mb-3">
                  <a href="{{ $video }}" target="_blank" class="btn btn-outline-success w-100">
                      {{ $video }}
                  </a>
              </div>
              @endforeach -->
                      @foreach ($allVideos as $video)
                      @php
                      // Convert YouTube links to embed format
                      if (strpos($video, 'youtu.be') !== false) {
                      // short link format
                      $id = substr(parse_url($video, PHP_URL_PATH), 1);
                      $video = "https://www.youtube.com/embed/" . $id;
                      } elseif (strpos($video, 'watch?v=') !== false) {
                      // long link format
                      $video = str_replace('watch?v=', 'embed/', $video);
                      }
                      @endphp

                      <div class="col-md-4 col-sm-6 mb-3">
                          <iframe width="100%" height="240"
                              src="{{ $video }}"
                              frameborder="0"
                              allowfullscreen>
                          </iframe>
                      </div>
                      @endforeach

                  </div>
                  @else
                  <p>No videos uploaded for this conference.</p>
                  @endif
                  <hr>
              </div>
          </div>

      </div>


      @endsection