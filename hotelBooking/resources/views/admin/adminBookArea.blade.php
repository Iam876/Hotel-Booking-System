@extends('admin.adminDashboard')
@section('adminWrapper')
    <div class="page-content">
        <!--breadcrumb-->
        <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
            <div class="breadcrumb-title pe-3">Booking</div>
            <div class="ps-3">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb mb-0 p-0">
                        <li class="breadcrumb-item"><a href="javascript:;"><i class="bx bx-home-alt"></i></a>
                        </li>
                        <li class="breadcrumb-item active" aria-current="page">Booking Area</li>
                    </ol>
                </nav>
            </div>
        </div>
        <div class="row">
            <div class="col-xl-5">
                <div class="card">
                    <div class="card-body">
                        <h5 class="mt-3 mb-3">Book Area</h5>
                        {{-- <form class="row g-3 p-4" method="POST" enctype="multipart/form-data"> --}}
                        {{-- @csrf --}}
                        {{-- bk -> booking --}}
                        <div class="col-md-12">
                            <label for="input13" class="form-label">Short Description</label>
                            <div class="position-relative input-icon">
                                <input type="text" class="form-control" id="bk_short_desc" placeholder="Enter your name">
                                <span class="position-absolute top-50 translate-middle-y"><i class='bx bx-user'></i></span>
                            </div>
                        </div>
                        <input type="hidden" class="form-control" value="" id="bk_id">
                        <div class="col-md-12">
                            <label for="input15" class="form-label">Title</label>
                            <div class="position-relative input-icon">
                                <input type="text" class="form-control" id="bk_title"
                                    placeholder="Enter your position">
                                <span class="position-absolute top-50 translate-middle-y"><i
                                        class='bx bxl-ok-ru'></i></span>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <label for="input15" class="form-label">Description</label>
                            <div class="position-relative input-icon">
                                <input type="text" class="form-control" id="bk_desc"
                                    placeholder="Enter your position">
                                <span class="position-absolute top-50 translate-middle-y"><i
                                        class='bx bxl-ok-ru'></i></span>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <label for="input15" class="form-label">Url</label>
                            <div class="position-relative input-icon">
                                <input type="text" class="form-control" id="bk_url" placeholder="Enter your position">
                                <span class="position-absolute top-50 translate-middle-y"><i
                                        class='bx bxl-world'></i></span>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <label for="input15" class="form-label">Upload Image</label>
                            <div class="position-relative input-icon">
                                <input type="file" class="form-control" id="uploadImage"
                                    placeholder="Enter your position">
                                <span class="position-absolute top-50 translate-middle-y"><i class='bx bx-image'></i></span>
                            </div>
                        </div>
                        <div class="col-md-12 pt-3 pb-3">
                            <img class="mb-0 w-25" id="showImage" src="{{ url('upload/no_image.jpg') }}" alt="">
                        </div>
                        <div class="col-md-12">
                            <div class="d-md-flex d-grid align-items-center gap-3">
                                <button type="button" class="btn btn-primary px-4" id="UpdateBookingData">Submit</button>
                                <button type="button" class="btn btn-light px-4">Reset</button>
                            </div>
                        </div>
                        {{-- </form> --}}
                    </div>
                </div>
            </div>
        </div>

    </div>
        <script src="{{ asset('backend/customJS/uploadImagePreview.js') }}"></script>
    @endsection
