@extends('frontend.dashboard.dashboardMaster')
@section('multipleDashboard')
<div class="col-lg-9">
    <div class="service-article">


        <section class="checkout-area pb-70">
            <div class="container">
                <form action="{{ Route("user.change.password.store") }}" method="POST">
                    @csrf
                    <div class="row">
                        <div class="col-lg-12 col-md-12">
                            <div class="billing-details">
                                <h3 class="title">Change Password </h3>

                                <div class="row">

                                    <div class="col-lg-6 col-md-6">
                                        <div class="form-group">
                                            <label for="old_password">Old Password <span class="required">*</span></label>
                                            <input type="password" name="old_password" id="old_password" placeholder="Enter your old password"  class="form-control @error('old_password') is-invalid @enderror">
                                            @error('old_password')
                                                <span class="text-danger">{{ $message; }}</span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-md-6">
                                        <div class="form-group">
                                            <label for="new_password">Password <span class="required">*</span></label>
                                            <input type="password" name="new_password" id="new_password" placeholder="Enter your new password"  class="form-control @error('new_password') is-invalid @enderror">
                                            @error('new_password')
                                                <span class="text-danger">{{ $message; }}</span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-md-6">
                                        <div class="form-group">
                                            <label for="new_password_confirmation">Confirm Password <span class="required">*</span></label>
                                            <input type="password" name="new_password_confirmation" id="new_password_confirmation" placeholder="Enter your confirm password"  class="form-control @error('new_password_confirmation') is-invalid @enderror">
                                            @error('new_password_confirmation')
                                                <span class="text-danger">{{ $message; }}</span>
                                            @enderror
                                        </div>
                                    </div>

                                    <button type="submit" class="btn btn-danger">Update Password </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </section>

    </div>
</div>
@endsection
