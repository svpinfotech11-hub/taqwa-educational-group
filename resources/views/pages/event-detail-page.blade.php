  @extends('pages.partials.app')
  @section('content')

  <style>
   .blog__details-thumb img {
    margin-bottom: 30px;
    width: 100% !important;
    height: 450px;
    object-fit: cover;
}

.textpp p {
    text-align: justify;
}
  </style>
       
       <!-- breadcrumb-area -->
        <section class="breadcrumb__area breadcrumb__bg" data-background="{{ asset('subpage_banners/'.$page->image) }}">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <div class="breadcrumb__content">
                              <h3 class="title text-center text-white">{{ $page->title }}</h3>
                            <nav class="breadcrumb">
                                <span property="itemListElement" typeof="ListItem">
                                </span>
                                <span class="breadcrumb-separator"><i class="fas fa-angle-right"></i></span>
                                <span property="itemListElement" typeof="ListItem">
                                </span>
                                <span class="breadcrumb-separator"><i class="fas fa-angle-right"></i></span>
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
        <!-- breadcrumb-area-end -->

        <!-- blog-details-area -->
        <section class="blog-details-area section-py-120">
            <div class="container">
                <div class="row">
                    <div class="col-xl-9 col-lg-8">
                        <div class="blog__details-wrapper">
                            <div class="blog__details-thumb">
                                <img src="{{ asset('events/'.$eventDetail->image) }}" alt="img">
                            </div>
                            <div class="blog__details-content">
                                <div class="blog__post-meta">
                                    <ul class="list-wrap">
                                        <li><i class="flaticon-calendar"></i> 20 July, 2024</li>
                                        <li><i class="flaticon-user-1"></i> by <a href="#">Admin</a></li>
                                        <li><i class="flaticon-clock"></i> 5 Min Read</li>
                                        <li><i class="far fa-comment-alt"></i> 05 Comments</li>
                                    </ul>
                                </div>
                                <h3 class="title">{{ $eventDetail->name }}</h3>
                               <div class="textpp"><p>{{ $eventDetail->desc }}</p></div>
                              
                            </div>
                        </div>
                    
                    </div>
                    <div class="col-xl-3 col-lg-4">
                        <aside class="blog-sidebar">
                            
                            <div class="blog-widget">
                                <h4 class="widget-title">Latest Post</h4>
                                @foreach ($otherEvents as $n)
                                <div class="rc-post-item">
                                    <div class="rc-post-thumb">
                                        <a href="{{ route('pages.event-detail-page', $n->id) }}">
                                            <img src="{{ asset('events/'.$n->image) }}" alt="img">
                                        </a>
                                    </div>
                                    <div class="rc-post-content">
                                        <!-- <span class="date"><i class="flaticon-calendar"></i> April 13, 2024</span> -->
                                        <h4 class="title"><a href="{{ route('pages.event-detail-page', $n->id) }}">{{ Str::limit($n->name,20) }}</a></h4>
                                    </div>
                                </div>
                              @endforeach
                            </div>
                           
                        </aside>
                    </div>
                </div>
            </div>
        </section>
        <!-- blog-details-area-end -->

        @endsection