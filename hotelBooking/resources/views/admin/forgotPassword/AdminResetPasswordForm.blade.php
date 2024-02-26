<!doctype html>
<html lang="en">

<head>
	<!-- Required meta tags -->
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<!--favicon-->
	<link rel="icon" href="{{ asset('backend/') }}/assets/images/favicon-32x32.png" type="image/png" />
	<!--plugins-->
	<link href="{{ asset('backend/') }}/assets/plugins/simplebar/css/simplebar.css" rel="stylesheet" />
	<link href="{{ asset('backend/') }}/assets/plugins/perfect-scrollbar/css/perfect-scrollbar.css" rel="stylesheet" />
	<link href="{{ asset('backend/') }}/assets/plugins/metismenu/css/metisMenu.min.css" rel="stylesheet" />
	<!-- loader-->
	<link href="{{ asset('backend/') }}/assets/css/pace.min.css" rel="stylesheet" />
	<script src="{{ asset('backend/') }}/assets/js/pace.min.js"></script>
	<!-- Bootstrap CSS -->
	<link href="{{ asset('backend/') }}/assets/css/bootstrap.min.css" rel="stylesheet">
	<link href="{{ asset('backend/') }}/assets/css/bootstrap-extended.css" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500&display=swap" rel="stylesheet">
	<link href="{{ asset('backend/') }}/assets/css/app.css" rel="stylesheet">
	<link href="{{ asset('backend/') }}/assets/css/icons.css" rel="stylesheet">
	<title>Rocker - Bootstrap 5 Admin Dashboard Template</title>
</head>

<body class="">
	<!--wrapper-->
	<div class="wrapper">
		<div class="section-authentication-cover">
			<div class="">
				<div class="row g-0">
					<div class="col-12 col-xl-7 col-xxl-8 auth-cover-left align-items-center justify-content-center d-none d-xl-flex">
                        <div class="card shadow-none bg-transparent shadow-none rounded-0 mb-0">
							<div class="card-body">
                                 <img src="{{ asset('backend/') }}/assets/images/login-images/reset-password-cover.svg" class="img-fluid" width="600" alt=""/>
							</div>
						</div>
					</div>
					<div class="col-12 col-xl-5 col-xxl-4 auth-cover-right align-items-center justify-content-center">
						<div class="card rounded-0 m-3 shadow-none bg-transparent mb-0">
							<div class="card-body p-sm-5">
                                <form method="POST" action="{{ route('admin.reset-password-store') }}">
                                    @csrf
                                    <input type="hidden" name="token" value="{{ $token }}">

                                    @if ($errors->any())
                                    <div class="alert alert-danger" role="alert">
                                        @foreach ($errors->all() as $error)
                                            {{ $error }}
                                        @endforeach
                                      </div>
                                @endif


								<div class="">
									<div class="mb-4 text-center">
										<img src="{{ asset('backend/') }}/assets/images/logo-icon.png" width="60" alt="" />
									</div>
									<div class="text-start mb-4">
										<h5 class="">Genrate New Password</h5>
										<p class="mb-0">We received your reset password request. Please enter your new password!</p>
									</div>
									<div class="mb-3 mt-4">
										<label for="password" class="form-label">New Password</label>
										<input type="password" id="password" name="password" class="form-control" placeholder="Enter new password" />
									</div>
									<div class="mb-4">
										<label for="password_confirmation" class="form-label">Confirm Password</label>
										<input type="password" id="password_confirmation" name="password_confirmation" class="form-control" placeholder="Confirm password" />
									</div>
									<div class="d-grid gap-2">
										<button type="submit" class="btn btn-primary">Reset Password</button> <a href="{{ route('admin.login') }}" class="btn btn-light"><i class='bx bx-arrow-back mr-1'></i>Back to Login</a>
									</div>
								</div>
                                </form>
							</div>
						</div>
					</div>

				</div>
				<!--end row-->
			</div>
		</div>
	</div>
	<!--end wrapper-->
	<!-- Bootstrap JS -->
	<script src="{{ asset('backend/') }}/assets/js/bootstrap.bundle.min.js"></script>
	<!--plugins-->
	<script src="{{ asset('backend/') }}/assets/js/jquery.min.js"></script>
	<script src="{{ asset('backend/') }}/assets/plugins/simplebar/js/simplebar.min.js"></script>
	<script src="{{ asset('backend/') }}/assets/plugins/metismenu/js/metisMenu.min.js"></script>
	<script src="{{ asset('backend/') }}/assets/plugins/perfect-scrollbar/js/perfect-scrollbar.js"></script>
	<!--Password show & hide js -->
	<script>
		$(document).ready(function () {
			$("#show_hide_password a").on('click', function (event) {
				event.preventDefault();
				if ($('#show_hide_password input').attr("type") == "text") {
					$('#show_hide_password input').attr('type', 'password');
					$('#show_hide_password i').addClass("bx-hide");
					$('#show_hide_password i').removeClass("bx-show");
				} else if ($('#show_hide_password input').attr("type") == "password") {
					$('#show_hide_password input').attr('type', 'text');
					$('#show_hide_password i').removeClass("bx-hide");
					$('#show_hide_password i').addClass("bx-show");
				}
			});
		});
	</script>
	<!--app JS-->
	<script src="{{ asset('backend/') }}/assets/js/app.js"></script>
</body>

</html>
