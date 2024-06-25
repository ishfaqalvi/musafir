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
                        About Musafir
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
                        About Airalo
                    </h2>
                    <p>
                        The platform's goal is to eradicate the problem of expensive roaming charges by offering
                        budget-friendly eSim options. Users can select from a variety of eSim tailored to their travel
                        destinations, including local, regional, and global options. A incidunt veniam quo saepe
                        mollitia nam nesciunt omnis non autem praesentium.
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
                    <h2>
                        The eSim Solution
                    </h2>
                    <p>
                        Lorem ipsum dolor sit amet. Sed velit perferendis et voluptatem dolores eos porro dolor. Quo
                        assumenda ducimus et nisi tempore sit harum tempora est delectus reiciendis aut saepe pariatur
                        est nulla quia. A incidunt veniam quo saepe mollitia nam nesciunt omnis non autem praesentium id
                        laborum maxime vel vero voluptatem.
                    </p>
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
                        The platform's goal is to eradicate the problem of expensive roaming charges by offering
                        budget-friendly eSim options. Users can select from a variety of eSim tailored to their travel
                        destinations, including local, regional, and global options. A incidunt veniam quo saepe
                        mollitia nam nesciunt omnis non autem praesentium.
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
                    <h2>Impact</h2>
                    <p>
                        Lorem ipsum dolor sit amet. Sed velit perferendis et voluptatem dolores eos porro dolor. Quo
                        assumenda ducimus et nisi tempore sit harum tempora est delectus reiciendis aut saepe pariatur
                        est nulla quia. A incidunt veniam quo saepe mollitia nam nesciunt omnis non autem praesentium id
                        laborum maxime vel vero voluptatem.
                    </p>
                </div>
            </div>
        </div>
    </section>
    <section class="why-musafir why-musafir-about pb-5">
        <div class="container container-theme">
            <div class="row align-items-start" data-aos="fade-up" data-aos-delay="300">
                <div class="col-lg-7 col-md-6">
                    <h2>Our Team</h2>
                    <p>
                        The platform's goal is to eradicate the problem of expensive roaming charges by offering
                        budget-friendly eSim options. Users can select from a variety of eSim tailored to their travel
                        destinations, including local, regional, and global options. A incidunt veniam quo saepe
                        mollitia nam nesciunt omnis non autem praesentium.
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
                    <h2>
                        Download it now
                    </h2>
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
