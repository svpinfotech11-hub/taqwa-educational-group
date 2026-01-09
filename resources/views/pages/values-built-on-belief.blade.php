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
                              <p>Every child in this great nation, built on the foundations of democracy and social equality, is entitled to quality education. It is this firm belief that’s been the guiding light of Shaheen. If the holy Quran and Sunnah teach how to lead a spiritually rich life then proper education helps shape a person on multiple fronts. At Shaheen it’s a blend of these two that works its magic. The very best of education pertaining to various streams is imparted in tandem with tenets of Islam to ensure all round development of children into socially responsible denizens. Empowerment through education precedes everything else at Shaheen. As a fore-running academic conglomerate Shaheen has the capability to commission colleges offering higher learning courses in Engineering, Medicine or any other course; but the group focuses more on enabling students to excel their way to government colleges offering professional courses. This is how social empowerment takes precedence over self enrichment at Shaheen. A well educated child driven by Islamic values and Sunnah way of living has the potential to make a difference and Shaheen facilitates the same. The functionality of Shaheen as a forward thinking academic seat of learning hinges on a set of rock solid values and beliefs.</p>
                          </div>
                      </div>
                  </div>
              </div>

              <div class="row mb-4">
                 
                  <!-- Right Column: Objective List -->
                  <div class="col-lg-6 mb-4">
                      <div class="card shadow-sm border-0 rounded-4 h-100">
                          <div class="card-body p-4">
                            <h4>Our Objectives</h4>
                              <ul class="list-unstyled mb-0">
                                  <li class="mb-3 d-flex align-items-start">
                                      <img src="{{ asset('images/arrow.gif') }}" alt="Arrow Icon" class="me-2 sadasd">
                                      <span>Every child has the right to quality education.</span>
                                  </li>
                                  <li class="mb-3 d-flex align-items-start">
                                      <img src="{{ asset('images/arrow.gif') }}" alt="Arrow Icon" class="me-2 sadasd">
                                      <span>Clear Vision – (Tez Nigah)</span>
                                  </li>
                                  <li class="mb-3 d-flex align-items-start">
                                      <img src="{{ asset('images/arrow.gif') }}" alt="Arrow Icon" class="me-2 sadasd">
                                      <span>Preference for Solitude – (Khilwath Pasand)</span>
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