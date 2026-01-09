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
      p{
        text-align: justify;
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
                  @foreach(['missions' => $missions, 'visions' => $visions] as $label => $items)
                  @foreach($items as $item)
                  <div class="col-lg-6 mb-4">
                      <div class="card shadow-sm border-0 rounded-4 h-100">
                          <div class="text-white text-center py-3">
                              <h4 class="mb-0 text-uppercase"> @if($item->type == 'mission')
                                  <img src="{{ asset('images/mission.gif') }}" alt="Mission Icon" class="aKJBDBa">
                                  @elseif($item->type == 'vision')
                                  <img src="{{ asset('images/vision.gif') }}" alt="Vision Icon" class="aKJBDBa">
                                  @endif{{ ucfirst($item->type) }}
                              </h4>
                          </div>
                          <div class="card-body d-flex align-items-start">

                              <div>
                                  @if($item->title)
                                  <h5 class="fw-bold text-center">{{ $item->title }}</h5>
                                  @endif
                                  <p>{{ $item->description }}</p>
                              </div>
                          </div>
                      </div>
                  </div>
                  @endforeach
                  @endforeach
              </div>



              <!-- Second Row: Objectives -->
              <div class="row">
                  <div class="col-12 mx-auto">
                      <div class="card shadow-sm border-0 rounded-4">
                          <div class="text-white text-center py-3">
                              <h4 class="mb-0"><img src="{{ asset('images/target.gif') }}" alt="" class="aKJBDBa"> Objectives</h4>
                          </div>
                          <div class="card-body">
                              <ul class="list-group list-group-flush">
                                  @forelse($objectives as $objective)
                                  <li class="list-group-item">{{ $objective->description }}</li>
                                  @empty
                                  <li class="list-group-item text-muted">No objectives found.</li>
                                  @endforelse
                              </ul>
                          </div>
                      </div>
                  </div>
              </div>

          </div>
  </section>


  @endsection