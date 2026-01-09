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
<!-- breadcrumb-area-end -->

<!-- about-area -->
<section class="about-area-three section-py-120">
    <div class="container">
        <div class="row align-items-center justify-content-center">
            <div class="col-lg-6 col-md-9">
                <div class="about__images-three tg-svg">
                    <img src="{{ asset('about/'.$about->image) }}" alt="img">
                    <span class="svg-icon" id="about-svg" data-svg-icon="{{ asset('assets/img/others/inner_about_shape.svg') }}"></span>
                    <!-- <a href="https://www.youtube.com/watch?v=b2Az7_lLh3g" class="popup-video">
                        <svg xmlns="http://www.w3.org/2000/svg" width="22" height="28" viewBox="0 0 22 28" fill="none">
                            <path d="M0.19043 26.3132V1.69421C0.190288 1.40603 0.245303 1.12259 0.350273 0.870694C0.455242 0.6188 0.606687 0.406797 0.79027 0.254768C0.973854 0.10274 1.1835 0.0157243 1.39936 0.00193865C1.61521 -0.011847 1.83014 0.0480663 2.02378 0.176003L20.4856 12.3292C20.6973 12.4694 20.8754 12.6856 20.9999 12.9535C21.1245 13.2214 21.1904 13.5304 21.1904 13.8456C21.1904 14.1608 21.1245 14.4697 20.9999 14.7376C20.8754 15.0055 20.6973 15.2217 20.4856 15.3619L2.02378 27.824C1.83056 27.9517 1.61615 28.0116 1.40076 27.9981C1.18536 27.9847 0.97607 27.8983 0.792638 27.7472C0.609205 27.596 0.457661 27.385 0.352299 27.1342C0.246938 26.8833 0.191236 26.6008 0.19043 26.3132Z" fill="currentcolor" />
                        </svg>
                    </a> -->
                </div>
            </div>
            <div class="col-lg-6">
                <div class="about__content-three">
                    <div class="section__title mb-10">
                        <span class="sub-title">Get More About Us</span>
                        <h2 class="title">{{ $about->name }}</h2>
                    </div>
                    <p class="desc">{{ $about->description }}</p>
                    <!-- <ul class="about__info-list list-wrap">
                        <li class="about__info-list-item">
                            <i class="flaticon-angle-right"></i>
                            <p class="content"></p>
                        </li>
                        
                    </ul> -->
                    <!-- <div class="tg-button-wrap">
                        <a href="contact.html" class="btn arrow-btn">Start Free Trial <img src="{{ asset('assets/img/icons/right_arrow.svg') }}" alt="img" class="injectable"></a>
                    </div> -->
                </div>
            </div>
        </div>
    </div>
</section>
<!-- about-area-end -->

<!-- brand-area -->
<div class="brand-area">
    <div class="container-fluid">
        <div class="marquee_mode">
            <div class="brand__item">
                <a href="#"><img src="{{ asset('assets/img/brand/brand01.png') }}" alt="brand"></a>
                <img src="{{ asset('assets/img/icons/brand_star.svg') }}" alt="star">
            </div>
            <div class="brand__item">
                <a href="#"><img src="{{ asset('assets/img/brand/brand02.png') }}" alt="brand"></a>
                <img src="{{ asset('assets/img/icons/brand_star.svg') }}" alt="star">
            </div>
            <div class="brand__item">
                <a href="#"><img src="{{ asset('assets/img/brand/brand03.png') }}" alt="brand"></a>
                <img src="{{ asset('assets/img/icons/brand_star.svg') }}" alt="star">
            </div>
            <div class="brand__item">
                <a href="#"><img src="{{ asset('assets/img/brand/brand04.png') }}" alt="brand"></a>
                <img src="{{ asset('assets/img/icons/brand_star.svg') }}" alt="star">
            </div>
            <div class="brand__item">
                <a href="#"><img src="{{ asset('assets/img/brand/brand05.png') }}" alt="brand"></a>
                <img src="{{ asset('assets/img/icons/brand_star.svg') }}" alt="star">
            </div>
            <div class="brand__item">
                <a href="#"><img src="{{ asset('assets/img/brand/brand06.png') }}" alt="brand"></a>
                <img src="{{ asset('assets/img/icons/brand_star.svg') }}" alt="star">
            </div>
            <div class="brand__item">
                <a href="#"><img src="{{ asset('assets/img/brand/brand07.png') }}" alt="brand"></a>
                <img src="{{ asset('assets/img/icons/brand_star.svg') }}" alt="star">
            </div>
            <div class="brand__item">
                <a href="#"><img src="{{ asset('assets/img/brand/brand04.png') }}" alt="brand"></a>
                <img src="{{ asset('assets/img/icons/brand_star.svg') }}" alt="star">
            </div>
            <div class="brand__item">
                <a href="#"><img src="{{ asset('assets/img/brand/brand03.png') }}" alt="brand"></a>
                <img src="{{ asset('assets/img/icons/brand_star.svg') }}" alt="star">
            </div>
        </div>

    </div>
</div>
<!-- brand-area-end -->

<!-- features-area -->
<section class="features__area-three section-pt-120 section-pb-90">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-xl-5 col-lg-8">
                <div class="section__title text-center mb-40">
                    <span class="sub-title">What We Offer</span>
                    <h2 class="title">Learn New Skills When And Where You Like</h2>
                    <p>when known printer took a galley of type scrambl edmake</p>
                </div>
            </div>
        </div>
        <div class="features__item-wrap">
            <div class="row justify-content-center">
                <div class="col-lg-4 col-md-6">
                    <div class="features__item-two">
                        <div class="features__content-two">
                            <div class="content-top">
                                <div class="features__icon-two">
                                    <img src="{{ asset('assets/img/icons/h2_features_icon01.svg') }}" alt="img" class="injectable">
                                </div>
                                <h2 class="title">Expert Tutors</h2>
                            </div>
                            <p>when an unknown printer took a galley offe type and scrambled makes.</p>
                        </div>
                        <div class="features__item-shape">
                            <img src="{{ asset('assets/img/others/features_item_shape.svg') }}" alt="img" class="injectable">
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6">
                    <div class="features__item-two">
                        <div class="features__content-two">
                            <div class="content-top">
                                <div class="features__icon-two">
                                    <img src="{{ asset('assets/img/icons/h2_features_icon02.svg') }}" alt="img" class="injectable">
                                </div>
                                <h2 class="title">Effective Courses</h2>
                            </div>
                            <p>when an unknown printer took a galley offe type and scrambled makes.</p>
                        </div>
                        <div class="features__item-shape">
                            <img src="{{ asset('assets/img/others/features_item_shape.svg') }}" alt="img" class="injectable">
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6">
                    <div class="features__item-two">
                        <div class="features__content-two">
                            <div class="content-top">
                                <div class="features__icon-two">
                                    <img src="{{ asset('assets/img/icons/h2_features_icon03.svg') }}" alt="img" class="injectable">
                                </div>
                                <h2 class="title">Earn Certificate</h2>
                            </div>
                            <p>when an unknown printer took a galley offe type and scrambled makes.</p>
                        </div>
                        <div class="features__item-shape">
                            <img src="{{ asset('assets/img/others/features_item_shape.svg') }}" alt="img" class="injectable">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- features-area-end -->




@endsection