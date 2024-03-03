<!doctype html>
<html lang="zxx">
    <head>
        <!-- Required Meta Tags -->
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">

        <!-- Bootstrap CSS -->
        <link rel="stylesheet" href="{{ asset('frontend') }}/assets/css/bootstrap.min.css">
        <!-- Animate Min CSS -->
        <link rel="stylesheet" href="{{ asset('frontend') }}/assets/css/animate.min.css">
        <!-- Flaticon CSS -->
        <link rel="stylesheet" href="{{ asset('frontend') }}/assets/fonts/flaticon.css">
        <!-- Boxicons CSS -->
        <link rel="stylesheet" href="{{ asset('frontend') }}/assets/css/boxicons.min.css">
        <!-- Magnific Popup CSS -->
        <link rel="stylesheet" href="{{ asset('frontend') }}/assets/css/magnific-popup.css">
        <!-- Owl Carousel Min CSS -->
        <link rel="stylesheet" href="{{ asset('frontend') }}/assets/css/owl.carousel.min.css">
        <link rel="stylesheet" href="{{ asset('frontend') }}/assets/css/owl.theme.default.min.css">
        <!-- Nice Select Min CSS -->
        <link rel="stylesheet" href="{{ asset('frontend') }}/assets/css/nice-select.min.css">
        <!-- Meanmenu CSS -->
        <link rel="stylesheet" href="{{ asset('frontend') }}/assets/css/meanmenu.css">
        <!-- Jquery Ui CSS -->
        <link rel="stylesheet" href="{{ asset('frontend') }}/assets/css/jquery-ui.css">
        <!-- Style CSS -->
        <link rel="stylesheet" href="{{ asset('frontend') }}/assets/css/style.css">
        <!-- Responsive CSS -->
        <link rel="stylesheet" href="{{ asset('frontend') }}/assets/css/responsive.css">
        <!-- Theme Dark CSS -->
        <link rel="stylesheet" href="{{ asset('frontend') }}/assets/css/theme-dark.css">
        <!-- FlatPicker-->
        <link href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css" rel="stylesheet">
        {{-- Toaster CSS --}}
        <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.css" >
        <!-- Favicon -->
        <link rel="icon" type="image/png" href="{{ asset('frontend') }}/assets/img/favicon.png">

        <title>Atoli - Hotel & Resorts HTML Template</title>
    </head>
    <body>

        <!-- PreLoader Start -->
        <div class="preloader">
            <div class="d-table">
                <div class="d-table-cell">
                    <div class="sk-cube-area">
                        <div class="sk-cube1 sk-cube"></div>
                        <div class="sk-cube2 sk-cube"></div>
                        <div class="sk-cube4 sk-cube"></div>
                        <div class="sk-cube3 sk-cube"></div>
                    </div>
                </div>
            </div>
        </div>
        <!-- PreLoader End -->

        <!-- Top Header Start -->
        @include("frontend.body.header")
        <!-- Top Header End -->

        <!-- Start Navbar Area -->
        @include("frontend.body.navbar")
        <!-- End Navbar Area -->

        @yield('main')

        <!-- Footer Area -->
        @include("frontend.body.footer")
        <!-- Footer Area End -->


        <!-- Jquery Min JS -->
        <script src="{{ asset('frontend') }}/assets/js/jquery.min.js"></script>
        <!-- Bootstrap Bundle Min JS -->
        <script src="{{ asset('frontend') }}/assets/js/bootstrap.bundle.min.js"></script>
        <!-- Magnific Popup Min JS -->
        <script src="{{ asset('frontend') }}/assets/js/jquery.magnific-popup.min.js"></script>
        <!-- Owl Carousel Min JS -->
        <script src="{{ asset('frontend') }}/assets/js/owl.carousel.min.js"></script>
        <!-- Nice Select Min JS -->
        <script src="{{ asset('frontend') }}/assets/js/jquery.nice-select.min.js"></script>
        <!-- Wow Min JS -->
        <script src="{{ asset('frontend') }}/assets/js/wow.min.js"></script>
        <!-- Jquery Ui JS -->
        <script src="{{ asset('frontend') }}/assets/js/jquery-ui.js"></script>
        <!-- Meanmenu JS -->
        <script src="{{ asset('frontend') }}/assets/js/meanmenu.js"></script>
        <!-- Ajaxchimp Min JS -->
        <script src="{{ asset('frontend') }}/assets/js/jquery.ajaxchimp.min.js"></script>
        <!-- Form Validator Min JS -->
        <script src="{{ asset('frontend') }}/assets/js/form-validator.min.js"></script>
        <!-- Contact Form JS -->
        <script src="{{ asset('frontend') }}/assets/js/contact-form-script.js"></script>
        <!-- Custom JS -->
        <script src="{{ asset('frontend') }}/assets/js/custom.js"></script>
        <!-- Flat Picker -->
        <script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>
        <!-- File Upload Preview User -->
        <script src="{{ asset('backend/customJS/uploadImagePreview.js') }}"></script>
        {{-- Start Toaster JS --}}
        <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>


        <script>
            // Date Picker Start
        $(".datepicker").flatpickr({
            maxDate: "today",
            onChange: function(selectedDates, dateStr, instance) {
                var selectedDate = new Date(dateStr);
                var today = new Date();
                var minAllowedDate = new Date(today.getFullYear() - 18, today.getMonth(), today.getDate()); // 18 years ago from today
                if (selectedDate > minAllowedDate) {
                    instance.clear();
                    alert("Please select a date that is at least 18 years ago.");
                }
            }
        });

        $(".time-picker").flatpickr({
                enableTime: true,
                noCalendar: true,
                dateFormat: "Y-m-d H:i",
            });

        $(".date-time").flatpickr({
                enableTime: true,
                dateFormat: "Y-m-d H:i",
        });

        $(".date-format").flatpickr({
            altInput: true,
            altFormat: "F j, Y",
            dateFormat: "Y-m-d",
        });

        $(".date-range").flatpickr({
            mode: "range",
            altInput: true,
            altFormat: "F j, Y",
            dateFormat: "Y-m-d",
        });

        $(".date-inline").flatpickr({
            inline: true,
            altInput: true,
            altFormat: "F j, Y",
            dateFormat: "Y-m-d",
        });
        // Date Picker End

        // Start Toast Message
        @if(Session::has('message'))
            var type = "{{ Session::get('alert-type','info') }}"
            switch(type){
                case 'info':
                toastr.info(" {{ Session::get('message') }} ");
                break;

                case 'success':
                toastr.success(" {{ Session::get('message') }} ");
                break;

                case 'warning':
                toastr.warning(" {{ Session::get('message') }} ");
                break;

                case 'error':
                toastr.error(" {{ Session::get('message') }} ");
                break;
            }
        @endif
        // End Toast Message
        </script>

    </body>
</html>
