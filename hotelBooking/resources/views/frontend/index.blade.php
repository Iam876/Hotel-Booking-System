@extends("frontend.mainMaster")
@section('main')
<!-- Banner Area -->
@include("frontend.home.bannerArea")
<!-- Banner Area End -->

<!-- Banner Form Area -->
@include("frontend.home.bannerForm")
<!-- Banner Form Area End -->

<!-- Room Area -->
@include("frontend.home.room-area")
<!-- Room Area End -->

<!-- Book Area Two-->
@include("frontend.home.bookAreaTwo")
<!-- Book Area Two End -->

<!-- Services Area Three -->
@include("frontend.home.services")
<!-- Services Area Three End -->

<!-- Team Area Three -->
@include("frontend.home.teamArea")
<!-- Team Area Three End -->

<!-- Testimonials Area Three -->
@include("frontend.home.testimonials")
<!-- Testimonials Area Three End -->

<!-- FAQ Area -->
@include("frontend.home.faq")
<!-- FAQ Area End -->

<!-- Blog Area -->
@include("frontend.home.blog")
<!-- Blog Area End -->
@endsection
