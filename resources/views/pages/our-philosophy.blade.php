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
          width: 60px;
      }

      p {
          text-align: justify;
      }

      img.me-2.sadasd {
          width: 25px;
      }

      .section-py-120 {
          padding: 60px 0;
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


  <section class="section-py-120" style="background: #f8f9fa;">
      <div class="container">
          <div class="col-10 mx-auto">
              <!-- First Row: Mission & Vision -->
              <div class="row mb-4">
                  <div class="col-lg-12 mb-2">
                      <div class="">
                          <div class="text-white text-center py-3">
                              <p>Shaheen is the sum total of principles and values espoused by Allama Iqbal. The generation next would do well to imbibe the noble qualities advocated and practiced by Shaheen as part of its broader philosophy. The governing philosophy which influences the operational dynamics at Shaheen is driven by a specific set of lofty attributes aimed at grooming a near perfect future generation.</p>
                          </div>
                      </div>
                  </div>
              </div>

              <div class="row mb-4">
                  <!-- Left Column: Philosophy Image -->
                  <div class="col-lg-6 mb-4">
                      <div class="card shadow-sm border-0 rounded-4 h-100 text-center">
                          <div class="card-body p-4 d-flex justify-content-center align-items-center">
                              <img src="{{ asset('images/philosophy.jfif') }}" alt="Philosophy Image" class="img-fluid rounded">
                          </div>
                      </div>
                  </div>

                  <!-- Right Column: Objective List -->
                  <div class="col-lg-6 mb-4">
                      <div class="card shadow-sm border-0 rounded-4 h-100">
                          <div class="card-body p-4">
                              <ul class="list-unstyled mb-0">
                                  <li class="mb-3 d-flex align-items-start">
                                      <img src="{{ asset('images/arrow.gif') }}" alt="Arrow Icon" class="me-2 sadasd">
                                      <span>High Aspiration – (Oonchi Udaan)</span>
                                  </li>
                                  <li class="mb-3 d-flex align-items-start">
                                      <img src="{{ asset('images/arrow.gif') }}" alt="Arrow Icon" class="me-2 sadasd">
                                      <span>Clear Vision – (Tez Nigah)</span>
                                  </li>
                                  <li class="mb-3 d-flex align-items-start">
                                      <img src="{{ asset('images/arrow.gif') }}" alt="Arrow Icon" class="me-2 sadasd">
                                      <span>Preference for Solitude – (Khilwath Pasand)</span>
                                  </li>
                                  <li class="mb-3 d-flex align-items-start">
                                      <img src="{{ asset('images/arrow.gif') }}" alt="Arrow Icon" class="me-2 sadasd">
                                      <span>Untiring Effort – (Aashiyana Nahin Banata)</span>
                                  </li>
                                  <li class="mb-3 d-flex align-items-start">
                                      <img src="{{ asset('images/arrow.gif') }}" alt="Arrow Icon" class="me-2 sadasd">
                                      <span>Self Reliance – (Dusron ka Shikar Nahin Khata)</span>
                                  </li>
                              </ul>
                          </div>
                      </div>
                  </div>
              </div>

          </div>
      </div>
  </section>


  @endsection