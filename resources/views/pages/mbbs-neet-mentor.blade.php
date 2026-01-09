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
              <div class="col-lg-10 mx-auto">
                  <div class="card shadow-lg border-0 rounded-4">
                      <div class="card-header bg-gradient text-white text-center py-4" style="background: linear-gradient(135deg, #007bff, #00bcd4);">
                          <h3 class="mb-0 fw-bold">MBBS Mentor</h3>
                          <p class="mb-0" style="font-size: 14px; opacity: 0.9;">Free One-to-One Counselling to select MBBS Seats in India & Abroad by expert NEET Counsellors</p>
                      </div>

                      <div class="card-body p-5">
                          <form id="mbbsMentor">
                              @csrf
                              <div class="row g-4">

                                  <div class="col-md-6">
                                      <label class="form-label fw-semibold">Full Name</label>
                                      <input type="text" name="full_name" class="form-control" placeholder="Enter full name" required>
                                  </div>

                                  <div class="col-md-6">
                                      <label class="form-label fw-semibold">Father's Name</label>
                                      <input type="text" name="fathers_name" class="form-control" placeholder="Enter father's name" required>
                                  </div>

                                  <div class="col-md-6">
                                      <label class="form-label fw-semibold">NEET Hall Ticket Number</label>
                                      <input type="text" name="neet_hall_ticket_number" class="form-control" placeholder="Enter hall ticket number" required>
                                  </div>

                                  <div class="col-md-6">
                                      <label class="form-label fw-semibold">Application Number</label>
                                      <input type="text" name="application_number" class="form-control" placeholder="Enter application number" required>
                                  </div>

                                  <div class="col-md-6">
                                      <label class="form-label fw-semibold">NEET Marks</label>
                                      <input type="number" name="neet_marks" class="form-control" min="0" placeholder="Enter marks" required>
                                  </div>

                                  <div class="col-md-6">
                                      <label class="form-label fw-semibold">All India Rank</label>
                                      <input type="number" name="all_india_rank" class="form-control" min="1" placeholder="Enter AIR" required>
                                  </div>

                                  <div class="col-md-6">
                                      <label class="form-label fw-semibold">Category Rank & Name</label>
                                      <input type="text" name="category_rank_name" class="form-control" placeholder="Enter category rank & name" required>
                                  </div>

                                  <div class="col-md-6">
                                      <label class="form-label fw-semibold">Date of Birth</label>
                                      <input type="date" name="date_of_birth" class="form-control" required>
                                  </div>

                                  <div class="col-md-6">
                                      <label class="form-label fw-semibold">Email</label>
                                      <input type="email" name="email" class="form-control" placeholder="Enter email">
                                  </div>

                                  <div class="col-md-6">
                                      <label class="form-label fw-semibold">Phone Number</label>
                                      <input type="tel" name="phone" class="form-control" maxlength="10" placeholder="Enter 10-digit number" required>
                                  </div>

                                  <div class="col-md-6">
                                      <label class="form-label fw-semibold">Previous School Name</label>
                                      <input type="text" name="previous_school_name" class="form-control" placeholder="Enter school name" required>
                                  </div>

                                  <div class="col-md-6">
                                      <label class="form-label fw-semibold">Rural/Urban</label>
                                      <select name="rural_urban" class="form-control" required>
                                          <option value="">Select</option>
                                          <option value="Rural">Rural</option>
                                          <option value="Urban">Urban</option>
                                      </select>
                                  </div>

                                  <div class="col-md-6">
                                      <label class="form-label fw-semibold">Medium till 10th Standard</label>
                                      <input type="text" name="medium_till_10th" class="form-control" placeholder="e.g. English" required>
                                  </div>

                                  <div class="col-md-6">
                                      <label class="form-label fw-semibold">Curriculum</label>
                                      <select name="curriculum" class="form-control" required>
                                          <option value="">Select</option>
                                          <option value="State Board">State Board</option>
                                          <option value="CBSE">CBSE</option>
                                          <option value="ICSE">ICSE</option>
                                          <option value="Others">Others</option>
                                      </select>
                                  </div>

                                  <div class="col-md-6">
                                      <label class="form-label fw-semibold">Address</label>
                                      <input type="text" name="address" class="form-control" placeholder="Enter address" required>
                                  </div>

                                  <div class="col-md-6">
                                      <label class="form-label fw-semibold">District</label>
                                      <input type="text" name="district" class="form-control" placeholder="Enter district" required>
                                  </div>

                                  <div class="col-md-6">
                                      <label class="form-label fw-semibold">State</label>
                                      <input type="text" name="state" class="form-control" placeholder="Enter state" required>
                                  </div>

                                  <div class="col-md-6">
                                      <label class="form-label fw-semibold">Claiming Article 371(J)</label>
                                      <select name="claiming_article" class="form-control" required>
                                          <option value="">Select</option>
                                          <option value="1">Yes</option>
                                          <option value="0">No</option>
                                      </select>
                                  </div>


                                  <div class="col-md-6">
                                      <label class="form-label fw-semibold">Category</label>
                                      <div class="ginput_container ginput_container_select">
                                          <select name="category_selection" id="input_51_17" class="form-control">
                                              <option value="">Select Categories</option>
                                              <option value="GM">GM</option>
                                              <option value="OBC(NCL)">OBC(NCL)</option>
                                              <option value="SC">SC</option>
                                              <option value="ST">ST</option>
                                          </select>
                                      </div>
                                  </div>
                              </div>

                              <div class="text-center mt-4">
                                  <button type="submit" class="btn btn-primary px-4" id="submitBtn">Submit Form</button>
                              </div>
                          </form>

                          <div id="responseMsg" class="alert mt-4 d-none"></div>
                      </div>
                  </div>
              </div>
          </div>
      </div>
  </section>


  <script>
      document.getElementById('mbbsMentor').addEventListener('submit', function(e) {
          e.preventDefault();

          let form = this;
          let submitBtn = document.getElementById('submitBtn');
          let responseMsg = document.getElementById('responseMsg');

          submitBtn.disabled = true;
          submitBtn.textContent = 'Submitting...';

          fetch("{{ route('pages.mbbs-neet-mentor.store') }}", {
                  method: "POST",
                  headers: {
                      'X-CSRF-TOKEN': document.querySelector('input[name=_token]').value,
                      'Accept': 'application/json'
                  },
                  body: new FormData(form)
              })
              .then(async response => {
                  submitBtn.disabled = false;
                  submitBtn.textContent = 'Submit Booking';
                  responseMsg.classList.remove('d-none', 'alert-danger', 'alert-success');

                  const data = await response.json();

                  if (response.ok) {
                      // Success response (status 200 or 201)
                      responseMsg.classList.add('alert-success');
                      responseMsg.textContent = data.message || 'Form submitted successfully!';
                      form.reset();
                  } else if (response.status === 422) {
                      // Laravel validation errors
                      responseMsg.classList.add('alert-danger');
                      let errors = data.errors;
                      let messages = [];
                      for (let field in errors) {
                          messages.push(errors[field].join(', '));
                      }
                      responseMsg.innerHTML = messages.join('<br>');
                  } else {
                      // Other errors
                      responseMsg.classList.add('alert-danger');
                      responseMsg.textContent = data.message || 'Something went wrong. Please try again.';
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