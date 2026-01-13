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

      img.aKJBDBa {
          width: 40px;
      }

      p {
          text-align: justify;
      }

      .purpose-card {
          border: 0;
          border-radius: 16px;
          padding: 24px;
          box-shadow: 0 10px 25px rgba(0, 0, 0, 0.08);
          transition: 0.3s ease;
      }

      .purpose-card:hover {
          transform: translateY(-5px);
      }

      .nav-pills .nav-link {
          border-radius: 30px;
          padding: 10px 24px;
          font-weight: 600;
      }

      .media-grid img,
      .media-grid video,
      .media-grid iframe {
          width: 100%;
          height: 100%;
          object-fit: cover;
          border-radius: 12px;
      }

      /* Fixed aspect ratio */
      .media-box {
          position: relative;
          /* ← REQUIRED */
          width: 100%;
          aspect-ratio: 16 / 9;
          background: #000;
          overflow: hidden;
          border-radius: 12px;
          box-shadow: 0 8px 20px rgba(0, 0, 0, 0.12);
      }


      .media-box:hover {
          transform: scale(1.03);
      }

      /* Remove iframe border */
      .media-box iframe {
          border: 0;
      }


      .media-box:hover::after {
          opacity: 0.8;
      }


      /* .fancybox__container {
  background-color: rgba(0, 0, 0, 0.8) !important;
  z-index: 99999 !important;
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


  <section class="section-py-120 bg-light">
      <div class="container">

          <h2 class="text-center fw-bold mb-5">
              <img src="{{ asset('images/goals.gif') }}" class="aKJBDBa">
              Our Purpose
          </h2>

          <!-- TABS -->
          <ul class="nav nav-pills justify-content-center mb-5" id="purposeTabs">
              <li class="nav-item">
                  <button class="nav-link active" data-bs-toggle="pill" data-bs-target="#mission">
                      🎯 Mission
                  </button>
              </li>
              <li class="nav-item">
                  <button class="nav-link" data-bs-toggle="pill" data-bs-target="#vision">
                      👁 Vision
                  </button>
              </li>
              <li class="nav-item">
                  <button class="nav-link" data-bs-toggle="pill" data-bs-target="#objectives">
                      ✔ Objectives
                  </button>
              </li>
          </ul>

          <div class="tab-content">

              {{-- ================= MISSION ================= --}}
              <div class="tab-pane fade show active" id="mission">
                  <div class="row">
                      @foreach($missions as $item)
                      <div class="col-md-12 mb-4">
                          <div class="card purpose-card h-100 p-4">

                              <h5 class="fw-bold text-center">{{ $item->title }}</h5>
                              <div class="text-center">{!! $item->description !!}</div>
<!-- 
                              <div class="row mt-4 media-grid">
                                  @foreach($item->media as $media)

                                  {{-- IMAGE --}}
                                  @if($media->media_type === 'image')
                                  <div class="col-md-3 mb-4">
                                      <div class="media-box">
                                          <img src="{{ asset($media->media_path) }}">
                                      </div>
                                  </div>
                                  @endif

                                  {{-- VIDEO --}}
                                  @if($media->media_type === 'video')
                                  <div class="col-md-3 mb-4">
                                      <div class="media-box">
                                          <video controls>
                                              <source src="{{ asset($media->media_path) }}">
                                          </video>
                                      </div>
                                  </div>
                                  @endif

                                  {{-- YOUTUBE --}}
                                  @if($media->media_type === 'youtube')
                                  @php
                                  preg_match(
                                  '%(?:youtube\.com/(?:[^/]+/.+/|(?:v|e(?:mbed)?)/|.*[?&]v=)|youtu\.be/)([^"&?/ ]{11})%i',
                                  $media->media_path,
                                  $match
                                  );
                                  $youtubeId = $match[1] ?? null;
                                  @endphp
                                  <div class="col-md-3 mb-4">
                                      <div class="media-box">
                                          <iframe
                                              src="https://www.youtube.com/embed/{{ $youtubeId }}"
                                              allowfullscreen>
                                          </iframe>
                                      </div>
                                  </div>
                                  @endif

                                  @endforeach
                              </div> -->

                          </div>
                      </div>
                      @endforeach
                  </div>
              </div>

              {{-- ================= VISION ================= --}}
              <div class="tab-pane fade" id="vision">
                  <div class="row">
                      @foreach($visions as $item)
                      <div class="col-md-12 mb-4">
                          <div class="card purpose-card h-100 p-4">

                              <h5 class="fw-bold text-center">{{ $item->title }}</h5>
                              <p class="text-center">{!! $item->description !!}</p>

                              <div class="row mt-4 media-grid">
                                  @foreach($item->media as $media)

                                  {{-- IMAGE --}}
                                  @if($media->media_type === 'image')
                                  <div class="col-md-3 mb-4">
                                      <div class="media-box">
                                          <img src="{{ asset($media->media_path) }}">
                                      </div>
                                  </div>
                                  @endif

                                  {{-- VIDEO --}}
                                  @if($media->media_type === 'video')
                                  <div class="col-md-3 mb-4">
                                      <div class="media-box">
                                          <video controls>
                                              <source src="{{ asset($media->media_path) }}">
                                          </video>
                                      </div>
                                  </div>
                                  @endif

                                  {{-- YOUTUBE --}}
                                  @if($media->media_type === 'youtube')
                                  @php
                                  preg_match(
                                  '%(?:youtube\.com/(?:[^/]+/.+/|(?:v|e(?:mbed)?)/|.*[?&]v=)|youtu\.be/)([^"&?/ ]{11})%i',
                                  $media->media_path,
                                  $match
                                  );
                                  $youtubeId = $match[1] ?? null;
                                  @endphp

                                  @if($youtubeId)
                                  <div class="col-md-6 mb-4">
                                      <div class="media-box">
                                          <iframe
                                              src="https://www.youtube.com/embed/{{ $youtubeId }}"
                                              allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"
                                              allowfullscreen>
                                          </iframe>
                                      </div>

                                      @if($media->description)
                                      <p class="small text-muted mt-2 text-center">
                                          {{ $media->description }}
                                      </p>
                                      @endif
                                  </div>
                                  @endif
                                  @endif

                                  @endforeach
                              </div>

                          </div>
                      </div>
                      @endforeach
                  </div>
              </div>

              {{-- ================= OBJECTIVES ================= --}}
              <div class="tab-pane fade" id="objectives">
                  @forelse($objectives as $item)
                  <div class="card purpose-card mb-3 p-4">
                      <p class="fw-semibold">✔ {!!  $item->description !! }}</p>

                      <div class="row mt-3 media-grid">
                          @foreach($item->media as $media)
                          @if($media->media_type === 'image')
                          <div class="col-md-3 mb-3">
                              <div class="media-box">
                                  <img src="{{ asset($media->media_path) }}">
                              </div>
                          </div>
                          @endif
                          {{-- VIDEO --}}
                                  @if($media->media_type === 'video')
                                  <div class="col-md-3 mb-4">
                                      <div class="media-box">
                                          <video controls>
                                              <source src="{{ asset($media->media_path) }}">
                                          </video>
                                      </div>
                                  </div>
                                  @endif

                                  {{-- YOUTUBE --}}
                                  @if($media->media_type === 'youtube')
                                  @php
                                  preg_match(
                                  '%(?:youtube\.com/(?:[^/]+/.+/|(?:v|e(?:mbed)?)/|.*[?&]v=)|youtu\.be/)([^"&?/ ]{11})%i',
                                  $media->media_path,
                                  $match
                                  );
                                  $youtubeId = $match[1] ?? null;
                                  @endphp

                                  @if($youtubeId)
                                  <div class="col-md-6 mb-4">
                                      <div class="media-box">
                                          <iframe
                                              src="https://www.youtube.com/embed/{{ $youtubeId }}"
                                              allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"
                                              allowfullscreen>
                                          </iframe>
                                      </div>

                                      @if($media->description)
                                      <p class="small text-muted mt-2 text-center">
                                          {{ $media->description }}
                                      </p>
                                      @endif
                                  </div>
                                  @endif
                                  @endif
                          @endforeach
                      </div>
                  </div>
                  @empty
                  <p class="text-center text-muted">No objectives found.</p>
                  @endforelse
              </div>

          </div>
      </div>
  </section>



  @endsection