@extends('frontend.dashboard.dashboardMaster')
@section('multipleDashboard')
<div class="col-lg-9">
    <div class="service-article">


        <section class="checkout-area pb-70">
            <div class="container">
                <form action="{{ Route("user.profile.store") }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="row">
                        <div class="col-lg-12 col-md-12">
                            <div class="billing-details">
                                <h3 class="title">User Profile </h3>

                                <div class="row">

                                    <div class="col-lg-6 col-md-6">
                                        <div class="form-group">
                                            <label for="username">Username <span class="required">*</span></label>
                                            <input id="username" value="{{ $userProfileData->name }}" name="name" placeholder="Enter your username" type="text" class="form-control">
                                        </div>
                                    </div>

                                    <div class="col-lg-6 col-md-6">
                                        <div class="form-group">
                                            <label for="email">Email Address <span class="required">*</span></label>
                                            <input id="email" value="{{ $userProfileData->email }}" name="email" type="email" class="form-control">
                                        </div>
                                    </div>

                                    <div class="col-lg-6 col-md-6">
                                        <div class="form-group">
                                            <label for="phone">Phone <span class="required">*</span></label>
                                            <input id="phone" value="{{ $userProfileData->phone }}" name="phone" type="text" class="form-control">
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-md-6">
                                        <div class="form-group">
                                            <label for="address">Address <span class="required">*</span></label>
                                            <input for="address" value="{{ $userProfileData->address }}" name="address" type="text" class="form-control">
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-md-6 text-secondary">
                                        <div class="form-group">
                                            <label for="dateOfBirth">Date Of Birth <span class="required">*</span></label>
                                            <input id="dateOfBirth" type="text" class="form-control datepicker flatpickr-input"
                                             value="{{ $userProfileData->dateOfBirth }}" name="dateOfBirth"
                                            readonly="readonly" />
                                        </div>
                                    </div>

                                    <div class="col-lg-12 col-md-6">
                                        <div class="form-group">
                                            <label>User Profile <span class="required">*</span></label>
                                            <input type="file" name="photo" class="form-control" id="uploadImage">
                                        </div>
                                    </div>
                                    <div class="col-lg-12 col-md-6">
                                        <div class="form-group">
                                            <img class="mb-0 w-25" id="showImage"
                                                src="{{ !empty($userProfileData->photo) ? url('upload/userImages/' . $userProfileData->photo) : url('upload/no_image.jpg') }}"
                                                alt="">
                                        </div>
                                    </div>
                                    <button type="submit" class="btn btn-danger">Save Changes </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>

            </div>
        </section>

    </div>
</div>
<script src="{{ asset('backend/customJS/uploadImagePreview.js') }}"></script>
@endsection
