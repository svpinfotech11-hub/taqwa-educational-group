@extends('pages.partials.app')
@section('content')
<style>
    .faq__content-two.faq__content-three p {
    text-align: justify;
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
                        <!-- <span property="itemListElement" typeof="ListItem">About Us</span> -->
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


<!-- faq-area -->
<section class="faq__area-three tg-motion-effects section-py-140">
    <div class="container">
       <div class="col-md-12">
         <div class="row align-items-center justify-content-center">
            <div class="col-lg-7 order-0 order-lg-2">
                <div class="faq__img-four">
                    <div class="main-img">
                        <img src="assets/img/others/h6_faq_img01.jpg" alt="img" data-aos="fade-down" data-aos-delay="400">
                        <img src="assets/img/others/h6_faq_img02.jpg" alt="img" data-aos="fade-up" data-aos-delay="400">
                    </div>
                    <div class="faq__language-wrap" data-aos="fade-right" data-aos-delay="600">
                        <h2 class="title">160k</h2>
                        <span>Country Language</span>
                    </div>
                    <div class="shape">
                        <img src="assets/img/others/h6_faq_shape01.svg" alt="shape" class="alltuchtopdown">
                        <img src="assets/img/others/h6_faq_shape02.svg" alt="shape" class="tg-motion-effects4">
                        <img src="assets/img/others/h6_faq_shape03.svg" alt="shape" class="tg-motion-effects3">
                    </div>
                </div>
            </div>
            <div class="col-lg-5">
                <div class="faq__content-two faq__content-three">
                    <div class="section__title mb-15">
                        <!-- <span class="sub-title">Faq’s</span> -->
                        <h2 class="title bold">Academic Intensive Care Unit</h2>
                    </div>
                    <p>An innovative approach of imparting high quality education to the madrasa dropout and probable dropout students of School Grades 1st to 12th.</p>
                    <p>Education on this concept is being conceived and delivered with specific approach to target stake holders by Shaheen Educational Society in Bidar-Karnataka.</p>

                    <p>Academic Intensive Care Unit (AICU)’ is aimed to bring the drop-outs and Madrasa students to mainstream education. It is an innovative concept of imparting high-quality education to the dropout and Madrasa students between school grades 1st to 12th.
                        Mainstreaming the marginalized community by providing education from KG to UG is the core work of the organization.
                        Shaheen started a pilot project ‘Academic Intensive Care Unit (AICU)’ aimed to bring the drop-outs and Madrasa students to mainstream education.</p>
                    <div class="faq__wrap faq__wrap-two">

                    </div>
                </div>
            </div>
        </div>
       </div>
    </div>
</section>


<section class="faq__area-three tg-motion-effects section-py-140">
    <div class="container">
        <div class="row align-items-center justify-content-center">
            <div class="col-lg-10">
                <div class="faq__content-two faq__content-three">
                    <div class="section__title mb-15">
                        <!-- <span class="sub-title">Faq’s</span> -->
                        <h2 class="title bold">Why Our Schools are the Right Fit for Your Child?</h2>
                    </div>
                    <p>Groove’s intuitive shared inbox makes it easy for team members to organize, prioritize and.In this episod.</p>
                    <div class="faq__wrap faq__wrap-two">
                        <div class="accordion" id="accordionExample">
                            <div class="accordion-item">
                                <h2 class="accordion-header">
                                    <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                      Beneficiaries
                                    </button>
                                </h2>
                                <div id="collapseOne" class="accordion-collapse collapse show" data-bs-parent="#accordionExample">
                                    <div class="accordion-body">
                                        <p>Sorem ipsum dolor sit amet consectur adipiscing elit sed eius mod
                                            nt labore dolore magna aliquaenim ad minim sorem ipsum dolor sit
                                            amet consectur adipiscing elit sed eius modam.</p>
                                    </div>
                                </div>
                            </div>
                            <div class="accordion-item">
                                <h2 class="accordion-header">
                                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                                        Location
                                    </button>
                                </h2>
                                <div id="collapseTwo" class="accordion-collapse collapse" data-bs-parent="#accordionExample">
                                    <div class="accordion-body">
                                        <p>Sorem ipsum dolor sit amet consectur adipiscing elit sed eius mod
                                            nt labore dolore magna aliquaenim ad minim sorem ipsum dolor sit
                                            amet consectur adipiscing elit sed eius modam.</p>
                                    </div>
                                </div>
                            </div>
                            <div class="accordion-item">
                                <h2 class="accordion-header">
                                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                                        Dropout
                                    </button>
                                </h2>
                                <div id="collapseThree" class="accordion-collapse collapse" data-bs-parent="#accordionExample">
                                    <div class="accordion-body">
                                        <p>Sorem ipsum dolor sit amet consectur adipiscing elit sed eius mod
                                            nt labore dolore magna aliquaenim ad minim sorem ipsum dolor sit
                                            amet consectur adipiscing elit sed eius modam.</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- faq-area-end -->

@endsection