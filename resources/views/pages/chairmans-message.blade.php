@extends('pages.partials.app')
@section('content')


<style>
    .about__images-three img {
    -webkit-border-radius: 0px !important;
    -moz-border-radius: 400px;
    -o-border-radius: 400px;
    -ms-border-radius: 400px;
    border-radius: 0px !important;
    width: 100%;
}

@media(max-width:768px){
      .about__images-three img {
    -webkit-border-radius: 0px !important;
    -moz-border-radius: 400px;
    -o-border-radius: 400px;
    -ms-border-radius: 400px;
    border-radius: 0px !important;
    width: 100%;
}
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
                <h2 class="title text-center">{{ $getAllData->title }}</h2>

        @foreach($getAllData->items as $item)
            <div class="row align-items-center mb-5">                <!-- Image -->
                <div class="col-lg-5 col-md-9">
                    <div class="about__images-three">
                        @if($item->image)
                            <img src="{{ asset('chairman_images/'.$item->image) }}" alt="img">
                        @endif
                        <span class="svg-icon"
                              data-svg-icon="{{ asset('assets/img/others/inner_about_shape.svg') }}"></span>
                    </div>
                </div>

                <!-- Content -->
                <div class="col-lg-7">
                    <div class="about__content-three">
                        <div class="section__title mb-10">
                            <!-- <h2 class="title">{{ $getAllData->title }}</h2> -->
                        </div>
                        <p class="desc">{!! nl2br(e($item->description)) !!}</p>
                    </div>
                </div>

            </div>
        @endforeach

    </div>
</div>

</section>
<!-- about-area-end -->



@endsection