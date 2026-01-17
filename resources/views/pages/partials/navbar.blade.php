  <style>
      .tgmenu__navbar-wrap ul li .sub-menu li a {
          padding: 8px 15px 8px 25px;
          line-height: 1.4;
          display: block;
          color: var(--tg-heading-color);
          text-transform: capitalize;
          font-size: 12px;
      }

      img.asdsaQDa {
          width: 80px;
          margin-left: 80px;
      }

      @media(max-width:768px) {
          img.asdsaQDa {
              width: 80px;
              margin-left: 0px;
          }
      }

      .tgmenu__navbar-wrap ul li .sub-menu {
          min-width: 190px;
      }

      .tgmenu__navbar-wrap ul li .sub-menu.dsfsdf {
          min-width: 700px;
      }

      img.asdasd {
          width: 120px;
      }

      @media (max-width: 1500px) {
          .tg-header__area {
              padding: 0px 0;
          }
      }

      @media (max-width: 1500px) {
          .custom-container {
              max-width: 1236px;
          }
      }

      @media (max-width: 1500px) {
          .tgmenu__navbar-wrap ul li a {
              padding: 35px 10px;
          }
      }
      @media (max-width: 1500px) {
    .tgmenu__navbar-wrap ul li a {
        padding: 9px 10px;
    }
}

