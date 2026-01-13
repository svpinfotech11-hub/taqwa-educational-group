@extends('pages.partials.app')
@section('content')
    <!-- breadcrumb-area -->
    <section class="breadcrumb__area breadcrumb__bg" data-background="{{ asset('subpage_banners/' . $page->image) }}">
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
            <img src="{{ asset('assets/img/others/breadcrumb_shape02.svg') }}" alt="img" data-aos="fade-right"
                data-aos-delay="300">
            <img src="{{ asset('assets/img/others/breadcrumb_shape03.svg') }}" alt="img" data-aos="fade-up"
                data-aos-delay="400">
            <img src="{{ asset('assets/img/others/breadcrumb_shape04.svg') }}" alt="img" data-aos="fade-down-left"
                data-aos-delay="400">
            <img src="{{ asset('assets/img/others/breadcrumb_shape05.svg') }}" alt="img" data-aos="fade-left"
                data-aos-delay="400">
        </div>
    </section>
    <!-- breadcrumb-area-end -->

    <!-- about-area -->
    <section class="about-area-three section-py-120">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-8">
                    <div class="about-card">
                        <span class="about-subtitle">
                            <i class="bi bi-info-circle-fill"></i>
                            Get More About Us
                        </span>
                        <h2 class="about-title">{{ $about->name ?? '' }}</h2>
                        <p class="about-desc">
                            {!! $about->description ?? '' !!}
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <div class="media-area">
        <div class="container">
            <div class="row g-4">
                @forelse ($about->details as $detail)
                    @if ($detail->image)
                        <div class="col-lg-3 col-md-4 col-sm-6">
                            <div class="bg-white shadow-sm rounded h-100 p-3">

                                <img src="{{ asset('about/images/' . $detail->image) }}" class="img-fluid rounded w-100"
                                    style="height:200px; object-fit:cover;" alt="About Image">
                            </div>
                        </div>
                    @endif
                    @if ($detail->video)
                        <div class="col-lg-3 col-md-4 col-sm-6">
                            <div class="bg-white shadow-sm rounded h-100 p-3">
                                <video class="w-100 rounded" controls style="height:200px; object-fit:cover;"
                                    poster="{{ asset('about/video_thumbs/' . $detail->thumbnail) }}">
                                    <source src="{{ asset('about/videos/' . $detail->video) }}" type="video/mp4">
                                    Your browser does not support the video tag.
                                </video>
                            </div>
                        </div>
                    @endif
                @empty
                    <div class="col-12 text-center py-5">
                        <h5 class="text-muted">No media found.</h5>
                    </div>
                @endforelse
            </div>
        </div>
    </div>


    <!-- brand-area -->
    {{--  <div class="brand-area">
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
    </div>  --}}
    <!-- brand-area-end -->

    <!-- features-area -->
    {{--  <section class="features__area-three section-pt-120 section-pb-90">
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
                                        <img src="{{ asset('assets/img/icons/h2_features_icon01.svg') }}" alt="img"
                                            class="injectable">
                                    </div>
                                    <h2 class="title">Expert Tutors</h2>
                                </div>
                                <p>when an unknown printer took a galley offe type and scrambled makes.</p>
                            </div>
                            <div class="features__item-shape">
                                <img src="{{ asset('assets/img/others/features_item_shape.svg') }}" alt="img"
                                    class="injectable">
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6">
                        <div class="features__item-two">
                            <div class="features__content-two">
                                <div class="content-top">
                                    <div class="features__icon-two">
                                        <img src="{{ asset('assets/img/icons/h2_features_icon02.svg') }}" alt="img"
                                            class="injectable">
                                    </div>
                                    <h2 class="title">Effective Courses</h2>
                                </div>
                                <p>when an unknown printer took a galley offe type and scrambled makes.</p>
                            </div>
                            <div class="features__item-shape">
                                <img src="{{ asset('assets/img/others/features_item_shape.svg') }}" alt="img"
                                    class="injectable">
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6">
                        <div class="features__item-two">
                            <div class="features__content-two">
                                <div class="content-top">
                                    <div class="features__icon-two">
                                        <img src="{{ asset('assets/img/icons/h2_features_icon03.svg') }}" alt="img"
                                            class="injectable">
                                    </div>
                                    <h2 class="title">Earn Certificate</h2>
                                </div>
                                <p>when an unknown printer took a galley offe type and scrambled makes.</p>
                            </div>
                            <div class="features__item-shape">
                                <img src="{{ asset('assets/img/others/features_item_shape.svg') }}" alt="img"
                                    class="injectable">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>  --}}
    <!-- features-area-end -->
@endsection
