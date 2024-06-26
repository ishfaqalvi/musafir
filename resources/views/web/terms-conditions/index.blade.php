@extends('web.layout.app')

@section('title')
    Musafir | Terms & Conditions
@endsection

@section('header')
    @include('web.layout.header')
@endsection

@section('footer')
    @include('web.layout.footer')
@endsection

@section('content')
    <section id="hero" class="hero check-hero mb-5">
        <div class="container container-theme position-relative hero-container check-container d-flex">
            <div class="row gy-5 w-100" data-aos="fade-in">
                <div class="col-12 order-2 order-lg-1 d-flex  justify-content-center align-items-end">
                    <div>
                        <h4 class="mb-0">
                            More Info
                        </h4>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <main id="main">
        <section class=" Privacy-Policy">
            <div class="container">
                <div class="row g-3 pb-lg-5 mb-lg-5 mb-5">
                    <div class="col-lg-12">
                        <div class="Privacy-Policy-inner">
                            <h2>Terms & Condition</h2>
                            {{-- <h3>General terms and condition</h3> --}}
                            <div class="mb-lg-5">
                                <p>Last Updated: 25 June 2024</p>
                            </div>
                            <div class="mb-lg-5">
                                <h3>1. VALIDITY OF GENERAL TERMS AND CONDITIONS</h3>
                                <p>
                                    The following Terms and Conditions shall apply to all services rendered by MUSAFIR PTE. LTD., hereafter referred to as Musafir, in connection with prepaid eSim reselling. The following Terms and Conditions are provided on the website https://www.musafir.com. Musafir may accept variant clauses only in the case of an explicit written agreement. This section defines various categories of individuals and entities who interact with Musafir's services, platforms, and applications. Understanding these roles is crucial for interpreting the rights, obligations, and conditions described in these Terms and Conditions (T&C).
                                </p>
                            </div>
                            <div class="mb-lg-5">
                                <h3>1. VALIDITY OF GENERAL TERMS AND CONDITIONS</h3>
                                <p>
                                    The following Terms and Conditions shall apply to all services rendered by MUSAFIR PTE. LTD., hereafter referred to as Musafir, in connection with prepaid eSim reselling. The following Terms and Conditions are provided on the website https://www.musafir.com. Musafir may accept variant clauses only in the case of an explicit written agreement. This section defines various categories of individuals and entities who interact with Musafir's services, platforms, and applications. Understanding these roles is crucial for interpreting the rights, obligations, and conditions described in these Terms and Conditions (T&C).
                                </p>
                            </div>

                            <div class="mb-lg-5 mb-4">
                                <a href="mailto:support@musafaresim.com">Email: support@musafaresim.com</a>
                            </div>
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
