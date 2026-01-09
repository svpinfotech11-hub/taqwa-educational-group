@include('pages.partials.header')

<!-- header-area -->
@include('pages.partials.navbar')
<!-- header-area-end -->



<!-- main-area -->
<main class="main-area fix">

    @yield('content')

</main>
<!-- main-area-end -->

@include('pages.partials.footer')