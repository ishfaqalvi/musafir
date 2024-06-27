@extends('web.layout.app')

@section('title') Musafir | Home @endsection

@section('header') @include('web.layout.header') @endsection

@section('footer') @include('web.layout.footer') @endsection

@section('content')
<!-- ======= Hero Section ======= -->
<section id="hero" class="hero">
    <div class="container container-theme position-relative hero-container d-flex">
        <div class="row" data-aos="zoom-in" data-aos-delay="100">
            <div class="col-12 order-2 order-lg-1 d-flex flex-column justify-content-center text-center text-lg-start">
                <h3>
                    <span>Welcome To Musafir... </span>Stay connected, wherever you travel, at affordable prices 
                </h3>
                <h4>
                    Empowering connectivity
                </h4>
            <div>
            <div class="position-relative">
                <input type="text" id="search-field" placeholder="Search for names..">
                <a href="javascript:void();" id="clear-button">
                    <img class="img-cross" src="{{ asset('assets/web/img/search-clear-icon.png') }}" alt="">
                </a>
                <ul id="search-results" class="dropdown-menu"></ul>
            </div>
        </div>
    </div>
</section>
{{-- <section id="hero" class="hero">
    <div class="container container-theme position-relative hero-container d-flex">
        <div class="row gy-5" data-aos="zoom-in" data-aos-delay="100">
            <div class="col-12 order-2 order-lg-1 d-flex flex-column justify-content-center text-center text-lg-start">
                <h3>
                  <span>Welcome To Musafir... </span>Stay connected, wherever you travel, at affordable prices
                </h3>
                <h4>
                  Empowering connectivity
                </h4>
            </div>
        </div>
    </div>
</section> --}}
<!-- End Hero Section -->
<!-- ======= Main ======= -->
<main id="main">
    <section id="portfolio" class="portfolio">
        <div class="container container-theme" data-aos="fade-up" data-aos-delay="300" id="plans">
            <ul class="nav nav-tabs justify-content-center border-bottom-0 gap-lg-4 gap-md-3 gap-2" id="myTab" role="tablist">
                <li class="nav-item" role="presentation">
                    <button
                        class="nav-link active"
                        id="localEsims-tab"
                        data-bs-toggle="tab"
                        data-bs-target="#localEsims"
                        type="button"
                        role="tab"
                        aria-controls="localEsims"
                        aria-selected="true">
                        Local eSims
                    </button>
                </li>
                <li class="nav-item" role="presentation">
                    <button
                        class="nav-link"
                        id="regionalEsims-tab"
                        data-bs-toggle="tab"
                        data-bs-target="#regionalEsims"
                        type="button"
                        role="tab"
                        aria-controls="regionalEsims"
                        aria-selected="false">
                        Regional eSims
                    </button>
                </li>
                <li class="nav-item" role="presentation">
                    <button
                        class="nav-link"
                        id="musafirPlans-tab"
                        data-bs-toggle="tab"
                        data-bs-target="#musafirPlans"
                        type="button"
                        role="tab"
                        aria-controls="musafirPlans"
                        aria-selected="false">
                        Musafir Plans
                    </button>
                </li>
            </ul>
            <div class="tab-content pt-5">
                <div class="tab-pane active" id="localEsims" role="tabpanel" aria-labelledby="localEsims-tab">
                    <h4 class="mb-lg-5 mb-3">Popular Countries</h4>
                    <div class="row g-lg-5 g-3 pb-lg-5 pb-3" id="localEsimsCountriesList"></div>
                    <div class="row pb-5 justify-content-center" id="localShowAllCountriesContainer">
                        <div class="col-lg-6 col-md-8">
                            <div class="card border-0">
                                <div class="card-body text-center">
                                    <a href="javascript:;" id="localShowAllCountriesBtn"><p class="mb-0">Show All Countries</p></a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="tab-pane" id="regionalEsims" role="tabpanel" aria-labelledby="regionalEsims-tab">
                    <h4 class="mb-lg-5 mb-3">REGIONS</h4>
                    <div class="row g-lg-5 g-3 pb-5" id="regionalEsimsRegionsList">
                    </div>
                </div>
                <div class="tab-pane" id="musafirPlans" role="tabpanel" aria-labelledby="musafirPlans-tab">
                    <h4 class="mb-lg-5 mb-3">Countries</h4>
                    <div class="row g-lg-5 g-3 pb-lg-5 pb-3" id="musafirPlansCountriesList"></div>
                    <div class="row pb-5 justify-content-center" id="musafirShowAllCountriesContainer">
                        <div class="col-lg-6 col-md-8">
                            <div class="card border-0">
                                <div class="card-body text-center">
                                    <a href="javascript:;" id="musafirShowAllCountriesBtn"><p class="mb-0">Show All Countries</p></a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="musafir-works" id="about">
        <div class="container container-theme">
            <div class="row" data-aos="fade-up" data-aos-delay="200">
                <div class="col-12 text-center pb-lg-5 pb-3">
                    <h3>How Musafir Works</h3>
                </div>
            </div>
            <div class="row g-3 ">
                <div class="col-lg-3 col-md-6 text-lg-start text-center" data-aos="fade-up" data-aos-delay="100">
                    <div>
                        <img src="{{ asset('assets/web/img/mob-1.png') }}" alt="">
                        <div class="pt-4">
                            <h5>Download the App</h5>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 text-center" data-aos="fade-up" data-aos-delay="200">
                    <div>
                        <img src="{{ asset('assets/web/img/mob-2.png') }}" alt="">
                        <div class="pt-4">
                            <h5>Choose your destination and package</h5>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 text-center" data-aos="fade-up" data-aos-delay="300">
                    <div>
                        <img src="{{ asset('assets/web/img/mob-3.png') }}" alt="">
                        <div class="pt-4">
                            <h5>Purchase your Package</h5>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 text-lg-end text-center" data-aos="fade-up" data-aos-delay="400">
                    <div>
                        <img src="{{ asset('assets/web/img/mob-4.png') }}" alt="">
                        <div class="pt-4">
                            <h5>Install Your eSim</h5>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="why-musafir" id="blog">
        <div class="container container-theme">
            <div class="row pb-lg-5 pb-md-5 pb-4 align-items-center" data-aos="fade-up" data-aos-delay="300">
                <div class="col-12 text-center">
                    <h3>Why Musafir eSIM?</h3>
                </div>
            </div>
            <div class="row align-items-center" data-aos="fade-up" data-aos-delay="400">
                <div class="col-lg-7 col-md-6">
                    <h2>Stay Connected Effortlessly</h2>
                    <p>
                        Musafir eSIM makes it easy for you to stay connected wherever you travel. With a simple setup process and comprehensive coverage, our eSIM ensures you can communicate and access the internet without hassle.
                    </p>
                </div>
                <div class="col-lg-5 col-md-6">
                    <div>
                        <img src="{{ asset('assets/web/img/musafir-1.png') }}" alt="">
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="why-musafir bg-musafir">
        <div class="container container-theme">
            <div class="row align-items-center" data-aos="fade-up" data-aos-delay="300">
                <div class="col-lg-5 col-md-6">
                    <div>
                        <img src="{{ asset('assets/web/img/musafir-4.png') }}" alt="">
                    </div>
                </div>
                <div class="col-lg-7 col-md-6">
                    <h2>Instant Activation</h2>
                    <p>Get connected in minutes with our straightforward activation process. No more dealing with physical SIM cards or waiting in line at local stores.</p>
                    <p>Activate your eSIM instantly upon arrival in your destination country. Simply scan the QR code and start using your data plan right away.</p>
                </div>
            </div>
        </div>
    </section>
    <section class="why-musafir">
        <div class="container container-theme pt-5">
            <div class="row align-items-center" data-aos="fade-up" data-aos-delay="300">
                <div class="col-lg-7 col-md-6">
                    <h2>Affordable Rates</h2>
                    <p>Enjoy transparent, competitive rates without any hidden fees. Our plans are designed to offer the best eSIM app value for your money.</p>
                    <p>Avoid expensive roaming fees and stay within your budget with our affordable eSIM app for travel data plans.</p>
                </div>
                <div class="col-lg-5 col-md-6">
                    <div>
                        <img src="{{ asset('assets/web/img/musafir-3.png') }}" alt="">
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="why-musafir bg-musafir">
        <div class="container container-theme">
            <div class="row align-items-center" data-aos="fade-up" data-aos-delay="300">
                <div class="col-lg-5 col-md-6">
                    <div>
                        <img src="{{ asset('assets/web/img/musafir-2.png') }}" alt="">
                    </div>
                </div>
                <div class="col-lg-7 col-md-6">
                    <h2>Flexible Plans</h2>
                    <p>Choose from a variety of data plans that suit your travel needs, whether you're on a short trip or an extended stay.</p>
                    <p>Tailor your own plan based on your itinerary and data usage requirements.</p>
                </div>
            </div>
        </div>
    </section>
    <section class="why-musafir">
        <div class="container container-theme pt-5">
            <div class="row align-items-center" data-aos="fade-up" data-aos-delay="300">
                <div class="col-lg-7 col-md-6">
                    <h2>Secure Connections</h2>
                    <p>Enjoy encrypted and secure internet access, ensuring your personal information and browsing data are protected.</p>
                    <p>Experience consistent and dependable connectivity with our trusted network partners.</p>
                </div>
                <div class="col-lg-5 col-md-6">
                    <div>
                        <img src="{{ asset('assets/web/img/musafir-1.png') }}" alt="">
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="download-apps pb-4" id="download">
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
                    <img src="{{ asset('assets/web/img/donload-img-main.png') }}" alt="">
                </div>
            </div>
        </div>
    </section>
