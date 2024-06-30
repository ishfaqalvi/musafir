@extends('web.layout.app')

@section('title')
    Musafir | About Us
@endsection

@section('header')
    @include('web.layout.header')
@endsection

@section('footer')
    @include('web.layout.footer')
@endsection

@section('content')
<section id="hero" class="hero check-hero">
    <div class="container container-theme position-relative hero-container check-container d-flex">
        <div class="row gy-5 w-100" data-aos="fade-in">
            <div class="col-12 order-2 order-lg-1 d-flex  justify-content-center align-items-end">
                <div> 
                    <h4 class="mb-0">
                        About Musafir eSIMs
                    </h4>
                </div>
            </div>
        </div>
    </div>
</section>
<main id="main">
    <section class="musafir-works-about">
        <div class="container container-theme">
            <div class="row g-3 ">
                <div class="col-lg-12 text-center pt-5 pb-4" data-aos="fade-up" data-aos-delay="200">
                    <div>
                        <img src="{{ asset('assets/web/img/about-mob.png') }}" alt="">
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="why-musafir why-musafir-about">
        <div class="container container-theme">
            <div class="row align-items-start" data-aos="fade-up" data-aos-delay="400">
                <div class="col-lg-7 col-md-6">
                    <h2>
                        Introduction
                    </h2>
                    <p>
                        Musafir is changing the way people stay connected with their mobile devices. Founded by four friends who are passionate about technology, our goal is to make mobile connectivity easy, flexible, and affordable using eSIM technology.
                    </p>
                </div>
                <div class="col-lg-5 col-md-6">
                    <div>
                        <img src="{{ asset('assets/web/img/about/about-airalo-1.png') }}" alt="">
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="why-musafir why-musafir-about">
        <div class="container container-theme">
            <div class="row align-items-start" data-aos="fade-up" data-aos-delay="300">
                <div class="col-lg-5 col-md-6">
                    <div>
                        <img src="{{ asset('assets/web/img/about/about-airalo-2.png') }}" alt="">
                    </div>
                </div>
                <div class="col-lg-7 col-md-6">
                    <h2>Our Vision</h2>
                    <p>We want to provide simple and hassle-free access to the best mobile networks around the world, allowing users to switch between carriers without needing a physical SIM card.</p>
                </div>
            </div>
        </div>
    </section>
    <section class="why-musafir why-musafir-about">
        <div class="container container-theme">
            <div class="row align-items-start" data-aos="fade-up" data-aos-delay="300">
                <div class="col-lg-7 col-md-6">
                    <h2>
                        Our Mission
                    </h2>
                    <p>
                        Musafir is committed to offering innovative solutions for travelers, remote workers, and businesses, providing them with convenient and flexible mobile connectivity options.
                    </p>
                </div>
                <div class="col-lg-5 col-md-6">
                    <div>
                        <img src="{{ asset('assets/web/img/about/about-airalo-3.png') }}" alt="">
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="why-musafir why-musafir-about">
        <div class="container container-theme">
            <div class="row align-items-start" data-aos="fade-up" data-aos-delay="300">
                <div class="col-lg-5 col-md-6">
                    <div>
                        <img src="{{ asset('assets/web/img/about/about-airal-4.png') }}" alt="">
                    </div>
                </div>
                <div class="col-lg-7 col-md-6">
                    <h2>Our Solutions</h2>
                    <p><strong>Global eSIM Plans:</strong> Stay connected no matter where you are with plans designed for travelers and digital nomads.</p>
                    <p><strong>Business Solutions:</strong> Improve your business operations with our solutions for global workforces and devices.</p>
                    <p><strong>Customizable Packages:</strong> Choose data plans that fit your needs, ensuring you always have the right amount of data.</p>
                </div>
            </div>
        </div>
    </section>
    <section class="why-musafir why-musafir-about pb-5">
        <div class="container container-theme">
            <div class="row align-items-start" data-aos="fade-up" data-aos-delay="300">
                <div class="col-lg-7 col-md-6">
                    <h2>Team</h2>
                    <p>
                        Meet the Musafir team! Our dedicated team members are located in our main hubs in United Kingdome, as well as remotely around the world. Together, we strive to make Musafir a leader in global mobile connectivity.
                    </p>
                </div>
                <div class="col-lg-5 col-md-6">
                    <div>
                        <img src="{{ asset('assets/web/img/about/OBJECTS.png') }}" alt="">
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="download-apps pb-4">
        <div class="container container-theme bg-download">
            <div class="row align-items-center g-3" data-aos="zoom-in" data-aos-delay="300">
                <div class="col-lg-6 col-md-6">
                    <h2>Ready to experience hassle-free mobile connectivity?</h2>
                    <p>Download the Musafir app today to purchase, manage, and top up your eSIMs instantly, wherever you are!</p>
                    <div class="d-flex flex-wrap gap-2">
                        <a href="">
                            <img src="{{ asset('assets/web/img/google.svg') }}" alt="">
                        </a>
                        <a href="">
                            <img src="{{ asset('assets/web/img/apple-icon.svg') }}" alt="">
                        </a>
                    </div>
                </div>
                <div class="col-lg-6 col-md-6 text-center">
                    <img src="{{ asset('assets/web/img/about/mob-about.png') }}" alt="">
                </div>
            </div>
        </div>
    </section>
</main>
@endsection

@section('script')
@endsection
