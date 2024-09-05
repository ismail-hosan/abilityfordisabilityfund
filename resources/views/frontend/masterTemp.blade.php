@include('frontend.include.header')

<div class="wrapper">
    @include('frontend.include.menu')

    @yield('front-main-content')

    @include('frontend.include.footer')
    @include('frontend.include.footer_links')
