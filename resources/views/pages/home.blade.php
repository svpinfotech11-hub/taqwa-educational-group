@extends('pages.partials.app')
@section('content')

<style>
    .hero-slider-area {
        position: relative;
        width: 100%;
        /* height: 100vh; */
        /* full screen height */
    }

    .hero-slider-area .swiper-slide {
        position: relative;
        background-size: cover;
        background-position: center;
        background-repeat: no-repeat;
        height: 450px;
        display: flex;
        justify-content: center;
        align-items: center;
    }

    .hero-slider-area .overlay {
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background: rgba(0, 0, 0, 0.5);
        z-index: 1;
    }

    .hero-content {
        position: relative;
        z-index: 2;
        color: #fff;
        text-align: center;
        max-width: 800px;
        padding: 20px;
    }

    .hero-content h2 {
        font-size: 48px;
        font-weight: 700;
        margin-bottom: 15px;
    }

    .hero-content p {
        font-size: 18px;
        line-height: 1.6;
    }

    @media (max-width: 768px) {
        .hero-content h2 {
            font-size: 28px;
        }

        .hero-content p {
            font-size: 15px;
        }

        .hero-slider-area {
            height: 70vh;
        }
    }

    .categories-area {
        margin-top: -180px;
    }

    .section-py-120 {
        padding: 200px 0;
    }

    .swiper-button-next:after,
    .swiper-button-prev:after {
        /* background: #00ffff57; */
        font-family: swiper-icons;
        font-size: var(--swiper-navigation-size);
        text-transform: none !important;
        letter-spacing: 0;
        font-variant: initial;
        line-height: 1;
        width: 50px;
        height: 30px;
        border-radius: 100%;
        font-size: 30px !important;
        display: flex;
        align-items: center;
        justify-content: center;
        font-weight: 900;
        color: #fff;
    }

    .section__title h4 {
        font-size: 20px;
    }

    @media (max-width: 768px) {
        .hero-slider-area {
            height: 50vh;
        }

        .section__title h4 {
            font-size: 18px;
        }
    }

    .section-pb-110 {
        padding-bottom: 0px;
    }

    .section-pt-140 {
        padding-top: 35px;
    }

    .blog__post-item-four.shine__animate-item.asd {
        height: 150px;
    }
    .text-center.test-des p {
    text-align: justify;
}


</style>
<!-- banner-area -->
<section class="hero-slider-area">
    <div class="swiper heroSwiper">
        <div class="swiper-wrapper">
            @foreach ($banners as $banner)
            <div class="swiper-slide" style="background-image: url('{{ asset('banners/'.$banner->image) }}');">
                <div class="overlay"></div>
                <div class="hero-content text-center">
                    <h2>{{ $banner->title }}</h2>
                    <p>{{ $banner->description }}</p>
                </div>
            </div>
            @endforeach
        </div>
        <!-- <div class="swiper-pagination"></div> -->
        <div class="swiper-button-next"></div>
        <div class="swiper-button-prev"></div>
    </div>
</section>

<!-- banner-area-end -->

<div class="container">
    <div class="row">
        <div class="col-md-10 mx-auto">
        <div class="row justify-content-center">
        <div class="col-xl-10 mt-4 mx-auto">
                <div class="section__title text-center mb-2">
                    <h2 class="title">{{ $homeabout->title ?? '' }}</h2>
                    <!-- <h6>Welcome to Taqwa Education Group</h6> -->
                </div>
            </div>
        </div>
          <div class="text-center test-des">{!! $homeabout->description ?? ''  !!}</div>
    </div>
</div>
</div>