p.text-dark.jhgfjhfj {
    font-weight: 700;
}
  </style>

  <!-- header-area -->
  <header>
      <div class="tg-header__top">
          <div class="container custom-container">
              <div class="row">
                  <div class="col-lg-6">
                      <ul class="tg-header__top-info list-wrap">
                          <li><img src="{{ asset('assets/img/icons/map_marker.svg') }}" alt="Icon"> <span style="font-size: 12px !important;">Chhawni, Bettiah Mainatand Road, District West Champaran, Bihar, Pin 845438</span></li>
                          <li><img src="{{ asset('assets/img/icons/envelope.svg') }}" alt="Icon"> <a href="mailto:info@skillgrodemo.com">taqwa@taqwagroup.in</a></li>
                      </ul>
                  </div>

                  <div class="col-lg-6">
                      <div class="tg-header__top-right">
                          <div class="tg-header__phone">
                              <img src="{{ asset('assets/img/icons/phone.svg') }}" alt="Icon">Call us: <a href="tel:0123456789">+91 9560780523</a>
                          </div>
                          <ul class="tg-header__top-social list-wrap">
                              <li>Follow Us On :</li>
                              <li><a href="#"><i class="fab fa-facebook-f"></i></a></li>
                              <li><a href="#"><i class="fab fa-instagram"></i></a></li>
                              <!-- <li><a href="#"><i class="fab fa-twitter"></i></a></li> -->
                              <!-- <li><a href="#"><i class="fab fa-whatsapp"></i></a></li> -->
                              <li><a href="#"><i class="fab fa-linkedin-in"></i></a></li>
                              <!-- <li><a href="#"><i class="fab fa-youtube"></i></a></li> -->
                          </ul>
                      </div>
                  </div>
              </div>
          </div>
      </div>
      <div id="header-fixed-height"></div>
      <div id="sticky-header" class="tg-header__area">
          <div class="container custom-container">
              <div class="row">
                  <div class="col-12">
                      <div class="tgmenu__wrap">
                          <nav class="tgmenu__nav">
                              <div class="logo">
                                  <a href="{{ url('/') }}">
                                      @if(isset($school) && $school && $school->thumbnail)
                                      <img src="{{ asset('schools/' . $school->thumbnail) }}" alt="{{ $school->name }} Logo" class="asdsaQDa">
                                      @else
                                      <img src="{{ asset('images/Untitled design (1).png') }}" class="asdasd" alt="Default Logo">
                                      @endif
                                      <p class="text-dark jhgfjhfj">Taqwa Institutional Group</p>
                                  </a>
                              </div>

                              <!-- <div class="logo">
                                    <a href="index-2.html"><img src="{{ asset('assets/img/logo/logo.svg') }}" alt="Logo"></a>
                                </div> -->
                              <div class="tgmenu__navbar-wrap tgmenu__main-menu d-none d-xl-flex">
                                  <ul class="navigation">
                                      <li class="active"><a href="{{ route('pages.home') }}">Home</a>
                                      </li>

                                      <li class="menu-item-has-children"><a href="#">Admission</a>
                                          @php
                                          $categories = \App\Models\RegistrationCategory::all();
                                          @endphp
                                          <ul class="sub-menu">
                                              @foreach($categories as $cat)
                                              <li>
                                                  <a href="{{ route('registration.form', $cat->slug) }}">
                                                      {{ $cat->title }}
                                                  </a>
                                              </li>
                                              @endforeach
                                          </ul>
                                      </li>
                                      <li class="menu-item-has-children"><a href="#">Resources</a>
                                          <ul class="sub-menu">
                                              <li><a href="{{ route('pages.facility') }}">Facility</a></li>
                                              <li><a href="{{ route('pages.taxi-booking') }}">Taxi Booking</a></li>
                                              <li><a href="https://apnabazar.online">ApnaBazar.online</a></li>
                                          </ul>
                                      </li>
                                      <li class="menu-item-has-children"><a href="#">About Us</a>
                                          <ul class="sub-menu">
                                              <li><a href="{{ route('pages.about-us') }}">About Us</a></li>
                                              <li><a href="{{ route('pages.our-philosophy') }}">Our Philosophy</a></li>
                                              <li><a href="{{ route('pages.mission-vision') }}">Mission & Vision</a></li>
                                              <li><a href="{{ route('pages.chairmans-message') }}">Chairman’s Message</a></li>
                                              <li><a href="{{ route('pages.faculty-page') }}">faculty-page</a></li>
                                              <li><a href="{{ route('pages.values-built-on-belief') }}">Built on Belief</a></li>
                                          </ul>
                                      </li>
                                      <li class=""><a href="{{ route('pages.courses') }}">Courses</a>
                                          <!-- <ul class="sub-menu">
                                                <li><a href="courses.html">All Courses</a></li>
                                                <li><a href="course-details.html">Course Details</a></li>
                                                <li><a href="lesson.html">Course Lesson</a></li>
                                            </ul> -->
                                      </li>

                                      <li class="menu-item-has-children">
                                          <a href="#">Schools</a>
                                          <ul class="sub-menu dsfsdf mega-menu">
                                              <li>
                                                  <ul class="list-wrap mega-sub-menu">
                                                      @php
                                                      $schools = getAllSchools();
                                                      $half = ceil($schools->count() / 2);
                                                      @endphp

                                                      {{-- First Column --}}
                                                      @foreach ($schools->take($half) as $school)
                                                      <li>
                                                          <a href="{{ route('pages.show', $school->slug) }}">
                                                              {{ Str::limit($school->name, 32) }}
                                                          </a>
                                                      </li>
                                                      @endforeach
                                                  </ul>
                                              </li>

                                              <li>
                                                  <ul class="list-wrap mega-sub-menu">
                                                      {{-- Second Column --}}
                                                      @foreach ($schools->skip($half) as $school)
                                                      <li>
                                                          <a href="{{ route('pages.show', $school->slug) }}">
                                                              {{ Str::limit($school->name, 30) }}
                                                          </a>
                                                      </li>
                                                      @endforeach
                                                  </ul>
                                              </li>
                                          </ul>
                                      </li>

                                      <li class="menu-item-has-children"><a href="#">News & Events</a>
                                          <ul class="sub-menu">
                                              <li><a href="menu-item-has-children">Events</a>
                                                  <ul class="sub-menu">
                                                      <li><a href="{{ route('conferences-show') }}">Conference</a></li>
                                                      <!-- <li><a href="#">Scholarships</a></li> -->
                                                      <!-- <li><a href="{{ route('pages.news-list') }}">News Portal</a></li> -->
                                                  </ul>
                                              </li>
                                              <li><a href="#">Scholarships</a></li>
                                              <li><a href="{{ route('pages.news-list') }}">News Portal</a></li>
                                          </ul>
                                      </li>

                                      <li class="menu-item-has-children"><a href="#">Others</a>
                                          <ul class="sub-menu">
                                              <li class="menu-item-has-children"><a href="#">Neet Domicile Criteria</a>

                                                  <?php

                                                    use App\Models\NeetDomicile;

                                                    $neetStates = NeetDomicile::orderBy('state_name')->get();
                                                    ?>
                                                  <ul class="sub-menu">
                                                      @foreach($neetStates as $state)
                                                      <li>
                                                          <a href="{{ route('pages.neet-domicile-page', $state->slug) }}">
                                                              {{ $state->state_name }}
                                                          </a>
                                                      </li>
                                                      @endforeach
                                                  </ul>
                                              </li>
                                              <li><a href="{{ route('pages.aicu') }}">AICU</a></li>
                                              <li><a href="{{ route('pages.gallery-page') }}">Photo Gallery</a></li>
                                              <li><a href="{{ route('pages.video-gallery') }}">Video Gallery</a></li>
                                              <li><a href="{{ route('pages.mbbs-neet-mentor') }}">Free 1-1 Counselling MBBS</a></li>
                                              <li><a href="{{ route('pages.prospectus') }}">Prospectus</a></li>
                                              <li><a href="{{ route('pages.result-page') }}">Results</a></li>
                                          </ul>
                                      </li>
                                      <li><a href="{{ route('pages.contact-us') }}">Contact</a></li>
                                      <li>
                                          <a href="#"
                                              class="btn btn-primary text-white"
                                              data-bs-toggle="modal"
                                              data-bs-target="#enquiryModal">
                                              Enquiry
                                          </a>
                                      </li>

                                  </ul>
                              </div>

                              <div class="mobile-login-btn">
                                  <a href="login.html"><img src="{{ asset('assets/img/icons/user.svg') }}" alt="" class="injectable"></a>
                              </div>
                              <div class="mobile-nav-toggler"><i class="tg-flaticon-menu-1"></i></div>
                          </nav>
                      </div>
                      <!-- Mobile Menu  -->
                      <div class="tgmobile__menu">
                          <nav class="tgmobile__menu-box">
                              <div class="close-btn"><i class="tg-flaticon-close-1"></i></div>
                              <div class="nav-logo">
                                  <a href="index-2.html"><img src="{{ asset('assets/img/logo/logo.svg') }}" alt="Logo"></a>
                              </div>
                              <div class="tgmobile__search">
                                  <form action="#">
                                      <input type="text" placeholder="Search here...">
                                      <button><i class="fas fa-search"></i></button>
                                  </form>
                              </div>
                              <div class="tgmobile__menu-outer">
                                  <!--Here Menu Will Come Automatically Via Javascript / Same Menu as in Header-->
                              </div>
                              <div class="social-links">
                                  <ul class="list-wrap">
                                      <li><a href="#"><i class="fab fa-facebook-f"></i></a></li>
                                      <li><a href="#"><i class="fab fa-twitter"></i></a></li>
                                      <li><a href="#"><i class="fab fa-instagram"></i></a></li>
                                      <li><a href="#"><i class="fab fa-linkedin-in"></i></a></li>
                                      <li><a href="#"><i class="fab fa-youtube"></i></a></li>
                                  </ul>
                              </div>
                          </nav>
                      </div>
                      <div class="tgmobile__menu-backdrop"></div>
                      <!-- End Mobile Menu -->
                  </div>
              </div>
          </div>
      </div>

      <!-- Enquiry Modal -->
      <div class="modal fade" id="enquiryModal" tabindex="-1" aria-hidden="true">
          <div class="modal-dialog modal-md modal-dialog-centered">
              <div class="modal-content">

                  <div class="modal-header">
                      <h5 class="modal-title">School Enquiry</h5>
                      <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                  </div>

                  <div class="modal-body">
                      <form id="enquiryForm">
                          @csrf

                          <div class="mb-3">
                              <input type="text" name="name" class="form-control" placeholder="Name">
                              <small class="text-danger error-name"></small>
                          </div>

                          <div class="mb-3">
                              <input type="email" name="email" class="form-control" placeholder="Email">
                              <small class="text-danger error-email"></small>
                          </div>

                          <div class="mb-3">
                              <input type="text" name="phone" class="form-control" placeholder="Phone">
                              <small class="text-danger error-phone"></small>
                          </div>

                          <div class="mb-3">
                              <textarea name="message" class="form-control" rows="5" placeholder="Your Enquiry"></textarea>
                              <small class="text-danger error-message"></small>
                          </div>

                          <button type="submit" class="btn btn-primary w-100">
                              Submit Enquiry
                          </button>
                      </form>

                      <div id="enquirySuccess" class="alert alert-success mt-3 d-none">
                          Enquiry submitted successfully!
                      </div>
                  </div>

              </div>
          </div>
      </div>

      <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<script>
$('#enquiryForm').on('submit', function(e) {
    e.preventDefault();

    $('.text-danger').text('');

    $.ajax({
        url: "{{ route('enquiry.store') }}",
        type: "POST",
        data: $(this).serialize(),
        success: function(response) {
            $('#enquiryForm')[0].reset();
            $('#enquirySuccess').removeClass('d-none');

            setTimeout(function () {
                $('#enquiryModal').modal('hide');
                $('#enquirySuccess').addClass('d-none');
            }, 2000);
        },
        error: function(xhr) {
            let errors = xhr.responseJSON.errors;
            $.each(errors, function(key, value) {
                $('.error-' + key).text(value[0]);
            });
        }
    });
});
</script>

  </header>
  <!-- header-area-end -->