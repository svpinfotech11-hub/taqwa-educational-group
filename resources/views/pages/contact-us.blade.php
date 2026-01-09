       @extends('pages.partials.app')
       @section('content')

       <style>
        .whatsapp-float {
    position: fixed;
    left: 20px;
    bottom: 30px;
    background-color: #25D366;
    color: #fff;
    width: 55px;
    height: 55px;
    border-radius: 50%;
    text-align: center;
    font-size: 30px;
    line-height: 55px;
    z-index: 9999;
    box-shadow: 0 4px 10px rgba(0,0,0,0.3);
    transition: transform 0.3s ease;
}

.whatsapp-float:hover {
    transform: scale(1.1);
    color: #fff;
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
                               <!-- <span property="itemListElement" typeof="ListItem">
                                   <a href="index-2.html">Home</a>
                               </span> -->
                               <!-- <span class="breadcrumb-separator"><i class="fas fa-angle-right"></i></span>
                               <span property="itemListElement" typeof="ListItem">Contact</span> -->
                           </nav>
                       </div>
                   </div>
               </div>
           </div>
           <div class="breadcrumb__shape-wrap">
               <img src="assets/img/others/breadcrumb_shape01.svg" alt="img" class="alltuchtopdown">
               <img src="assets/img/others/breadcrumb_shape02.svg" alt="img" data-aos="fade-right" data-aos-delay="300">
               <img src="assets/img/others/breadcrumb_shape03.svg" alt="img" data-aos="fade-up" data-aos-delay="400">
               <img src="assets/img/others/breadcrumb_shape04.svg" alt="img" data-aos="fade-down-left" data-aos-delay="400">
               <img src="assets/img/others/breadcrumb_shape05.svg" alt="img" data-aos="fade-left" data-aos-delay="400">
           </div>
       </section>
       <!-- breadcrumb-area-end -->

       <!-- contact-area -->
       <section class="contact-area section-py-120">
           <div class="container">
               <div class="row">
                   <!-- Contact Info -->
                   <div class="col-lg-4">
                       <div class="contact-info-wrap">
                           <ul class="list-wrap">
                               <li>
                                   <div class="icon">
                                       <img src="assets/img/icons/map.svg" alt="img" class="injectable">
                                   </div>
                                   <div class="content">
                                       <h4 class="title">Address</h4>
                                       <p>{{ $contactUs->address ?? '—' }}</p>
                                   </div>
                               </li>
                               <li>
                                   <div class="icon">
                                       <img src="assets/img/icons/contact_phone.svg" alt="img" class="injectable">
                                   </div>
                                   <div class="content">
                                       <h4 class="title">Phone</h4>
                                       @if($contactUs->phones)
                                       @foreach($contactUs->phones as $phone)
                                       <a href="tel:{{ $phone }}">{{ $phone }}</a><br>
                                       @endforeach
                                       @else
                                       —
                                       @endif
                                   </div>
                               </li>
                               <li>
                                   <div class="icon">
                                       <img src="assets/img/icons/emial.svg" alt="img" class="injectable">
                                   </div>
                                   <div class="content">
                                       <h4 class="title">E-mail Address</h4>
                                       @if($contactUs->emails)
                                       @foreach($contactUs->emails as $email)
                                       <a href="mailto:{{ $email }}">{{ $email }}</a><br>
                                       @endforeach
                                       @else
                                       —
                                       @endif
                                   </div>
                               </li>
                           </ul>
                       </div>
                   </div>

                   <div class="col-lg-8">


                       <div class="contact-form-wrap">
                           <h4 class="title">Send Us Message</h4>
                           <p>Your email address will not be published. Required fields are marked *</p>

                           @if(session()->has('success'))
                           <div class="alert alert-success">
                               {{ session()->get('success') }}
                           </div>
                           @endif
                           <form method="POST" action="{{ route('contact.us.submit') }}">
                               @csrf
                               <div class="row">
                                   <div class="col-md-4">
                                       <div class="form-grp">
                                           <input name="name" type="text" placeholder="Name *" value="{{ old('name') }}" required>
                                           @error('name') <p class="text-danger">{{ $message }}</p> @enderror
                                       </div>
                                   </div>
                                   <div class="col-md-4">
                                       <div class="form-grp">
                                           <input name="email" type="email" placeholder="E-mail *" value="{{ old('email') }}" required>
                                           @error('email') <p class="text-danger">{{ $message }}</p> @enderror
                                       </div>
                                   </div>
                                   <div class="col-md-4">
                                       <div class="form-grp">
                                           <input name="website" type="url" placeholder="Website" value="{{ old('website') }}">
                                           @error('website') <p class="text-danger">{{ $message }}</p> @enderror
                                       </div>
                                   </div>
                               </div>
                               <div class="form-grp">
                                   <textarea name="message" placeholder="Comment" required>{{ old('message') }}</textarea>
                                   @error('message') <p class="text-danger">{{ $message }}</p> @enderror
                               </div>
                               <button type="submit" class="btn btn-two arrow-btn">
                                   Submit Now
                                   <img src="assets/img/icons/right_arrow.svg" alt="img" class="injectable">
                               </button>
                           </form>
                       </div>
                   </div>

               </div>

               <!-- Map -->
               <div class="contact-map mt-4">
                   <!-- @if($contactUs && $contactUs->map_link) -->
                    @if(!empty($contact->map_link))
                    <div class="contact-map">
                        <iframe
                            src="{{ $contact->map_link }}"
                            width="100%"
                            height="450"
                            style="border:0;"
                            allowfullscreen
                            loading="lazy"
                            referrerpolicy="no-referrer-when-downgrade">
                        </iframe>
                    </div>
                    @endif
                   <!-- @endif -->
               </div>
           </div>
       </section>
       <!-- contact-area-end -->


       @if(!empty($contact->whatsapp_no))
<a href="https://wa.me/{{ $contact->whatsapp_no }}"
   class="whatsapp-float"
   target="_blank"
   title="Chat on WhatsApp">
    <i class="fab fa-whatsapp"></i>
</a>
@endif

       @endsection