<footer id="footer" class="footer">
    <div class="container container-theme">
        <div class="row gy-4">
            <div class="col-lg-3 col-md-6 footer-info">
                <a href="{{ route('home.index') }}" class="logo d-flex align-items-center mb-4">
                    <img src="{{ asset('assets/web/img/footer-logo.png') }}" alt="">
                </a>
                <p>
                    Musafir is one of the leading digital eSim providers, that solves the pain of high roaming bills by giving you access to Local, Regional and Global packages, at affordable prices.
                </p>
            </div>
            <div class="col-lg-4 col-md-6 footer-links">
                <h4 class="mb-2">Stay Tuned</h4>
                <div class="social-links d-flex flex flex-wrap mt-4 gap-4">
                    <a href="https://www.facebook.com/musafir.esim" target="_blank" class="facebook">
                        <img src="{{ asset('assets/web/img/facebook.svg') }}" alt="">
                    </a>
                    <a href="https://www.tiktok.com/@musafir.esims" class="twitter" target="_blank">
                        <img src="{{ asset('assets/web/img/tik_tok.svg') }}" alt="">
                    </a>
                    <a href="https://www.linkedin.com/company/musafir-esim/?viewAsMember=true" class="linkedin" target="_blank">
                        <img src="{{ asset('assets/web/img/linkedin.svg') }}" alt="">
                    </a>
                    <a href="https://www.instagram.com/musafiresim" class="instagram" target="_blank">
                        <img src="{{ asset('assets/web/img/instagram.svg') }}" alt="">
                    </a>
                    <a href="https://x.com/MusafirESIM" class="instagram" target="_blank">
                        <img src="{{ asset('assets/web/img/x.svg') }}" alt="">
                    </a>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 footer-links">
                <h4 class="mb-4">About</h4>
                <ul class="ps-0">
                    <li><a href="{{ route('page.privacyPolicy') }}">Privacy Policy</a></li>
                    <li><a href="{{ route('page.termsConditions') }}">Terms & Conditions</a></li>
                </ul>
            </div>
            <div class="col-lg-2 col-md-6 footer-contact ">
                <h4 class="mb-4">Learn More</h4>
                <ul class="ps-0">
                    <li><a href="{{ route('home.index') }}#blog">Blog</a></li>
                    <li><a href="{{ route('page.contactUs') }}">Contact Us</a></li>
                </ul>
            </div>
        </div>
    </div>
    <div class="container container-theme mt-4 d-flex justify-content-between">

        <div class="copyright">&copy; {{ date('Y') }} Musafir.All Rights Reserved</div>
        <div class="credits"> Developed by <a href="https://kloudstack.co.uk" target="_blank">Kloudstack</a> </div>
    </div>
</footer>