</main>
<!-- End #main -->
@endsection

@section('script')
<script>
    $(function () {
        const config = {
            spinnerContent: `
            <div class="text-center text-warning">
                <div class="spinner-border" style="width: 3rem; height: 3rem;" role="status">
                    <span class="visually-hidden">Loading...</span>
                </div>
            </div>
            `,
            routes: {
                countries: '{{ route('home.countries.list') }}',
                regions: '{{ route('home.regions.list') }}'
            },
            selectors: {
                localCountries: '#localEsimsCountriesList',
                musafirCountries: '#musafirPlansCountriesList',
                regionsList: '#regionalEsimsRegionsList',
                localShowAllBtn: '#localShowAllCountriesBtn',
                musafirShowAllBtn: '#musafirShowAllCountriesBtn',
                localShowAllContainer: '#localShowAllCountriesContainer',
                musafirShowAllContainer: '#musafirShowAllCountriesContainer'
            }
        };

        const $localCountries = $(config.selectors.localCountries);
        const $musafirCountries = $(config.selectors.musafirCountries);
        const $regionsList = $(config.selectors.regionsList);
        const $localShowAllContainer = $(config.selectors.localShowAllContainer);
        const $musafirShowAllContainer = $(config.selectors.musafirShowAllContainer);

        // Show spinner while loading
        $localCountries.append(config.spinnerContent);
        $musafirCountries.append(config.spinnerContent);
        $regionsList.append(config.spinnerContent);
        $localShowAllContainer.hide();
        $musafirShowAllContainer.hide();

        const showError = (xhr) => {
            const errorMessage = `Error - ${xhr.status}: ${xhr.statusText} - ${xhr.responseText}`;
            toastr.error('Something went wrong in fetching data');
            console.log(errorMessage);
        };

        // Reusable AJAX function
        const fetchData = (url, onSuccess) => {
            $.ajax({
                url: url,
                method: 'GET',
                success: onSuccess,
                error: showError
            });
        };

        // Initial data fetch
        fetchData(`${config.routes.countries}?type=local&page=first`, (data) => {
            $localCountries.html(data);
            $localShowAllContainer.show();
        });

        fetchData(config.routes.regions, (data) => {
            $regionsList.html(data);
        });

        fetchData(`${config.routes.countries}?type=musafir&page=first`, (data) => {
            $musafirCountries.html(data);
            $musafirShowAllContainer.show();
        });

        // "Show All" button click handlers
        $(config.selectors.localShowAllBtn).on('click', function () {
            $localShowAllContainer.html(config.spinnerContent);
            fetchData(`${config.routes.countries}?type=local&page=remaining`, (data) => {
                $localCountries.append(data);
                $localShowAllContainer.hide();
            });
        });

        $(config.selectors.musafirShowAllBtn).on('click', function () {
            $musafirShowAllContainer.html(config.spinnerContent);
            fetchData(`${config.routes.countries}?type=musafir&page=remaining`, (data) => {
                $musafirCountries.append(data);
                $musafirShowAllContainer.hide();
            });
        });
        $('#clear-button').on('click', function() {
            $('#search-field').val('');
            $('#search-results').hide('slow');
        });
        $('#search-field').on('keyup', function() {
            let keyword = $(this).val();
            if (keyword.length >= 1) {
                $('#search-results').show('slow');
                $('#search-results').html(config.spinnerContent);
                $.ajax({
                    url: "{{ route('home.search') }}",
                    type: "GET",
                    data: { keyword: keyword },
                    dataType: "json",
                    success: function(data) {
                        $('#search-results').html(data);
                    }
                });
            }else{
                $('#search-results').hide('slow');
            }
        });
    });
</script>
@endsection
