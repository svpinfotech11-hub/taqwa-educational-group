      @extends('pages.partials.app')
      @section('content')
<!-- FancyBox CSS -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@fancyapps/ui@5.0/dist/fancybox/fancybox.css" />

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
            <!-- Title -->
            <div class="row justify-content-center mb-5">
                <div class="col-xl-6 text-center">
                    <div class="section__title mb-20">
                        <!-- <h2 class="title">{{ $gallery->title }}</h2> -->
                        <!-- @if($gallery->created_at)
                            <p class="text-muted">Created on {{ $gallery->created_at->format('d M Y') }}</p>
                        @endif -->
                    </div>
                </div>
            </div>


            <!-- Gallery Images Grid -->
         <div class="row g-4 justify-content-center">
    @forelse($gallery->images as $image)
        <div class="col-lg-4 col-md-6 col-sm-12">
            <div class="gallery-item">
                <a href="{{ asset('gallery_images/' . $image->image) }}" data-fancybox="gallery" data-caption="{{ $gallery->title }}">
                    <img src="{{ asset('gallery_images/' . $image->image) }}" 
                         alt="Gallery Image" 
                         class="img-fluid rounded shadow-sm w-100" 
                         style="height: 250px; object-fit: cover;">
                </a>
            </div>
        </div>
    @empty
        <div class="col-12 text-center">
            <p>No images found in this gallery.</p>
        </div>
    @endforelse
</div>

        </div>
    </section>



<!-- FancyBox JS -->
<script src="https://cdn.jsdelivr.net/npm/@fancyapps/ui@5.0/dist/fancybox/fancybox.umd.js"></script>
<script>
  Fancybox.bind("[data-fancybox='gallery']", {
    Toolbar: true,
    closeButton: "top",
    Image: {
      zoom: true,
      click: "close",
      wheel: "slide",
    },
    Thumbs: {
      autoStart: true,
    },
  });
</script>

      @endsection