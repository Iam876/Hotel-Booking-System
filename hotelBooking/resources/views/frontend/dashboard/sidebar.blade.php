<div class="col-lg-3">
    <div class="service-side-bar">
        <div class="services-bar-widget">
            <h3 class="title">Others Services</h3>
            <div class="side-bar-categories">
                <img src="{{ !empty($userProfileData->photo) ? url('upload/userImages/' . $userProfileData->photo) : url('upload/no_image.jpg') }}" class="rounded mx-auto d-block" alt="Image"
                    style="width:100px; height:100px;"> <br><br>

                <ul>

                    <li class="{{ Route::currentRouteName() === 'user.dashboard' ? 'active-profile-menu' : '' }}">
                        <a href="{{ Route("user.dashboard") }}">User Dashboard</a>
                    </li>
                    <li class="{{ Route::currentRouteName() === 'user.profile' ? 'active-profile-menu' : '' }}">
                        <a href="{{ Route("user.profile") }}">User Profile </a>
                    </li>
                    <li class="{{ Route::currentRouteName() === 'user.change.password' ? 'active-profile-menu' : '' }}">
                        <a href="{{ Route("user.change.password") }}">Change Password</a>
                    </li>
                    <li class="{{ Route::currentRouteName() === 'user.booking.list' ? 'active-profile-menu' : '' }}">
                        <a href="{{ Route("user.booking.list") }}">Booking Details </a>
                    </li>
                    <li>
                        <a href="{{ Route("user.logout") }}">Logout </a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</div>
