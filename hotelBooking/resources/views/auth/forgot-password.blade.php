@extends("frontend.mainMaster")
@section('main')
        <!-- Inner Banner -->
        <div class="inner-banner inner-bg10">
            <div class="container">
                <div class="inner-title">
                    <ul>
                        <li>
                            <a href="{{ url("/") }}">Home</a>
                        </li>
                        <li><i class='bx bx-chevron-right'></i></li>
                        <li>Forgot password</li>
                    </ul>
                    <h3>Forgot password</h3>
                </div>
            </div>
        </div>
        <!-- Inner Banner End -->

        <!-- Sign Up Area -->
        <div class="sign-up-area pt-100 pb-70">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="user-all-form">
                            <div class="contact-form">
                                <div class="section-title text-center">
                                    <h6 class="sp-color">Forgot your password?</span>
                                    <p>Don't worry! type your e-mail address</p>
                                </div>
                                <form method="POST" action="{{ route('password.email') }}">
                                    @csrf
                                    <div class="row">
                                        <div class="col-lg-12">
                                            <div class="form-group">
                                                <input type="email" name="email" id="email" class="form-control @error('email') is-invalid @enderror" required data-error="Please enter email" placeholder="Email" required autofocus>
                                                @error('email')
                                                    <span class="text-danger fs-6 fw-normal">{{ $message; }}</span>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-lg-12 col-md-12 text-center">
                                            <button type="submit" class="default-btn btn-bg-three border-radius-5">
                                                Email Password Reset Link
                                            </button>
                                        </div>

                                        <div class="col-12">
                                            <p class="account-desc">
                                                Already have an account?
                                                <a href="{{ Route('login') }}">Sign In</a>
                                            </p>
                                        </div>
                                        <div class="col-12">
                                            <p class="account-desc">
                                                <p class="text-success text-center">{{ session('status') }}</p>
                                            </p>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Sign Up Area End -->
@endsection
