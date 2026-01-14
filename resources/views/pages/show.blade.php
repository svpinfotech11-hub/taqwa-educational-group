  @extends('pages.partials.app')
  @section('content')


  <style>
      .active>.page-link,
      .page-link.active {
          z-index: 3;
          color: var(--bs-pagination-active-color);
          background-color: #5751E1;
          border-color: var(--bs-pagination-active-border-color);
          display: flex;
          align-items: center;
          justify-content: center;
          width: 50px;
          height: 50px;
          font-size: 18px;
          color: var(--tg-heading-color);
          font-family: var(--tg-heading-font-family);
          font-weight: var(--tg-fw-medium);
          /* background: rgb(230, 233, 239); */
          border-radius: 50%;
      }

      .page-item:last-child .page-link {
          border-radius: 100% !important;
      }

      .pagination {
          border-radius: 100% !important;
          --bs-pagination-padding-x: 22px !important;
          --bs-pagination-padding-y: 10px !important;
      }

      .page-item:first-child .page-link {
          border-radius: 100% !important;
      }

      .event__item {
          height: 430px;
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
                              <!-- <a href="index-2.html">Home</a> -->
                          </span>
                          <!-- <span class="breadcrumb-separator"><i class="fas fa-angle-right"></i></span> -->
                          <!-- <span property="itemListElement" typeof="ListItem">Events</span> -->
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

  <!-- event-area -->
  <!-- <section class="event__area-two section-py-120">
      <div class="container">
          <div class="event__inner-wrap">
              <div class="row justify-content-center">

                  @foreach($members as $member)
                  <div class="col-xl-3 col-lg-4 col-md-6">
                      <div class="event__item shine__animate-item">
                          <div class="event__item-thumb">
                              <a href="{{ route('pages.detail-page', $member->id) }}" class="shine__animate-link">
                                  <img src="{{ asset('school_members/' . $member->image) }}" alt="{{ $member->name }}">
                              </a>
                          </div>
                          <div class="event__item-content">
                            <a href="{{ route('pages.detail-page', $member->id) }}"><h2 class="title">{{ Str::limit($member->title,30) }}</h2></a>
                              <p>{{ Str::limit($member->description, 60) }}</p>
                          </div>
                      </div>
                  </div>
                  @endforeach

                  @if($members->isEmpty())
                  <p class="text-center">No members found for this school.</p>
                  @endif
              </div>

              <nav class="pagination__wrap mt-30">
                  {{ $members->links('pagination::bootstrap-4') }}
              </nav>
          </div>

      </div>
  </section> -->
  <!-- event-area-end -->

  <section class="contact-area section-py-120">
      <div class="container">
          <div class="row">
              <div class="col-lg-4">
                  <div class="contact-info-wrap">
                      <ul class="list-wrap">
                          <li>
                              <div class="icon">
                                  <img src="{{ asset('assets/img/icons/map.svg') }}" alt="img" class="injectable">
                              </div>

                              <div class="content">
                                  <h4 class="title">Address</h4>
                                  <p>{{ $school->address }}</p>
                              </div>
                          </li>
                          <li>
                              <div class="icon">
                                  <img src="{{ asset('assets/img/icons/contact_phone.svg') }}" alt="img" class="injectable">
                              </div>
                              <div class="content">
                                  <h4 class="title">Phone</h4>
                                  <a href="tel:0123456789">+91 {{ $school->phone }}</a>
                                  <!-- <a href="tel:0123456789">+1 (800) 123 456 789</a> -->
                              </div>
                          </li>
                          <li>
                              <div class="icon">
                                  <img src="{{ asset('assets/img/icons/emial.svg') }}" alt="img" class="injectable">
                              </div>
                              <div class="content">
                                  <h4 class="title">E-mail Address</h4>
                                  <a href="mailto:info@gmail.com">{{ $school->email }}</a>
                                  <!-- <a href="mailto:info@gmail.com">info@gmail.com</a> -->
                              </div>
                          </li>
                      </ul>
                  </div>
              </div>
              <div class="col-lg-8">
                  <div class="contact-form-wrap">
                      <h4 class="title">Send Us Message</h4>
                      <p>Your email address will not be published. Required fields are marked *</p>

                     <form id="contact-form" method="POST" action="{{ route('school.contact.store', $school->slug) }}">
                          @csrf

                          <div class="row">
                              {{-- Name --}}
                              <div class="col-md-4">
                                  <div class="form-grp">
                                      <input name="name" type="text" placeholder="Name *" value="{{ old('name') }}" required>
                                      @error('name') <small class="text-danger">{{ $message }}</small> @enderror
                                  </div>
                              </div>

                              {{-- Email --}}
                              <div class="col-md-4">
                                  <div class="form-grp">
                                      <input name="email" type="email" placeholder="E-mail *" value="{{ old('email') }}" required>
                                      @error('email') <small class="text-danger">{{ $message }}</small> @enderror
                                  </div>
                              </div>

                              {{-- Phone --}}
                              <div class="col-md-4">
                                  <div class="form-grp">
                                      <input name="phone" type="text" placeholder="Phone *" value="{{ old('phone') }}" required>
                                      @error('phone') <small class="text-danger">{{ $message }}</small> @enderror
                                  </div>
                              </div>
                          </div>

                          <div class="row">
                              {{-- Institution --}}
                              <div class="col-md-6">
                                  <div class="form-grp">
                                      <div class="custom-select-wrapper">
                                          <select class="form-control stylish-select" name="institution" required>
                                              <option value="">Select Institution *</option>
                                              <option value="School" {{ old('institution') == 'School' ? 'selected' : '' }}>School</option>
                                              <option value="PU College Coaching" {{ old('institution') == 'PU College Coaching' ? 'selected' : '' }}>PU College Coaching</option>
                                              <option value="Degree College" {{ old('institution') == 'Degree College' ? 'selected' : '' }}>Degree College</option>
                                          </select>
                                          <!-- <span class="select-arrow"><i class="fas fa-chevron-down"></i></span> -->
                                      </div>
                                      @error('institution') <small class="text-danger">{{ $message }}</small> @enderror
                                  </div>
                              </div>

                              {{-- Branch --}}
                              <div class="col-md-6">
                                  <div class="form-grp">
                                      <div class="custom-select-wrapper">
                                          <select class="form-control stylish-select" name="branch" required>
                                              <option value="">Select Branch *</option>
                                              <option value="Muzaffarnagar" {{ old('branch') == 'Muzaffarnagar' ? 'selected' : '' }}>Muzaffarnagar</option>
                                              <option value="Lucknow" {{ old('branch') == 'Lucknow' ? 'selected' : '' }}>Lucknow</option>
                                              <option value="Bhopal" {{ old('branch') == 'Bhopal' ? 'selected' : '' }}>Bhopal</option>
                                              <option value="Delhi" {{ old('branch') == 'Delhi' ? 'selected' : '' }}>Delhi</option>
                                              <!-- You can add all branches here -->
                                          </select>
                                          <!-- <span class="select-arrow"><i class="fas fa-chevron-down"></i></span> -->
                                      </div>
                                      @error('branch') <small class="text-danger">{{ $message }}</small> @enderror
                                  </div>
                              </div>
                          </div>

                          {{-- Message Field --}}
                          <div class="form-grp">
                              <textarea name="message" placeholder="Comment" required>{{ old('message') }}</textarea>
                              @error('message') <small class="text-danger">{{ $message }}</small> @enderror
                          </div>

                          {{-- Submit --}}
                          <button type="submit" class="btn btn-two arrow-btn">
                              Submit Now
                              <img src="{{ asset('assets/img/icons/right_arrow.svg') }}" alt="img" class="injectable">
                          </button>

                          {{-- Success message --}}
                          @if(session('success'))
                          <p class="ajax-response mb-0 text-success mt-3">{{ session('success') }}</p>
                          @endif
                      </form>


                      {{-- Success message --}}
                      @if(session('success'))
                      <p class="ajax-response mb-0 text-success mt-3">{{ session('success') }}</p>
                      @endif
                  </div>
              </div>

          </div>
          <!-- contact-map -->
          <div class="contact-map">
              <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d48409.69813174607!2d-74.05163325136718!3d40.68264649999998!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x89c25bae694479a3%3A0xb9949385da52e69e!2sBarclays%20Center!5e0!3m2!1sen!2sbd!4v1684309529719!5m2!1sen!2sbd" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
          </div>
          <!-- contact-map-end -->
      </div>
  </section>


  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
$(document).ready(function() {
    let isSubmitting = false;

    $('#contact-form').off('submit').on('submit', function(e) {
        e.preventDefault();

        if (isSubmitting) return;
        isSubmitting = true;

        let form = $(this);
        let actionUrl = form.attr('action'); // 👈 use form's action dynamically
        let formData = form.serialize();

        $.ajax({
            url: actionUrl,
            type: 'POST',
            data: formData,
            beforeSend: function() {
                form.find('button[type=submit]').prop('disabled', true).text('Submitting...');
            },
            success: function(response) {
                if (response.success) {
                    Swal.fire({
                        icon: 'success',
                        title: 'Success!',
                        text: response.message,
                        showConfirmButton: false,
                        timer: 2500
                    });
                    form.trigger('reset');
                } else {
                    let message = response.errors ?
                        Object.values(response.errors).flat().join('\n') :
                        response.message || 'An unknown error occurred.';

                    Swal.fire({
                        icon: 'error',
                        title: 'Error!',
                        text: message
                    });
                }
            },
            error: function(xhr) {
                let message = 'Something went wrong. Please try again later.';
                if (xhr.responseJSON) {
                    if (xhr.responseJSON.errors) {
                        message = Object.values(xhr.responseJSON.errors).flat().join('\n');
                    } else if (xhr.responseJSON.message) {
                        message = xhr.responseJSON.message;
                    }
                }

                Swal.fire({
                    icon: 'error',
                    title: 'Error!',
                    text: message
                });
            },
            complete: function() {
                form.find('button[type=submit]').prop('disabled', false).text('Submit Now');
                isSubmitting = false;
            }
        });
    });
});
</script>


  @endsection