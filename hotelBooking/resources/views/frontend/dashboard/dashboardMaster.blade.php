@extends('frontend.mainMaster')
@section('main')
    <!-- Inner Banner -->
@include('frontend.dashboard.bannerTitle')
    <!-- Inner Banner End -->

    <!-- Service Details Area -->
    <div class="service-details-area pt-100 pb-70">
        <div class="container">
            <div class="row">

                <!-- Start Sidebar -->
                @include('frontend.dashboard.sidebar')
                <!-- End Sidebar -->
                <!-- Start userDashboard -->
                @yield('multipleDashboard')
                <!-- End userDashboard -->

            </div>
        </div>
    </div>
    <!-- Service Details Area End -->
@endsection
