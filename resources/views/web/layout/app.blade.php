<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('title')</title>
    <meta content="" name="description">
    <meta content="" name="keywords">

    <!-- Favicons -->
    <link href="{{ asset('assets/web/img/favicon.png') }}" rel="icon">
    <link href="{{ asset('assets/web/img/apple-touch-icon.png') }}" rel="apple-touch-icon">

    <!-- Google Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,600;1,700&family=Montserrat:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&family=Raleway:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&display=swap"
        rel="stylesheet">

        <!-- Vendor CSS Files -->
    <link href="{{ asset('assets/web/vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">
    <link href="{{ asset('assets/web/vendor/bootstrap-icons/bootstrap-icons.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/web/vendor/aos/aos.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/web/vendor/glightbox/css/glightbox.min.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/web/vendor/swiper/swiper-bundle.min.css') }}" rel="stylesheet">

    <!-- Template Main CSS File -->
    <link href="{{ asset('assets/web/css/styles.css?v=1.0.3') }}" rel="stylesheet">
</head>

<body class="
    {{ str_contains(url()->full(), '/login-register') ? 'login-body' : ''}}
    {{ str_contains(url()->full(), '/otp') ? 'login-body' : ''}}
    {{ str_contains(url()->full(), '/forgot-password') ? 'login-body' : ''}}
    {{ str_contains(url()->full(), '/reset-password') ? 'login-body' : ''}}
    ">
    <!-- ======= Header ======= -->
    @yield('header')
    <!-- End Header -->

    @yield('content')

    <!-- ======= Footer ======= -->
    @yield('footer')
    <!-- End Footer -->

    <a href="#" class="scroll-top d-flex align-items-center justify-content-center">
        <i class="bi bi-arrow-up-short"></i>
    </a>

    {{-- <div id="preloader"></div> --}}
    <div id="loader">
        <img src="{{ asset('assets/web/img/spinner.gif') }}" alt="Loading...">
    </div>

    <!-- Vendor JS Files -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.3/jquery.validate.min.js"></script>
    <script src="{{ asset('assets/web/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('assets/web/vendor/aos/aos.js') }}"></script>
    <script src="{{ asset('assets/web/vendor/glightbox/js/glightbox.min.js') }}"></script>
    <script src="{{ asset('assets/web/vendor/swiper/swiper-bundle.min.js') }}"></script>
    <script src="{{ asset('assets/web/vendor/purecounter/purecounter_vanilla.js') }}"></script>
    <!-- Template Main JS File -->
    <script src="{{ asset('assets/web/js/main.js') }}"></script>
    @yield('script')
</body>
</html>