<!-- conferences-area -->
<section class="blog__post-area-six section-pt-140 section-pb-110">
    <div class="container">

        <div class="row justify-content-center">
            <div class="col-xl-6">
                <div class="section__title text-center mb-50">
                    <h2 class="title">Our Latest Conferences</h2>
                </div>
            </div>
        </div>

        <div class="row justify-content-center">
            <!-- <h4>NEWS AND ANNOUNCEMENT</h4> -->

            @foreach ($conferences as $conf)
            <div class="col-lg-4 col-md-6">
                <div class="blog__post-item-four shine__animate-item asd">

                    <!-- CONFERENCE IMAGE -->
                    <!-- <div class="blog__post-thumb-four">
                        <a href="{{ route('show-page', $conf->slug ?? $conf->id) }}"
                           class="shine__animate-link">
                            <img src="{{ asset('uploads/conferences/'.$conf->image) }}" alt="img">
                        </a>
                    </div> -->

                    <!-- CONFERENCE CONTENT -->
                    <div class="blog__post-content-four">
                        <h2 class="title">
                            <a href="{{ route('show-page', $conf->slug ?? $conf->id) }}">
                                {{ $conf->title }}
                            </a>
                        </h2>

                        <div class="blog__post-meta">
                            <ul class="list-wrap">
                                <li>
                                    <i class="flaticon-calendar"></i>
                                    {{ \Carbon\Carbon::parse($conf->date)->format('d M Y') }}
                                </li>
                            </ul>
                        </div>
                    </div>

                </div>
            </div>
            @endforeach

        </div>

    </div>
</section>
<!-- conferences-area-end -->



<!-- events-area -->
<section class="blog__post-area-six section-pt-140 section-pb-110">
    <div class="container">

        <div class="row justify-content-center">
            <div class="col-xl-6">
                <div class="section__title text-center mb-50">
                    <h2 class="title">Our Latest Events</h2>
                </div>
            </div>
        </div>

        <div class="row justify-content-center">

            @foreach ($events as $event)
            <div class="col-lg-4 col-md-6">
                <div class="blog__post-item-four shine__animate-item">

                    <!-- EVENT IMAGE -->
                    <div class="blog__post-thumb-four">
                        <a href="{{ route('pages.event-detail-page', $event->id) }}"
                            class="shine__animate-link">
                            <img src="{{ asset('events/'.$event->image) }}" alt="img">
                        </a>
                    </div>

                    <!-- EVENT CONTENT -->
                    <div class="blog__post-content-four">
                        <h2 class="title">
                            <a href="{{ route('pages.event-detail-page', $event->id) }}">
                                {{ $event->name }}
                            </a>
                        </h2>

                        <div class="blog__post-meta">
                            <ul class="list-wrap">
                                <li>
                                    <i class="flaticon-calendar"></i>
                                    {{ \Carbon\Carbon::parse($event->event_date)->format('d M Y') }}
                                </li>
                            </ul>
                        </div>
                    </div>

                </div>
            </div>
            @endforeach

        </div>

    </div>
</section>
<!-- events-area-end -->



