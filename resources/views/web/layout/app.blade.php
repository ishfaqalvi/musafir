<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
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
    <link href="{{ asset('assets/web/vendor/bootstrap-icons/bootstrap-icons.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/web/vendor/aos/aos.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/web/vendor/glightbox/css/glightbox.min.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/web/vendor/swiper/swiper-bundle.min.css') }}" rel="stylesheet">

    <!-- Template Main CSS File -->
    <link href="{{ asset('assets/web/css/home.css') }}" rel="stylesheet">
</head>

<body>
    <!-- ======= Header ======= -->
    <header id="header" class="header d-flex align-items-center">
        <div class="container container-theme d-flex align-items-center justify-content-between">
            <a href="index.html" class="logo d-flex align-items-center">
                <img src="{{ asset('assets/web/img/logo.png') }}" alt="">
                <!-- <h1>Impact<span>.</span></h1> -->
            </a>
            <nav id="navbar" class="navbar">
                <ul>
                    <li><a href="#hero">Home</a></li>
                    <li><a href="#about">About Us</a></li>
                    <li><a href="#services">Plans</a></li>
                    <li><img class="menu-divider" src="{{ asset('assets/web/img/menu-divider.svg') }}" alt="">
                    </li>
                    <li class="dropdown">
                        <a href="#">
                            <img class="me-2" src="{{ asset('assets/web/img/user-icon.svg') }}" alt="">
                            <span>Alex Smith</span><i class="bi bi-chevron-down dropdown-indicator"></i>
                        </a>
                        <ul>
                            <li><a href="#">Account Information</a></li>
                            <li><a href="#">Saved Cards</a></li>
                            <li><a href="#">Existing Packages</a></li>
                            <li><a href="#">Used Cards</a></li>
                            <li><a href="#">Order Cards</a></li>
                            <li class="d-flex justify-content-between align-items-center">
                                <a href="#">Logout</a>
                                <img src="assets/img/logout.png" alt="">
                            </li>
                        </ul>
                    </li>
                    <!-- <li ><a href="login.html"> <img class="me-2" src="assets/img/user-icon.svg" alt=""> <span>Login / Signup</span></a></li> -->
                </ul>
            </nav>
            <i class="mobile-nav-toggle mobile-nav-show bi bi-list"></i>
            <i class="mobile-nav-toggle mobile-nav-hide d-none bi bi-x"></i>
        </div>
    </header>
    <!-- End Header -->

    @yield('content')

    <!-- ======= Footer ======= -->
    <footer id="footer" class="footer">
        <div class="container container-theme">
            <div class="row gy-4">
                <div class="col-lg-3 col-md-6 footer-info">
                    <a href="index.html" class="logo d-flex align-items-center mb-4">
                        <img src="{{ asset('assets/web/img/footer-logo.png') }}" alt="">
                    </a>
                    <p>
                        Musafir is one of the leading digital eSim, Solution that solve the pain of high roaming bills
                        by giving you
                        access to globally at affordable prices.
                    </p>
                </div>
                <div class="col-lg-4 col-md-6 footer-links">
                    <h4 class="mb-2">Stay Tuned</h4>
                    <div class="social-links d-flex flex flex-wrap mt-4 gap-4">
                        <a href="#" class="facebook"><img src="{{ asset('assets/web/img/facebook.svg') }}" alt=""></a>
                        <a href="#" class="twitter"><img src="{{ asset('assets/web/img/twitter.svg') }}" alt=""></a>
                        <a href="#" class="linkedin"><img src="{{ asset('assets/web/img/youtube.svg') }}" alt=""></a>
                        <a href="#" class="instagram"><img src="{{ asset('assets/web/img/instagram.svg') }}" alt=""></a>
                        <a href="#" class="linkedin"><img src="{{ asset('assets/web/img/tik_tok.svg') }}" alt=""></a>
                        <a href="#" class="linkedin"><img src="{{ asset('assets/web/img/linkedin.svg') }}" alt=""></a>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 footer-links">
                    <h4 class="mb-4">About</h4>
                    <ul class="ps-0">
                        <li><a href="#">Privacy Policy</a></li>
                        <li><a href="#">Terms & Conditions</a></li>
                    </ul>
                </div>
                <div class="col-lg-2 col-md-6 footer-contact ">
                    <h4 class="mb-4">Learn More</h4>
                    <ul class="ps-0">
                        <li><a href="#">Shop Data Plan</a></li>
                        <li><a href="#">Blog</a></li>
                        <li><a href="#">Patner With Us</a></li>
                        <li><a href="#">Contact Us</a></li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="container mt-4">
            <div class="copyright">
                &copy; Copyright <strong><span>Musafir©2024.</span></strong>. All Rights Reserved
            </div>
            <div class="credits">
                <!-- All the links in the footer should remain intact. -->
                <!-- You can delete the links only if you purchased the pro version. -->
                <!-- Licensing information: https://bootstrapmade.com/license/ -->
                <!-- Purchase the pro version with working PHP/AJAX contact form: https://bootstrapmade.com/impact-bootstrap-business-website-template/ -->
                <!-- Designed by <a href="https://bootstrapmade.com/">BootstrapMade</a> -->
            </div>
        </div>
    </footer>
    <!-- End Footer -->

    <a href="#" class="scroll-top d-flex align-items-center justify-content-center">
        <i class="bi bi-arrow-up-short"></i>
    </a>

    <div id="preloader"></div>

    <!-- Vendor JS Files -->
    <script src="{{ asset('assets/web/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('assets/web/vendor/aos/aos.js') }}"></script>
    <script src="{{ asset('assets/web/vendor/glightbox/js/glightbox.min.js') }}"></script>
    <script src="{{ asset('assets/web/vendor/swiper/swiper-bundle.min.js') }}"></script>
    <script src="{{ asset('assets/web/vendor/purecounter/purecounter_vanilla.js') }}"></script>

    <!-- Template Main JS File -->
    <script src="{{ asset('assets/web/js/main.js') }}"></script>
</body>
</html>
