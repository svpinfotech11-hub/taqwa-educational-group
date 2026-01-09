           @extends('pages.partials.app')
           @section('content')
           <!-- breadcrumb-area -->
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
                                   <!-- <span class="breadcrumb-separator"><i class="fas fa-angle-right"></i></span>
                        <span property="itemListElement" typeof="ListItem">About Us</span> -->
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

           <!-- event-details-area -->
           <section class="event__details-area section-py-120">
               <div class="container">
                   <div class="row">
                       <div class="col-lg-12">
                           <div class="event__details-thumb">
                               <img src="{{ asset('school_members/'.$member->image) }}" alt="img">
                           </div>
                           <div class="event__details-content-wrap">
                               <div class="row">
                                   <div class="col-70">
                                       <div class="event__details-content">
                                           <div class="event__details-content-top">
                                               <!-- <a href="courses.html" class="tag">Development</a> -->
                                               <!-- <span class="avg-rating"><i class="fas fa-star"></i>(4.8 Reviews)</span> -->
                                           </div>
                                           <h2 class="title">How To Become idiculously Self-Aware In 20 Minutes</h2>

                                           <p>Morem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua Quis ipsum suspendisse ultrices gravida. Risus commodo viverra maecenas accumsan.Dorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magn.</p>
                                       </div>
                                   </div>
                               
                               </div>
                           </div>
                       </div>
                   </div>
               </div>
           </section>
           <!-- event-details-area-end -->

           @endsection