<!-- course-area -->
<section class="courses-area section-pt-120 section-pb-90" data-background="assets/img/bg/courses_bg.jpg">
    <div class="container">
        <div class="section__title-wrap">
            <div class="row justify-content-center">
                <div class="col-lg-6">
                    <div class="section__title text-center mb-40">
                        <span class="sub-title">Top Class Courses</span>
                        <h2 class="title">Explore Our World's Best Courses</h2>
                        <p class="desc">When known printer took a galley of type scrambl edmake</p>
                    </div>
                    <div class="courses__nav">
                        <ul class="nav nav-tabs" id="courseTab" role="tablist">
                            <li class="nav-item" role="presentation">
                                <button class="nav-link active" id="all-tab" data-bs-toggle="tab" data-bs-target="#all-tab-pane" type="button"
                                    role="tab" aria-controls="all-tab-pane" aria-selected="true">
                                    All Courses
                                </button>
                            </li>

                            @foreach ($categories as $category)
                            <li class="nav-item" role="presentation">
                                <button class="nav-link" id="category-tab-{{ $category->id }}" data-bs-toggle="tab"
                                    data-bs-target="#category-pane-{{ $category->id }}" type="button" role="tab"
                                    aria-controls="category-pane-{{ $category->id }}" aria-selected="false">
                                    {{ $category->name }}
                                </button>
                            </li>
                            @endforeach
                        </ul>
                    </div>
                </div>
            </div>
        </div>

        <div class="tab-content" id="courseTabContent">

            {{-- ================= ALL COURSES TAB ================= --}}
            <div class="tab-pane fade show active" id="all-tab-pane" role="tabpanel" aria-labelledby="all-tab" tabindex="0">
                <div class="swiper courses-swiper-active">
                    <div class="swiper-wrapper">
                        @foreach ($categories as $category)
                        @foreach ($category->courses as $course)
                        <div class="swiper-slide">
                            <div class="courses__item shine__animate-item">
                                <div class="courses__item-thumb">
                                    <a href="#" class="shine__animate-link">
                                        <img src="{{ asset('courses/' . $course->thumbnail_url) }}" alt="img">
                                    </a>
                                </div>
                                <div class="courses__item-content">
                                    <ul class="courses__item-meta list-wrap">
                                        <li class="courses__item-tag">
                                            <a href="#">{{ $category->name }}</a>
                                        </li>
                                        <li class="avg-rating"><i class="fas fa-star"></i> (4.8 Reviews)</li>
                                    </ul>
                                    <h5 class="title"><a href="#">{{ $course->name }}</a></h5>
                                    <div class="courses__item-bottom">
                                        <div class="button">
                                            <a href="#">
                                                <span class="text">Enroll Now</span>
                                                <i class="flaticon-arrow-right"></i>
                                            </a>
                                        </div>
                                        <h5 class="price">₹{{ $course->fee }}</h5>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @endforeach
                        @endforeach
                    </div>
                </div>
                <div class="courses__nav">
                    <div class="courses-button-prev"><i class="flaticon-arrow-right"></i></div>
                    <div class="courses-button-next"><i class="flaticon-arrow-right"></i></div>
                </div>
            </div>

            {{-- ================= CATEGORY-WISE TABS ================= --}}
            @foreach ($categories as $category)
            <div class="tab-pane fade" id="category-pane-{{ $category->id }}" role="tabpanel"
                aria-labelledby="category-tab-{{ $category->id }}" tabindex="0">
                <div class="swiper courses-swiper-active">
                    <div class="swiper-wrapper">
                        @forelse ($category->courses as $course)
                        <div class="swiper-slide">
                            <div class="courses__item">
                                <div class="courses__item-thumb">
                                    <a href="#" class="shine__animate-link">
                                        <img src="{{ asset('courses/'.$course->thumbnail_url) }}" alt="img">
                                    </a>
                                </div>
                                <div class="courses__item-content">
                                    <ul class="courses__item-meta list-wrap">
                                        <li class="courses__item-tag">
                                            <a href="#">{{ $category->name }}</a>
                                        </li>
                                        <li class="avg-rating"><i class="fas fa-star"></i> (4.8 Reviews)</li>
                                    </ul>
                                    <h5 class="title"><a href="{{ route('pages.course-detail', $course->id) }}">{{ $course->name }}</a></h5>
                                    <div class="courses__item-bottom">
                                        <div class="button">
                                            <a href="#">
                                                <span class="text">Enroll Now</span>
                                                <i class="flaticon-arrow-right"></i>
                                            </a>
                                        </div>
                                        <h5 class="price">₹{{ $course->fee }}</h5>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @empty
                        <p class="text-center text-muted">No courses available in this category.</p>
                        @endforelse
                    </div>
                </div>
                <div class="courses__nav">
                    <div class="courses-button-prev"><i class="flaticon-arrow-right"></i></div>
                    <div class="courses-button-next"><i class="flaticon-arrow-right"></i></div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</section>

<!-- course-area-end -->

<!-- newsletter-area -->
<section class="newsletter__area">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-4">
                <div class="newsletter__img-wrap">
                    <img src="assets/img/others/newsletter_img.png" alt="img">
                    <img src="assets/img/others/newsletter_shape01.png" alt="img" data-aos="fade-up" data-aos-delay="400">
                    <img src="assets/img/others/newsletter_shape02.png" alt="img" class="alltuchtopdown">
                </div>
            </div>
            <div class="col-lg-8">
                <div class="newsletter__content">
                    <h2 class="title">Want to stay <span>informed</span> about <br> new <span>courses & study?</span></h2>
                    <div class="newsletter__form">
                        <form action="#">
                            <input type="email" placeholder="Type your e-mail">
                            <button type="submit" class="btn">Subscribe Now</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="newsletter__shape">
        <img src="assets/img/others/newsletter_shape03.png" alt="img" data-aos="fade-left" data-aos-delay="400">
    </div>
