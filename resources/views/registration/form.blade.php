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

                      <!-- Header -->
                      <div class="card-header bg-gradient text-white text-center py-4"
                          style="background: linear-gradient(135deg, #007bff, #00bcd4);">
                          <h3 class="mb-0 fw-bold">Registration Form</h3>
                          <p class="mb-0" style="font-size: 14px; opacity: 0.9;">
                              Fill in your details to complete registration
                          </p>
                      </div>

                      <div class="card-body p-4">

                          <!-- FORM -->
                          <form action="{{ route('registration.submit') }}" method="POST" id="registrationForm">
                              @csrf

                              <!-- Hidden category id -->
                              <input type="hidden" name="category_id" value="{{ $category->id }}">

                              <!-- Hidden registration id -->
                              <input type="hidden" name="registration_id" value="{{ $regId }}">

                              <!-- Show category title -->
                              <div class="mb-3">
                                  <!-- <label class="form-label fw-semibold">Category</label> -->
                                  <input type="hidden" class="form-control form-control-lg bg-light"
                                      value="{{ $category->title }}" readonly>
                              </div>

                              <div class="row g-4">

                                  <div class="col-md-12">
                                      <!-- <label class="form-label fw-semibold">Registration ID</label> -->
                                      <input type="hidden" class="form-control form-control-lg bg-light"
                                          value="{{ $regId }}" readonly>
                                  </div>

                                  <div class="col-md-6">
                                      <label class="form-label fw-semibold">Name</label>
                                      <input type="text" name="name" class="form-control form-control-lg"
                                          placeholder="Enter full name" value="{{ $category->title }}" required>
                                  </div>

                                  <div class="col-md-6">
                                      <label class="form-label fw-semibold">Email</label>
                                      <input type="email" name="email" class="form-control form-control-lg"
                                          placeholder="example@email.com" required>
                                  </div>

                                  <div class="col-md-6">
                                      <label class="form-label fw-semibold">Phone Number</label>
                                      <input type="tel" name="phone" class="form-control form-control-lg"
                                          maxlength="15" placeholder="Enter phone number" required>
                                  </div>

                              </div>

                              <div class="text-center mt-4">
                                  <button type="submit" class="btn btn-primary px-4" id="submitBtn">
                                      Submit Registration
                                  </button>
                              </div>

                          </form>

                          <!-- AJAX response -->
                          <div id="responseMsg" class="alert mt-4 d-none"></div>

                      </div>

                  </div>

              </div>
          </div>
      </div>
  </section>




  <!-- ✅ AJAX Script -->
  <script>
      document.getElementById('registrationForm').addEventListener('submit', function(e) {
          e.preventDefault();

          let form = this;
          let submitBtn = document.getElementById('submitBtn');
          let responseMsg = document.getElementById('responseMsg');

          // Disable the button and show a submitting message
          submitBtn.disabled = true;
          submitBtn.textContent = 'Submitting...';

          // Submit the form data using Fetch API
          fetch("{{ route('registration.submit') }}", {
                  method: "POST",
                  headers: {
                      'X-CSRF-TOKEN': document.querySelector('input[name=_token]').value,
                      'Accept': 'application/json'
                  },
                  body: new FormData(form)
              })
              .then(response => response.json()) // Convert the response to JSON
              .then(data => {
                  submitBtn.disabled = false;
                  submitBtn.textContent = 'Submit Registration';

                  // Clear previous response messages
                  responseMsg.classList.remove('d-none', 'alert-danger', 'alert-success');

                  // Handle success response
                  if (data.status === 'success') {
                      responseMsg.classList.add('alert-success');
                      responseMsg.textContent = data.message;
                      form.reset(); // Reset the form fields after submission
                  } else {
                      // Handle error response
                      responseMsg.classList.add('alert-danger');
                      responseMsg.textContent = data.message;
                  }
              })
              .catch(error => {
                  // Handle any errors during the request
                  submitBtn.disabled = false;
                  submitBtn.textContent = 'Submit Registration';
                  responseMsg.classList.remove('d-none');
                  responseMsg.classList.add('alert-danger');
                  responseMsg.textContent = 'Something went wrong. Please try again.';
                  console.error(error);
              });
      });
  </script>

  @endsection