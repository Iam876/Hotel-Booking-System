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
                        <li>Password Reset</li>
                    </ul>
                    <h3>Password Reset</h3>
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
                                    <h6 class="sp-color">Reset your password</span>
                                </div>
                                <form method="POST" action="{{ route('password.store') }}">
                                    @csrf

                                    <!-- Password Reset Token -->
                                    <input type="hidden" name="token" value="{{ $request->route('token') }}">

                                    <div class="row">
                                        <div class="col-lg-12">
                                            <div class="form-group">
                                                <input type="email" name="email" id="email" value="{{ $email; }}" class="form-control @error('email') is-invalid @enderror" required data-error="Please enter email" placeholder="Email" required autofocus autocomplete="username">
                                                @error('email')
                                                    <span class="text-danger fs-6 fw-normal">{{ $message; }}</span>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-lg-12">
                                            <div class="form-group">
                                                <input type="password" name="password" id="password" class="form-control @error('password') is-invalid @enderror" required data-error="Please enter password" placeholder="password" required autocomplete="new-password">
                                                @error('password')
                                                    <span class="text-danger fs-6 fw-normal">{{ $message; }}</span>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-lg-12">
                                            <div class="form-group">
                                                <input type="password_confirmation" name="password_confirmation" id="password_confirmation" class="form-control @error('password_confirmation') is-invalid @enderror" required data-error="Please enter password_confirmation" placeholder="password_confirmation" required autocomplete="new-password">
                                                @error('password_confirmation')
                                                    <span class="text-danger fs-6 fw-normal">{{ $message; }}</span>
                                                @enderror
                                            </div>
                                        </div>

                                        <div class="col-lg-12 col-md-12 text-center">
                                            <button type="submit" class="default-btn btn-bg-three border-radius-5">
                                                Reset Password
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