</section>
<!-- newsletter-area-end -->



<!-- blog-area -->
<section class="blog__post-area-six section-pt-140 section-pb-110">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-xl-6">
                <div class="section__title text-center mb-50">
                    <!-- <span class="sub-title">News & Blogs</span> -->
                    <h2 class="title">Our Latest News</h2>
                    <!-- <p>when known printer took a galley of type scrambl edmake</p> -->
                </div>
            </div>
        </div>
        <div class="row justify-content-center">
            @foreach ($news as $newss)
            <div class="col-lg-4 col-md-6">
                <div class="blog__post-item-four shine__animate-item">
                    <div class="blog__post-thumb-four">
                        <a href="{{ route('pages.news-details', $newss->id) }}" class="shine__animate-link"><img src="{{ asset('uploads/news/'.$newss->image) }}" alt="img"></a>
                    </div>
                    <div class="blog__post-content-four">
                        <!-- <a href="blog.html" class="post-tag-three">Marketing</a> -->
                        <h2 class="title"><a href="{{ route('pages.news-details', $newss->id) }}">{{ $newss->title }}</a></h2>
                        <div class="blog__post-meta">
                            <ul class="list-wrap">
                                <!-- <li><i class="flaticon-user-1"></i>by <a href="">Admin</a></li> -->
                                <li><i class="flaticon-calendar"></i>{{ \Carbon\Carbon::parse($newss->news_date)->format('d M Y') }}</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
        </div>

    </div>
</section>
<!-- blog-area-end -->

<script>
    let swipers = {};

    function initTabSwiper(tabId) {
        if (swipers[tabId]) swipers[tabId].destroy(true, true);

        swipers[tabId] = new Swiper(`#${tabId} .courses-swiper-active`, {
            slidesPerView: 4,
            spaceBetween: 30,
            loop: true,
            // observer: true,
            // observeParents: true,
            navigation: {
                nextEl: ".courses-button-next",
                prevEl: ".courses-button-prev",
            },
            breakpoints: {
                1500: {
                    slidesPerView: 4,
                },
                1200: {
                    slidesPerView: 4,
                },
                992: {
                    slidesPerView: 3,
                    spaceBetween: 24,
                },
                768: {
                    slidesPerView: 2,
                    spaceBetween: 20,
                },
                576: {
                    slidesPerView: 1,
                    spaceBetween: 15,
                },
                0: {
                    slidesPerView: 1,
                    spaceBetween: 10,
                },
            },
        });
    }

    document.querySelectorAll('[data-bs-toggle="tab"]').forEach(btn => {
        btn.addEventListener('shown.bs.tab', e => {
            const targetId = e.target.getAttribute('data-bs-target').replace('#', '');
            setTimeout(() => initTabSwiper(targetId), 200);
        });
    });

    // Initialize first active tab swiper on load
    document.addEventListener("DOMContentLoaded", () => {
        const activeTab = document.querySelector('.tab-pane.active');
        if (activeTab) initTabSwiper(activeTab.id);
    });
</script>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css" />
<script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>
<script>
    var heroSwiper = new Swiper(".heroSwiper", {
        loop: true, // infinite loop
        autoplay: {
            delay: 5000, // time between slides
            disableOnInteraction: false, // keep autoplay even after manual swipe
        },
        speed: 1200, // transition duration
        effect: "fade", // fade effect
        fadeEffect: {
            crossFade: true // smooth fade
        },
        pagination: {
            el: ".swiper-pagination",
            clickable: true,
        },
        navigation: {
            nextEl: ".swiper-button-next",
            prevEl: ".swiper-button-prev",
        },
    });
</script>
<!-- Bootstrap 4 CSS -->
<!-- <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet"> -->

<!-- jQuery -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<!-- Bootstrap 4 JS -->
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.bundle.min.js"></script>

@endsection
