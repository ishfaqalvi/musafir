@extends('web.layout.app')

@section('title') Musafir | Plan @endsection

@section('content')
<!-- ======= Hero Section ======= -->
<section id="hero" class="hero">
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
</section>
<!-- End Hero Section -->

<!-- ======= Main ======= -->
<main id="main">
    <section id="portfolio" class="portfolio">
        <div class="container container-theme" data-aos="fade-up" data-aos-delay="300">
            <ul class="nav nav-tabs justify-content-center border-bottom-0 gap-lg-4 gap-md-3 gap-2" id="myTab" role="tablist">
                <li class="nav-item" role="presentation">
                    <button
                        class="nav-link {{ $perameters['type'] == 'local' ? 'active' : '' }}"
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
                        class="nav-link {{ $perameters['type'] == 'regional' ? 'active' : '' }}"
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
                        class="nav-link {{ $perameters['type'] == 'musafir' ? 'active' : '' }}"
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
                <div class="tab-pane {{ $perameters['type'] == 'local' ? 'active' : '' }}" id="localEsims" role="tabpanel" aria-labelledby="localEsims-tab">
                    @if($perameters['type'] == 'local')
                        <div class="d-flex justify-content-center align-items-center gap-4 mb-lg-5 mb-3">
                            <div class="countries-flag">
                                <img src="data:image/svg+xml;base64, {{ base64_encode($filterBy['flagImage']) }}" alt="" height="35px" width="45px">
                            </div>
                            <h4 class="mb-0 countries-heading">{{ $filterBy['countryName'] }}</h4>
                        </div>
                        @if(isset($plans['bundles']) && is_array($plans['bundles']))
                            <div class="row g-3 pb-3 pb-lg-5">
                                @foreach ($plans['bundles'] as $row)
                                    <div class="col-lg-4 col-md-6">
                                        <div class="main-div-deatil-card">
                                            <div class="country-card-img text-end me-4">
                                                <img src="{{ asset('assets/web/img/detail-card-img.png') }}" alt="">
                                            </div>
                                            <div class="card  details-card  position-relative">
                                                <ul class="list-group border-0 mt-0">
                                                    <li class="list-group-item">
                                                        <h4 class="mb-1 text-white gif-mob">GiffGaf Mobile</h4>
                                                        <h5 class="text-white United-kingdom">{{ $row['bundleName'] }}</h5>
                                                    </li>
                                                    <li class="list-group-item">
                                                        <div class="d-flex align-items-center justify-content-between">
                                                            <div>
                                                                <div class="d-flex gap-lg-4 gap-2 align-items-center img-icon">
                                                                    <img src="{{ asset('assets/web/img/COVERAGE.svg') }}" alt="">
                                                                    <p class="label-field">COVERAGE</p>
                                                                </div>
                                                            </div>
                                                            <div><p class="data-field">{{ $row['countryNavigation']['countryName'] }}</p></div>
                                                        </div>
                                                    </li>
                                                    <li class="list-group-item">
                                                        <div class="d-flex align-items-center justify-content-between">
                                                            <div>
                                                                <div class="d-flex gap-lg-4 gap-2 align-items-center img-icon">
                                                                    <img src="{{ asset('assets/web/img/DATA.svg') }}" alt="">
                                                                    <p class="label-field">DATA</p>
                                                                </div>
                                                            </div>
                                                            <div>
                                                                <p class="data-field">{{ $row['bundleData'] }}</p>
                                                            </div>
                                                        </div>
                                                    </li>
                                                    <li class="list-group-item">
                                                        <div class="d-flex align-items-center justify-content-between">
                                                            <div>
                                                                <div class="d-flex gap-lg-4 gap-2 align-items-center img-icon">
                                                                    <img src="{{ asset('assets/web/img/VALIDITY.svg') }}" alt="">
                                                                    <p class="label-field">VALIDITY</p>
                                                                </div>
                                                            </div>
                                                            <div>
                                                                <p class="data-field">{{ $row['period'].' '.$row['periodType'] }}</p>
                                                            </div>
                                                        </div>
                                                    </li>
                                                    <li class="list-group-item ">
                                                        <div class="d-flex justify-content-between">
                                                            <div>
                                                                <div class="d-flex gap-lg-4 gap-2 align-items-center img-icon">
                                                                    <img src="{{ asset('assets/web/img/price.png') }}" alt="">
                                                                    <p class="label-field">PRICE</p>
                                                                </div>
                                                            </div>
                                                            <div>
                                                                <p class="data-field">{{ $row['currency'].' '.$row['price'] }}</p>
                                                            </div>
                                                        </div>
                                                    </li>
                                                    <li class="list-group-item align-items-center border-bottom-0 ">
                                                        <a href="#" class="text-white">
                                                            <div class="w-100 border py-2 fw-bold rounded text-white text-center" >
                                                                BUY NOW
                                                            </div>
                                                        </a>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        @else
                            <div class="row mb-md-5">
                                <div class="col-sm-12 text-center">
                                    <h4 class="mb-lg-3 mb-2">
                                        Opps! No packages available for {{ $filterBy['countryName'] }}
                                    </h4>
                                </div>
                            </div>
                        @endif
                    @else
                        <h4 class="mb-lg-5 mb-3">Popular Countries</h4>
                        <div class="row g-lg-5 g-3 pb-lg-5 pb-3">
                            @foreach ($countries as $row)
                            <div class="col-lg-4 col-md-6">
                                <a href="">
                                    <div class="card border-0">
                                        <div class="card-body d-flex justify-content-between p-4 align-items-center">
                                            <div>
                                                <div class="d-flex gap-3 align-items-center">
                                                    <img src="data:image/svg+xml;base64, {{ base64_encode($row['flagImage']) }}" alt="" height="35px" width="45px">
                                                    <h5>{{ $row['countryName'] }}</h5>
                                                </div>
                                            </div>
                                            <div>
                                                <img src="{{ asset('assets/web/img/right-Icon.png') }}" alt="">
                                            </div>
                                        </div>
                                    </div>
                                </a>
                            </div>
                            @endforeach
                        </div>
                        <div class="row pb-5 justify-content-center">
                            <div class="col-lg-6 col-md-8">
                                <div class="card border-0">
                                    <div class="card-body text-center">
                                        <a href="#">
                                            <p class="mb-0">Show All Countries</p>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endif
                </div>
                <div class="tab-pane {{ $perameters['type'] == 'regional' ? 'active' : '' }}" id="regionalEsims" role="tabpanel" aria-labelledby="regionalEsims-tab">
                    @if($perameters['type'] == 'regional')
                        <div class="d-flex justify-content-center align-items-center gap-4 mb-lg-5 mb-3">
                            <div class="countries-flag">
                                <img src="{{ asset('assets/web/img/maps-icon.svg') }}" alt="">
                            </div>
                            <h4 class="mb-0 countries-heading">{{ $filterBy['region'] }}</h4>
                        </div>
                        @if(isset($plans['bundles']) && is_array($plans['bundles']))
                            <div class="row g-3 pb-3 pb-lg-5">
                                @foreach ($plans['bundles'] as $row)
                                    <div class="col-lg-4 col-md-6">
                                        <div class="main-div-deatil-card">
                                            <div class="country-card-img text-end me-4">
                                                <img src="{{ asset('assets/web/img/detail-card-img.png') }}" alt="">
                                            </div>
                                            <div class="card  details-card  position-relative">
                                                <ul class="list-group border-0 mt-0">
                                                    <li class="list-group-item">
                                                        <h4 class="mb-1 text-white gif-mob">GiffGaf Mobile</h4>
                                                        <h5 class="text-white United-kingdom">{{ $row['bundleName'] }}</h5>
                                                    </li>
                                                    <li class="list-group-item">
                                                        <div class="d-flex align-items-center justify-content-between">
                                                            <div>
                                                                <div class="d-flex gap-lg-4 gap-2 align-items-center img-icon">
                                                                    <img src="{{ asset('assets/web/img/COVERAGE.svg') }}" alt="">
                                                                    <p class="label-field">COVERAGE</p>
                                                                </div>
                                                            </div>
                                                            <div><p class="data-field">{{ $row['countryNavigation']['countryName'] }}</p></div>
                                                        </div>
                                                    </li>
                                                    <li class="list-group-item">
                                                        <div class="d-flex align-items-center justify-content-between">
                                                            <div>
                                                                <div class="d-flex gap-lg-4 gap-2 align-items-center img-icon">
                                                                    <img src="{{ asset('assets/web/img/DATA.svg') }}" alt="">
                                                                    <p class="label-field">DATA</p>
                                                                </div>
                                                            </div>
                                                            <div>
                                                                <p class="data-field">{{ $row['bundleData'] }}</p>
                                                            </div>
                                                        </div>
                                                    </li>
                                                    <li class="list-group-item">
                                                        <div class="d-flex align-items-center justify-content-between">
                                                            <div>
                                                                <div class="d-flex gap-lg-4 gap-2 align-items-center img-icon">
                                                                    <img src="{{ asset('assets/web/img/VALIDITY.svg') }}" alt="">
                                                                    <p class="label-field">VALIDITY</p>
                                                                </div>
                                                            </div>
                                                            <div>
                                                                <p class="data-field">{{ $row['period'].' '.$row['periodType'] }}</p>
                                                            </div>
                                                        </div>
                                                    </li>
                                                    <li class="list-group-item ">
                                                        <div class="d-flex justify-content-between">
                                                            <div>
                                                                <div class="d-flex gap-lg-4 gap-2 align-items-center img-icon">
                                                                    <img src="{{ asset('assets/web/img/price.png') }}" alt="">
                                                                    <p class="label-field">PRICE</p>
                                                                </div>
                                                            </div>
                                                            <div>
                                                                <p class="data-field">{{ $row['currency'].' '.$row['price'] }}</p>
                                                            </div>
                                                        </div>
                                                    </li>
                                                    <li class="list-group-item align-items-center border-bottom-0 ">
                                                        <a href="#" class="text-white">
                                                            <div class="w-100 border py-2 fw-bold rounded text-white text-center" >
                                                                BUY NOW
                                                            </div>
                                                        </a>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        @else
                            <div class="row mb-md-5">
                                <div class="col-sm-12 text-center">
                                    <h4 class="mb-lg-3 mb-2">
                                        Opps! No packages available for {{ $filterBy['region'] }}
                                    </h4>
                                </div>
                            </div>
                        @endif
                    @else
                        <h4 class="mb-lg-5 mb-3">REGIONS</h4>
                        <div class="row g-lg-5 g-3 pb-5">
                            @foreach ($regions as $row)
                            <div class="col-lg-6 col-md-6">
                                <a href="">
                                    <div class="card border-0">
                                        <div class="card-body d-flex justify-content-between p-4 align-items-center">
                                            <div>
                                                <div class="d-flex gap-3 align-items-center">
                                                    <img src="{{ asset('assets/web/img/maps-icon.svg') }}" alt="">
                                                    <h5>{{ $row['region'] }}</h5>
                                                </div>
                                            </div>
                                            <div>
                                                <img src="{{ asset('assets/web/img/right-Icon.png') }}" alt="">
                                            </div>
                                        </div>
                                    </div>
                                </a>
                            </div>
                            @endforeach
                        </div>
                    @endif
                </div>
                <div class="tab-pane {{ $perameters['type'] == 'musafir' ? 'active' : '' }}" id="musafirPlans" role="tabpanel" aria-labelledby="musafirPlans-tab">
                    @if($perameters['type'] == 'musafir')
                        <div class="d-flex justify-content-center align-items-center gap-4 mb-lg-5 mb-3">
                            <div class="countries-flag">
                                <img src="data:image/svg+xml;base64, {{ base64_encode($filterBy['flagImage']) }}" alt="" height="45px" width="45px">
                            </div>
                            <h4 class="mb-0 countries-heading">{{ $filterBy['countryName'] }}</h4>
                        </div>
                        @if(isset($plans['bundles']) && is_array($plans['bundles']))
                            <div class="row g-3 pb-3 pb-lg-5">
                                @foreach ($plans['bundles'] as $row)
                                    <div class="col-lg-4 col-md-6">
                                        <div class="main-div-deatil-card">
                                            <div class="country-card-img text-end me-4">
                                                <img src="{{ asset('assets/web/img/detail-card-img.png') }}" alt="">
                                            </div>
                                            <div class="card  details-card  position-relative">
                                                <ul class="list-group border-0 mt-0">
                                                    <li class="list-group-item">
                                                        <h4 class="mb-1 text-white gif-mob">GiffGaf Mobile</h4>
                                                        <h5 class="text-white United-kingdom">{{ $row['bundleName'] }}</h5>
                                                    </li>
                                                    <li class="list-group-item">
                                                        <div class="d-flex align-items-center justify-content-between">
                                                            <div>
                                                                <div class="d-flex gap-lg-4 gap-2 align-items-center img-icon">
                                                                    <img src="{{ asset('assets/web/img/COVERAGE.svg') }}" alt="">
                                                                    <p class="label-field">COVERAGE</p>
                                                                </div>
                                                            </div>
                                                            <div><p class="data-field">{{ $row['countryNavigation']['countryName'] }}</p></div>
                                                        </div>
                                                    </li>
                                                    <li class="list-group-item">
                                                        <div class="d-flex align-items-center justify-content-between">
                                                            <div>
                                                                <div class="d-flex gap-lg-4 gap-2 align-items-center img-icon">
                                                                    <img src="{{ asset('assets/web/img/DATA.svg') }}" alt="">
                                                                    <p class="label-field">DATA</p>
                                                                </div>
                                                            </div>
                                                            <div>
                                                                <p class="data-field">{{ $row['bundleData'] }}</p>
                                                            </div>
                                                        </div>
                                                    </li>
                                                    <li class="list-group-item">
                                                        <div class="d-flex align-items-center justify-content-between">
                                                            <div>
                                                                <div class="d-flex gap-lg-4 gap-2 align-items-center img-icon">
                                                                    <img src="{{ asset('assets/web/img/VALIDITY.svg') }}" alt="">
                                                                    <p class="label-field">VALIDITY</p>
                                                                </div>
                                                            </div>
                                                            <div>
                                                                <p class="data-field">{{ $row['period'].' '.$row['periodType'] }}</p>
                                                            </div>
                                                        </div>
                                                    </li>
                                                    <li class="list-group-item ">
                                                        <div class="d-flex justify-content-between">
                                                            <div>
                                                                <div class="d-flex gap-lg-4 gap-2 align-items-center img-icon">
                                                                    <img src="{{ asset('assets/web/img/price.png') }}" alt="">
                                                                    <p class="label-field">PRICE</p>
                                                                </div>
                                                            </div>
                                                            <div>
                                                                <p class="data-field">{{ $row['currency'].' '.$row['price'] }}</p>
                                                            </div>
                                                        </div>
                                                    </li>
                                                    <li class="list-group-item align-items-center border-bottom-0 ">
                                                        <a href="#" class="text-white">
                                                            <div class="w-100 border py-2 fw-bold rounded text-white text-center" >
                                                                BUY NOW
                                                            </div>
                                                        </a>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        @else
                            <div class="row mb-md-5">
                                <div class="col-sm-12 text-center">
                                    <h4 class="mb-lg-3 mb-2">
                                        Opps! No packages available for {{ $filterBy['countryName'] }}
                                    </h4>
                                </div>
                            </div>
                        @endif
                    @else
                        <h4 class="mb-lg-5 mb-3">Countries</h4>
                        <div class="row g-lg-5 g-3 pb-lg-5 pb-3">
                            @foreach ($countries as $row)
                            <div class="col-lg-4 col-md-6">
                                <a href="">
                                    <div class="card border-0">
                                        <div class="card-body d-flex justify-content-between p-4 align-items-center">
                                            <div>
                                                <div class="d-flex gap-3 align-items-center">
                                                    <img src="data:image/svg+xml;base64, {{ base64_encode($row['flagImage']) }}" alt="" height="35px" width="45px">
                                                    <h5>{{ $row['countryName'] }}</h5>
                                                </div>
                                            </div>
                                            <div>
                                                <img src="{{ asset('assets/web/img/right-Icon.png') }}" alt="">
                                            </div>
                                        </div>
                                    </div>
                                </a>
                            </div>
                            @endforeach
                        </div>
                        <div class="row pb-5 justify-content-center">
                            <div class="col-lg-6 col-md-8">
                                <div class="card border-0">
                                    <div class="card-body text-center">
                                        <a href="#">
                                            <p class="mb-0">Show All Countries</p>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endif
                </div>
            </div>
            <script>
                var firstTabEl = document.querySelector('#myTab li:last-child a')
                var firstTab = new bootstrap.Tab(firstTabEl)
                firstTab.show()
            </script>
        </div>
    </section>
    <section class="musafir-works">
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
    <section class="why-musafir">
        <div class="container container-theme">
            <div class="row pb-lg-5 pb-md-5 pb-4 align-items-center" data-aos="fade-up" data-aos-delay="300">
                <div class="col-12 text-center">
                    <h3>Why Musafir</h3>
                </div>
            </div>
            <div class="row align-items-center" data-aos="fade-up" data-aos-delay="400">
                <div class="col-lg-7 col-md-6">
                    <h2>The Problem</h2>
                    <p>
                        The platform's goal is to eradicate the problem of expensive roaming charges by offering budget-friendly eSim options. Users can select from a variety of eSim tailored to their travel destinations, including local, regional, and global options. A incidunt veniam quo saepe mollitia nam nesciunt omnis non autem praesentium.
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
                    <h2>Affordable & Transparent</h2>
                    <p>Lorem ipsum dolor sit amet. Sed velit perferendis et voluptatem dolores eos porro dolor. Quo assumenda ducimus et nisi tempore sit harum tempora est delectus reiciendis aut saepe pariatur est nulla quia. A incidunt veniam quo saepe mollitia nam nesciunt omnis non autem praesentium id laborum maxime vel vero voluptatem.</p>
                </div>
            </div>
        </div>
    </section>
    <section class="why-musafir">
        <div class="container container-theme pt-5">
            <div class="row align-items-center" data-aos="fade-up" data-aos-delay="300">
                <div class="col-lg-7 col-md-6">
                    <h2>The Problem</h2>
                    <p>The platform's goal is to eradicate the problem of expensive roaming charges by offering budget-friendly eSim options. Users can select from a variety of eSim tailored to their travel destinations, including local, regional, and global options. A incidunt veniam quo saepe mollitia nam nesciunt omnis non autem praesentium.</p>
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
                    <h2>Affordable & Transparent</h2>
                    <p>Lorem ipsum dolor sit amet. Sed velit perferendis et voluptatem dolores eos porro dolor. Quo assumenda ducimus et nisi tempore sit harum tempora est delectus reiciendis aut saepe pariatur est nulla quia. A incidunt veniam quo saepe mollitia nam nesciunt omnis non autem praesentium id laborum maxime vel vero voluptatem.</p>
                </div>
            </div>
        </div>
    </section>
    <section class="why-musafir">
        <div class="container container-theme pt-5">
            <div class="row align-items-center" data-aos="fade-up" data-aos-delay="300">
                <div class="col-lg-7 col-md-6">
                    <h2>The Problem</h2>
                    <p>The platform's goal is to eradicate the problem of expensive roaming charges by offering budget-friendly eSim options. Users can select from a variety of eSim tailored to their travel destinations, including local, regional, and global options. A incidunt veniam quo saepe mollitia nam nesciunt omnis non autem praesentium.</p>
                </div>
                <div class="col-lg-5 col-md-6">
                    <div>
                        <img src="{{ asset('assets/web/img/musafir-1.png') }}" alt="">
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="download-apps pb-4">
        <div class="container container-theme bg-download">
            <div class="row align-items-center g-3" data-aos="zoom-in" data-aos-delay="300">
                <div class="col-lg-6 col-md-6">
                    <h2>Download it now</h2>
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
