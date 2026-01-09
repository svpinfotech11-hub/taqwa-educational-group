           @extends('pages.partials.app')
           @section('content')

           <style>
               .kjskdjkash img {
                   width: 100px;
               }

               img.kjskdjkash {
                   width: 30px;
                   height: 30px;
               }

               .section-py-120 {
                   padding: 60px 0;
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
                       <div class="col-10 mx-auto">
                           <div class="event__details-content-wrap">
                               <div class="event__details-content">
                                   <h2 class="title mb-5 text-center">Key Facilities and Amenities</h2>

                                   <div class="row">
                                       <!-- Academic & Research Facilities -->
                                       <div class="col-md-6 mb-4">
                                           <h4 class="mb-3">Academic & Research Facilities</h4>
                                           <ul class="facility-list list-unstyled">
                                               <li class="mb-3 d-flex">
                                                   <img src="{{ asset('images/arrow.gif') }}" alt="Arrow" class="me-2 mt-1 kjskdjkash">
                                                   <div>
                                                       <strong>Research Center</strong>
                                                       <p class="mb-0 text-muted">A dedicated space fostering innovation and inquiry. Our Research Center supports interdisciplinary research, faculty projects, and student-led initiatives.</p>
                                                   </div>
                                               </li>

                                               <li class="mb-3 d-flex">
                                                   <img src="{{ asset('images/arrow.gif') }}" alt="Arrow" class="me-2 mt-1 kjskdjkash">
                                                   <div>
                                                       <strong>Reference Library</strong>
                                                       <p class="mb-0 text-muted">A state-of-the-art library offering access to digital and physical resources, research materials, and collaborative learning environments.</p>
                                                   </div>
                                               </li>

                                               <li class="mb-3 d-flex">
                                                   <img src="{{ asset('images/arrow.gif') }}" alt="Arrow" class="me-2 mt-1 kjskdjkash">
                                                   <div>
                                                       <strong>Computer Lab</strong>
                                                       <p class="mb-0 text-muted">Equipped for experiments in new technologies, robotics, and design thinking for students and researchers.</p>
                                                   </div>
                                               </li>

                                               <li class="mb-3 d-flex">
                                                   <img src="{{ asset('images/arrow.gif') }}" alt="Arrow" class="me-2 mt-1 kjskdjkash">
                                                   <div>
                                                       <strong>Science Lab</strong>
                                                       <p class="mb-0 text-muted">Equipped for experiments in new technologies, robotics, and design thinking for students and researchers.</p>
                                                   </div>
                                               </li>
                                           </ul>
                                       </div>

                                       <!-- Campus & Amenities -->
                                       <div class="col-md-6 mb-4">
                                           <h4 class="mb-3">Smart Learning Environment</h4>
                                           <ul class="facility-list list-unstyled">
                                               <li class="mb-3 d-flex">
                                                   <img src="{{ asset('images/arrow.gif') }}" alt="Arrow" class="me-2 mt-1 kjskdjkash">
                                                   <div>
                                                       <strong>Tab For Students</strong>
                                                       <p class="mb-0 text-muted">Modern indoor and outdoor sports facilities that encourage fitness and teamwork.</p>
                                                   </div>
                                               </li>

                                               <li class="mb-3 d-flex">
                                                   <img src="{{ asset('images/arrow.gif') }}" alt="Arrow" class="me-2 mt-1 kjskdjkash">
                                                   <div>
                                                       <strong>Smart Classroom</strong>
                                                       <p class="mb-0 text-muted">Comfortable on-campus accommodation with hygienic dining options ensuring a healthy lifestyle for students.</p>
                                                   </div>
                                               </li>

                                               <li class="mb-3 d-flex">
                                                   <img src="{{ asset('images/arrow.gif') }}" alt="Arrow" class="me-2 mt-1 kjskdjkash">
                                                   <div>
                                                       <strong>Seminar Hall</strong>
                                                       <p class="mb-0 text-muted">24/7 healthcare facilities and wellness programs for students and faculty.</p>
                                                   </div>
                                               </li>
                                           </ul>
                                       </div>
                                   </div> <!-- row -->


                                   <div class="row">
                                       <!-- Academic & Research Facilities -->
                                       <div class="col-md-6 mb-4">
                                           <h4 class="mb-3">Student Safety & Communication</h4>
                                           <ul class="facility-list list-unstyled">
                                               <li class="mb-3 d-flex">
                                                   <img src="{{ asset('images/arrow.gif') }}" alt="Arrow" class="me-2 mt-1 kjskdjkash">
                                                   <div>
                                                       <strong>Face Recognition Attendance</strong>
                                                       <p class="mb-0 text-muted">A dedicated space fostering innovation and inquiry. Our Research Center supports interdisciplinary research, faculty projects, and student-led initiatives.</p>
                                                   </div>
                                               </li>

                                               <li class="mb-3 d-flex">
                                                   <img src="{{ asset('images/arrow.gif') }}" alt="Arrow" class="me-2 mt-1 kjskdjkash">
                                                   <div>
                                                       <strong>SMS Updates to Parents</strong>
                                                       <p class="mb-0 text-muted">A state-of-the-art library offering access to digital and physical resources, research materials, and collaborative learning environments.</p>
                                                   </div>
                                               </li>


                                           </ul>
                                       </div>

                                       <!-- Campus & Amenities -->
                                       <div class="col-md-6 mb-4">
                                           <h4 class="mb-3">Transport & Travel Services</h4>
                                           <ul class="facility-list list-unstyled">
                                               <li class="mb-3 d-flex">
                                                   <img src="{{ asset('images/arrow.gif') }}" alt="Arrow" class="me-2 mt-1 kjskdjkash">
                                                   <div>
                                                       <strong>Transportation Facilities</strong>
                                                       <p class="mb-0 text-muted">Modern indoor and outdoor sports facilities that encourage fitness and teamwork.</p>
                                                   </div>
                                               </li>

                                               <li class="mb-3 d-flex">
                                                   <img src="{{ asset('images/arrow.gif') }}" alt="Arrow" class="me-2 mt-1 kjskdjkash">
                                                   <div>
                                                       <strong>Airport Pick & Drop</strong>
                                                       <p class="mb-0 text-muted">Comfortable on-campus accommodation with hygienic dining options ensuring a healthy lifestyle for students.</p>
                                                   </div>
                                               </li>

                                               <li class="mb-3 d-flex">
                                                   <img src="{{ asset('images/arrow.gif') }}" alt="Arrow" class="me-2 mt-1 kjskdjkash">
                                                   <div>
                                                       <strong>Railway & Air Ticketing</strong>
                                                       <p class="mb-0 text-muted">24/7 healthcare facilities and wellness programs for students and faculty.</p>
                                                   </div>
                                               </li>
                                           </ul>
                                       </div>
                                   </div> <!-- row -->


                                   <div class="row">
                                       <!-- Academic & Research Facilities -->
                                       <div class="col-md-6 mb-4">
                                           <h4 class="mb-3">Accommodation & Daily Living</h4>
                                           <ul class="facility-list list-unstyled">
                                               <li class="mb-3 d-flex">
                                                   <img src="{{ asset('images/arrow.gif') }}" alt="Arrow" class="me-2 mt-1 kjskdjkash">
                                                   <div>
                                                       <strong>Girls Hostel & Boys Hostel</strong>
                                                       <p class="mb-0 text-muted">A dedicated space fostering innovation and inquiry. Our Research Center supports interdisciplinary research, faculty projects, and student-led initiatives.</p>
                                                   </div>
                                               </li>

                                               <li class="mb-3 d-flex">
                                                   <img src="{{ asset('images/arrow.gif') }}" alt="Arrow" class="me-2 mt-1 kjskdjkash">
                                                   <div>
                                                       <strong>Free Laundry</strong>
                                                       <p class="mb-0 text-muted">A state-of-the-art library offering access to digital and physical resources, research materials, and collaborative learning environments.</p>
                                                   </div>
                                               </li>

                                               <li class="mb-3 d-flex">
                                                   <img src="{{ asset('images/arrow.gif') }}" alt="Arrow" class="me-2 mt-1 kjskdjkash">
                                                   <div>
                                                       <strong>Cafeteria / Snack Bar</strong>
                                                       <p class="mb-0 text-muted">A state-of-the-art library offering access to digital and physical resources, research materials, and collaborative learning environments.</p>
                                                   </div>
                                               </li>

                                               <li class="mb-3 d-flex">
                                                   <img src="{{ asset('images/arrow.gif') }}" alt="Arrow" class="me-2 mt-1 kjskdjkash">
                                                   <div>
                                                       <strong>Mess / Canteen</strong>
                                                       <p class="mb-0 text-muted">A state-of-the-art library offering access to digital and physical resources, research materials, and collaborative learning environments.</p>
                                                   </div>
                                               </li>

                                               <li class="mb-3 d-flex">
                                                   <img src="{{ asset('images/arrow.gif') }}" alt="Arrow" class="me-2 mt-1 kjskdjkash">
                                                   <div>
                                                       <strong>Campus Supermarket & Online Store</strong>
                                                       <p class="mb-0 text-muted">A state-of-the-art library offering access to digital and physical resources, research materials, and collaborative learning environments.</p>
                                                   </div>
                                               </li>

                                           </ul>
                                       </div>

                                       <!-- Campus & Amenities -->
                                       <div class="col-md-6 mb-4">
                                           <h4 class="mb-3">Health Care</h4>
                                           <ul class="facility-list list-unstyled">
                                               <li class="mb-3 d-flex">
                                                   <img src="{{ asset('images/arrow.gif') }}" alt="Arrow" class="me-2 mt-1 kjskdjkash">
                                                   <div>
                                                       <strong>24x7 Hospital</strong>
                                                       <p class="mb-0 text-muted">Modern indoor and outdoor sports facilities that encourage fitness and teamwork.</p>
                                                   </div>
                                               </li>

                                               <li class="mb-3 d-flex">
                                                   <img src="{{ asset('images/arrow.gif') }}" alt="Arrow" class="me-2 mt-1 kjskdjkash">
                                                   <div>
                                                       <strong>Gym Facility</strong>
                                                       <p class="mb-0 text-muted">Comfortable on-campus accommodation with hygienic dining options ensuring a healthy lifestyle for students.</p>
                                                   </div>
                                               </li>

                                               <li class="mb-3 d-flex">
                                                   <img src="{{ asset('images/arrow.gif') }}" alt="Arrow" class="me-2 mt-1 kjskdjkash">
                                                   <div>
                                                       <strong>Counselling Centre</strong>
                                                       <p class="mb-0 text-muted">24/7 healthcare facilities and wellness programs for students and faculty.</p>
                                                   </div>
                                               </li>

                                               <li class="mb-3 d-flex">
                                                   <img src="{{ asset('images/arrow.gif') }}" alt="Arrow" class="me-2 mt-1 kjskdjkash">
                                                   <div>
                                                       <strong>Disabled Friendly Campus</strong>
                                                       <p class="mb-0 text-muted">24/7 healthcare facilities and wellness programs for students and faculty.</p>
                                                   </div>
                                               </li>

                                               <li class="mb-3 d-flex">
                                                   <img src="{{ asset('images/arrow.gif') }}" alt="Arrow" class="me-2 mt-1 kjskdjkash">
                                                   <div>
                                                       <strong>Incubation Centre</strong>
                                                       <p class="mb-0 text-muted">24/7 healthcare facilities and wellness programs for students and faculty.</p>
                                                   </div>
                                               </li>
                                           </ul>
                                       </div>
                                   </div> <!-- row -->
                               </div>
                           </div>
                       </div>
                   </div>
               </div>
           </section>

           <!-- event-details-area-end -->

           @endsection