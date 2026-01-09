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
          <div class="row justify-content-center">
              <div class="col-lg-8">
                  <div class="card shadow-lg border-0 rounded-4">
                      <div class="card-header bg-gradient text-white text-center py-4" style="background: linear-gradient(135deg, #007bff, #00bcd4);">
                          <h3 class="mb-0 fw-bold">🚖 Taxi Booking Form</h3>
                          <p class="mb-0" style="font-size: 14px; opacity: 0.9;">Fill in your details to confirm your taxi booking</p>
                      </div>

                      <div class="card-body p-5">
                          <form id="taxiBookingForm">
                              @csrf
                              <div class="row g-4">

                                  <div class="col-md-6">
                                      <label class="form-label fw-semibold">Student Name</label>
                                      <input type="text" name="student_name" class="form-control form-control-lg" placeholder="Enter full name" required>
                                  </div>

                                  <div class="col-md-6">
                                      <label class="form-label fw-semibold">Admission Number</label>
                                      <input type="text" name="admission_number" class="form-control form-control-lg" placeholder="e.g. ADM1023" required>
                                  </div>

                                  <div class="col-md-6">
                                      <label class="form-label fw-semibold">Class</label>
                                      <input type="text" name="class" class="form-control form-control-lg" placeholder="e.g. 10th A" required>
                                  </div>

                                  <div class="col-md-6">
                                      <label class="form-label fw-semibold">Parents Mobile Number <span class="text-danger">*</span></label>
                                      <input type="tel" name="parent_mobile" class="form-control form-control-lg" maxlength="10" placeholder="Enter 10-digit number" required>
                                  </div>

                                  <div class="col-md-6">
                                      <label class="form-label fw-semibold">Parents Email ID</label>
                                      <input type="email" name="parent_email" class="form-control form-control-lg" placeholder="example@email.com">
                                  </div>

                                  <div class="col-md-6">
                                      <label class="form-label fw-semibold">Date of Booking</label>
                                      <input type="date" name="booking_date" class="form-control form-control-lg" required>
                                  </div>

                                  <div class="col-md-6">
                                      <label class="form-label fw-semibold">Number of Persons</label>
                                      <input type="number" name="number_of_persons" class="form-control form-control-lg" min="1" required>
                                  </div>

                              </div>

                              <div class="text-center mt-4">
                                  <button type="submit" class="btn btn-primary px-4" id="submitBtn">Submit Booking</button>
                              </div>
                          </form>

                          <div id="responseMsg" class="alert mt-4 d-none"></div>
                      </div>
                  </div>
              </div>
          </div>
      </div>
  </section>


  <!-- ✅ AJAX Script -->
  <script>
      document.getElementById('taxiBookingForm').addEventListener('submit', function(e) {
          e.preventDefault();

          let form = this;
          let submitBtn = document.getElementById('submitBtn');
          let responseMsg = document.getElementById('responseMsg');

          submitBtn.disabled = true;
          submitBtn.textContent = 'Submitting...';

          fetch("{{ route('pages.taxi-booking.store') }}", {
                  method: "POST",
                  headers: {
                      'X-CSRF-TOKEN': document.querySelector('input[name=_token]').value,
                      'Accept': 'application/json'
                  },
                  body: new FormData(form)
              })
              .then(response => response.json())
              .then(data => {
                  submitBtn.disabled = false;
                  submitBtn.textContent = 'Submit Booking';

                  responseMsg.classList.remove('d-none', 'alert-danger', 'alert-success');
                  if (data.status === 'success') {
                      responseMsg.classList.add('alert-success');
                      responseMsg.textContent = data.message;
                      form.reset();
                  } else {
                      responseMsg.classList.add('alert-danger');
                      responseMsg.textContent = data.message;
                  }
              })
              .catch(error => {
                  submitBtn.disabled = false;
                  submitBtn.textContent = 'Submit Booking';
                  responseMsg.classList.remove('d-none');
                  responseMsg.classList.add('alert-danger');
                  responseMsg.textContent = 'Something went wrong. Please try again.';
                  console.error(error);
              });
      });
  </script>

  @endsection