@extends('admin.adminDashboard')
@section('adminWrapper')
    <div class="page-content">
        <!--breadcrumb-->
        <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
            <div class="breadcrumb-title pe-3">Tables</div>
            <div class="ps-3">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb mb-0 p-0">
                        <li class="breadcrumb-item"><a href="javascript:;"><i class="bx bx-home-alt"></i></a>
                        </li>
                        <li class="breadcrumb-item active" aria-current="page">Data Table</li>
                    </ol>
                </nav>
            </div>
            <div class="ms-auto">
                <div class="btn-group">
                    <!-- Button trigger modal -->
                    <button type="button" class="btn btn-primary" data-bs-toggle="modal"
                        data-bs-target="#exampleVerticallycenteredModal ">Add Team</button>
                    <!-- Modal To Add data-->
                    <div class="modal fade" id="exampleVerticallycenteredModal" tabindex="-1" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered">
                            <div class="modal-content p-3">
                                <div class="card-body">
                                    <h5 class="mt-3 mx-4">Add Team</h5>
                                    {{-- <form class="row g-3 p-4" method="POST" enctype="multipart/form-data"> --}}
                                        {{-- @csrf --}}
                                        <div class="col-md-12">
                                            <label for="input13" class="form-label">Name</label>
                                            <div class="position-relative input-icon">
                                                <input type="text" class="form-control" id="Team_name"
                                                    placeholder="Enter your name">
                                                <span class="position-absolute top-50 translate-middle-y"><i
                                                        class='bx bx-user'></i></span>
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <label for="input15" class="form-label">Position</label>
                                            <div class="position-relative input-icon">
                                                <input type="text" class="form-control" id="Team_position"
                                                    placeholder="Enter your position">
                                                <span class="position-absolute top-50 translate-middle-y"><i
                                                        class='bx bxl-ok-ru'></i></span>
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <label for="single-select-field" class="form-label">Status</label>
                                            <select class="form-select" id="single-select-field" data-placeholder="Choose one thing">
                                                <option></option>
                                                <option value="active">Active</option>
                                                <option value="inactive">Inactive</option>
                                            </select>
                                        </div>
                                        <div class="col-md-12">
                                            <label for="input15" class="form-label">Facebook url</label>
                                            <div class="position-relative input-icon">
                                                <input type="text" class="form-control" id="fb_url"
                                                    placeholder="Enter your position">
                                                <span class="position-absolute top-50 translate-middle-y"><i
                                                        class='bx bxl-facebook'></i></span>
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <label for="input15" class="form-label">Github url</label>
                                            <div class="position-relative input-icon">
                                                <input type="text" class="form-control" id="git_url"
                                                    placeholder="Enter your position">
                                                <span class="position-absolute top-50 translate-middle-y"><i
                                                        class='bx bxl-github'></i></span>
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <label for="input15" class="form-label">Twitter url</label>
                                            <div class="position-relative input-icon">
                                                <input type="text" class="form-control" id="tw_url"
                                                    placeholder="Enter your position">
                                                <span class="position-absolute top-50 translate-middle-y"><i
                                                        class='bx bxl-twitter'></i></span>
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <label for="input15" class="form-label">Youtube url</label>
                                            <div class="position-relative input-icon">
                                                <input type="text" class="form-control" id="yt_url"
                                                    placeholder="Enter your position">
                                                <span class="position-absolute top-50 translate-middle-y"><i
                                                        class='bx bxl-youtube'></i></span>
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <label for="input15" class="form-label">Upload Image</label>
                                            <div class="position-relative input-icon">
                                                <input type="file" class="form-control" id="uploadImage"
                                                    placeholder="Enter your position">
                                                <span class="position-absolute top-50 translate-middle-y"><i
                                                        class='bx bx-image'></i></span>
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <img class="mb-0 w-25" id="showImage" src="{{ url('upload/no_image.jpg') }}"
                                                alt="">
                                        </div>
                                        <div class="col-md-12">
                                            <div class="d-md-flex d-grid align-items-center gap-3">
                                                <button type="button" class="btn btn-primary px-4" id="addTeamData">Submit</button>
                                                <button type="button" class="btn btn-light px-4">Reset</button>
                                            </div>
                                        </div>
                                    {{-- </form> --}}
                                </div>
                            </div>
                        </div>
                    </div>

                    {{-- Modal to Update Data --}}
                    <div class="modal fade" id="EditTeamDataModal" tabindex="-1" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered">
                            <div class="modal-content p-3">
                                <div class="card-body">
                                    <h5 class="mt-3 mx-4">Add Team</h5>
                                    {{-- <form class="row g-3 p-4" method="POST" enctype="multipart/form-data"> --}}
                                        {{-- @csrf --}}
                                        <div class="col-md-12">
                                            <label for="input13" class="form-label">Name</label>
                                            <div class="position-relative input-icon">
                                                <input type="text" class="form-control" id="Edit_Team_name"
                                                    placeholder="Enter your name">
                                                <span class="position-absolute top-50 translate-middle-y"><i
                                                        class='bx bx-user'></i></span>
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <label for="input15" class="form-label">Position</label>
                                            <div class="position-relative input-icon">
                                                <input type="text" class="form-control" id="Edit_Team_position"
                                                    placeholder="Enter your position">
                                                <span class="position-absolute top-50 translate-middle-y"><i
                                                        class='bx bxl-ok-ru'></i></span>
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <label for="single-select-field" class="form-label">Status</label>
                                            <select class="form-select" id="Edit_single-select-field" data-placeholder="Choose one thing">
                                                <option></option>
                                                <option value="active">Active</option>
                                                <option value="inactive">Inactive</option>
                                            </select>
                                        </div>
                                        <div class="col-md-12">
                                            <label for="input15" class="form-label">Facebook url</label>
                                            <div class="position-relative input-icon">
                                                <input type="text" class="form-control" id="Edit_fb_url"
                                                    placeholder="Enter your position">
                                                <span class="position-absolute top-50 translate-middle-y"><i
                                                        class='bx bxl-facebook'></i></span>
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <label for="input15" class="form-label">Github url</label>
                                            <div class="position-relative input-icon">
                                                <input type="text" class="form-control" id="Edit_git_url"
                                                    placeholder="Enter your position">
                                                <span class="position-absolute top-50 translate-middle-y"><i
                                                        class='bx bxl-github'></i></span>
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <label for="input15" class="form-label">Twitter url</label>
                                            <div class="position-relative input-icon">
                                                <input type="text" class="form-control" id="Edit_tw_url"
                                                    placeholder="Enter your position">
                                                <span class="position-absolute top-50 translate-middle-y"><i
                                                        class='bx bxl-twitter'></i></span>
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <label for="input15" class="form-label">Youtube url</label>
                                            <div class="position-relative input-icon">
                                                <input type="text" class="form-control" id="Edit_yt_url"
                                                    placeholder="Enter your position">
                                                <span class="position-absolute top-50 translate-middle-y"><i
                                                        class='bx bxl-youtube'></i></span>
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <label for="input15" class="form-label">Upload Image</label>
                                            <div class="position-relative input-icon">
                                                <input type="file" class="form-control" id="Edit_uploadImage"
                                                    placeholder="Enter your position">
                                                <span class="position-absolute top-50 translate-middle-y"><i
                                                        class='bx bx-image'></i></span>
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <img class="mb-0 w-25" id="showImage" src="{{ url('upload/no_image.jpg') }}"
                                                alt="">
                                        </div>
                                        <div class="col-md-12">
                                            <div class="d-md-flex d-grid align-items-center gap-3">
                                                <button type="button" class="btn btn-primary px-4" id="UpdateTeamData">Submit</button>
                                                <button type="button" class="btn btn-light px-4">Reset</button>
                                            </div>
                                        </div>
                                    {{-- </form> --}}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <h6 class="mb-0 text-uppercase">DataTable Import</h6>
        <hr />
        <div class="card">
            <div class="card-body">
                <div class="table-responsive">
                    <table id="example2" class="table table-striped table-bordered">
                        <thead class="text-center">
                            <tr>
                                <th>Id</th>
                                <th>Image</th>
                                <th>Name</th>
                                <th>Position</th>
                                <th>Facebook</th>
                                <th>Github</th>
                                <th>Twitter</th>
                                <th>Youtube</th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody class="tbodyData text-center">
                        </tbody>
                        <tfoot class="text-center">
                            <tr>
                                <th>Id</th>
                                <th>Image</th>
                                <th>Name</th>
                                <th>Position</th>
                                <th>Facebook</th>
                                <th>Github</th>
                                <th>Twitter</th>
                                <th>Youtube</th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                        </tfoot>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <!-- To Delete Data -->
    <div class="modal" tabindex="-1" id="OpenDelete">
        <div class="modal-dialog">
          <div class="modal-content" id="AddForm myForm">
            <div class="modal-header text-center d-block">
              <h5 class="modal-title">Delete Data | This is not revertable</h5>
            </div>
            <div class="modal-body">

                <div class="row mb-3">
                    <h6 class="mb-0">Are you sure to delete ?</h6>
            </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                    <button class="btn btn-danger px-4 " id="delete_data">Delete</button>
                </div>

          </div>
        </div>
      </div>

    <script src="{{ asset('backend/customJS/uploadImagePreview.js') }}"></script>
@endsection
