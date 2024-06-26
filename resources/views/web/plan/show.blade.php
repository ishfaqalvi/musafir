<div class="modal fade model-pakages" id="packageDetailModel" tabindex="-1" aria-labelledby="modelPakagesLabel" aria-hidden="true">
    <div class="modal-dialog .modal-fullscreen-xxl-down">
        <div class="modal-content">
            <div class="modal-header flex-wrap">
                <div class="w-100 text-end">
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="w-100 px-xl-5 px-lg-5">
                    <div class="row g-3">
                        <div class="col-12">
                            <h4 class="mb-2 text-white" id="bundlename"></h4>
                            <h5 class="mb-4 text-white" id="countryname"></h5>
                        </div>
                        <div class="col-lg-5">
                            <img src="{{ asset('assets/web/img/busniess-card.png') }}" class="busniess-card-img" alt="">
                        </div>
                        <div class="col-lg-7">
                            <div>
                                <ul class="list-group border-0">
                                    <li class="list-group-item pt-0">
                                        <div class="d-flex align-items-center justify-content-between flex-wrap gap-3">
                                            <div>
                                                <div class="d-flex gap-4 align-items-center">
                                                    <img src="{{ asset('assets/web/img/COVERAGE.svg') }}" alt="">
                                                    <p class="label-field">
                                                        COVERAGE
                                                    </p>
                                                </div>
                                            </div>
                                            <div class="d-flex">
                                                <p class="data-field" id="coverage">

                                                </p>
                                            </div>
                                        </div>
                                    </li>
                                    <li class="list-group-item">
                                        <div class="d-flex align-items-center justify-content-between flex-wrap gap-3">
                                            <div>
                                                <div class="d-flex gap-4 align-items-center">
                                                    <img src="{{ asset('assets/web/img/DATA.svg') }}" alt="">
                                                    <p class="label-field">
                                                        DATA
                                                    </p>
                                                </div>
                                            </div>
                                            <div>
                                                <p class="data-field" id="bundledata"></p>
                                            </div>
                                        </div>
                                    </li>
                                    <li class="list-group-item">
                                        <div class="d-flex align-items-center justify-content-between flex-wrap gap-3">
                                            <div>
                                                <div class="d-flex gap-4 align-items-center">
                                                    <img src="{{ asset('assets/web/img/VALIDITY.svg') }}" alt="">
                                                    <p class="label-field">
                                                        VALIDITY
                                                    </p>
                                                </div>
                                            </div>
                                            <div>
                                                <p class="data-field" id="validity"></p>
                                            </div>
                                        </div>
                                    </li>
                                    <li class="list-group-item border-bottom-0 pb-0 ">
                                        <div class="d-flex align-items-center justify-content-between flex-wrap gap-3">
                                            <div>
                                                <div class="d-flex gap-4 align-items-center">
                                                    <img src="{{ asset('assets/web/img/price.png') }}" alt="">
                                                    <p class="label-field">
                                                        PRICE
                                                    </p>
                                                </div>
                                            </div>
                                            <div>
                                                <p class="data-field" id="price"></p>
                                            </div>
                                        </div>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-body">
                {{-- <div class="container banner-card px-lg-5 px-0">
                    <h3 class="pb-lg-5 pt-5">
                        Available Top Packages
                    </h3>
                    <div class="Packages-slider pb-lg-5">
                        <div class="slides-3 swiper" data-aos="fade-up" data-aos-delay="100">
                            <div class="swiper-wrapper pb-5">
                                <div class="swiper-slide">
                                    <div class="card slider-card">
                                        <ul class="list-group border-0">
                                            <li class="list-group-item">
                                                <h4 class="text-white mb-0 text-center">
                                                    3 GB - 7 Days
                                                </h4>
                                            </li>
                                            <li class="list-group-item">
                                                <div class="d-flex align-items-center justify-content-between  flex-wrap gap-3">
                                                    <div>
                                                        <div class="d-flex gap-4 align-items-center">
                                                            <img src="{{ asset('assets/web/img/DATA.svg') }}" alt="">
                                                            <p class="label-field">
                                                                DATA
                                                            </p>
                                                        </div>
                                                    </div>
                                                    <div>
                                                        <p class="data-field">
                                                            3 GB
                                                        </p>
                                                    </div>
                                                </div>
                                            </li>
                                            <li class="list-group-item">
                                                <div
                                                    class="d-flex align-items-center justify-content-between flex-wrap gap-3">
                                                    <div>
                                                        <div class="d-flex gap-4 align-items-center">
                                                            <img src="{{ asset('assets/web/img/VALIDITY.svg') }}" alt="">
                                                            <p class="label-field">
                                                                VALIDITY
                                                            </p>
                                                        </div>
                                                    </div>
                                                    <div>
                                                        <p class="data-field">
                                                            07 Days
                                                        </p>
                                                    </div>
                                                </div>
                                            </li>
                                            <li class="list-group-item align-items-center border-bottom-0 ">
                                                <div class="d-flex justify-content-between flex-wrap gap-3">
                                                    <div>
                                                        <div class="d-flex gap-4 align-items-center">
                                                            <img src="{{ asset('assets/web/img/price.png') }}" alt="">
                                                            <p class="label-field">
                                                                PRICE
                                                            </p>
                                                        </div>
                                                    </div>
                                                    <div>
                                                        <p class="data-field">07 Days</p>
                                                    </div>
                                                </div>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="swiper-slide">
                                    <div class="card slider-card">
                                        <ul class="list-group border-0">
                                            <li class="list-group-item">
                                                <h4 class="text-white mb-0 text-center">
                                                    3 GB - 7 Days
                                                </h4>
                                            </li>
                                            <li class="list-group-item">
                                                <div
                                                    class="d-flex align-items-center justify-content-between  flex-wrap gap-3">
                                                    <div>
                                                        <div class="d-flex gap-4 align-items-center">
                                                            <img src="{{ asset('assets/web/img/DATA.svg') }}" alt="">
                                                            <p class="label-field">
                                                                DATA
                                                            </p>
                                                        </div>
                                                    </div>
                                                    <div>
                                                        <p class="data-field">
                                                            3 GB
                                                        </p>
                                                    </div>
                                                </div>
                                            </li>
                                            <li class="list-group-item">
                                                <div
                                                    class="d-flex align-items-center justify-content-between flex-wrap gap-3">
                                                    <div>
                                                        <div class="d-flex gap-4 align-items-center">
                                                            <img src="{{ asset('assets/web/img/VALIDITY.svg') }}" alt="">
                                                            <p class="label-field">
                                                                VALIDITY
                                                            </p>
                                                        </div>
                                                    </div>
                                                    <div>
                                                        <p class="data-field">
                                                            07 Days
                                                        </p>
                                                    </div>
                                                </div>
                                            </li>
                                            <li class="list-group-item align-items-center border-bottom-0 ">
                                                <div class="d-flex justify-content-between flex-wrap gap-3">
                                                    <div>
                                                        <div class="d-flex gap-4 align-items-center">
                                                            <img src="{{ asset('assets/web/img/price.png') }}" alt="">
                                                            <p class="label-field">
                                                                PRICE
                                                            </p>
                                                        </div>
                                                    </div>
                                                    <div>
                                                        <p class="data-field">
                                                            07 Days
                                                        </p>
                                                    </div>
                                                </div>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                                <!-- End testimonial item -->

                                <div class="swiper-slide">
                                    <div class="card slider-card">
                                        <ul class="list-group border-0">
                                            <li class="list-group-item">
                                                <h4 class="text-white mb-0 text-center">
                                                    3 GB - 7 Days
                                                </h4>
                                            </li>
                                            <li class="list-group-item">
                                                <div
                                                    class="d-flex align-items-center justify-content-between  flex-wrap gap-3">
                                                    <div>
                                                        <div class="d-flex gap-4 align-items-center">
                                                            <img src="{{ asset('assets/web/img/DATA.svg') }}" alt="">
                                                            <p class="label-field">
                                                                DATA
                                                            </p>
                                                        </div>
                                                    </div>
                                                    <div>
                                                        <p class="data-field">
                                                            3 GB
                                                        </p>
                                                    </div>
                                                </div>
                                            </li>
                                            <li class="list-group-item">
                                                <div
                                                    class="d-flex align-items-center justify-content-between flex-wrap gap-3">
                                                    <div>
                                                        <div class="d-flex gap-4 align-items-center">
                                                            <img src="{{ asset('assets/web/img/VALIDITY.svg') }}" alt="">
                                                            <p class="label-field">
                                                                VALIDITY
                                                            </p>
                                                        </div>
                                                    </div>
                                                    <div>
                                                        <p class="data-field">
                                                            07 Days
                                                        </p>
                                                    </div>
                                                </div>
                                            </li>
                                            <li class="list-group-item align-items-center border-bottom-0 ">
                                                <div class="d-flex justify-content-between flex-wrap gap-3">
                                                    <div>
                                                        <div class="d-flex gap-4 align-items-center">
                                                            <img src="{{ asset('assets/web/img/price.png') }}" alt="">
                                                            <p class="label-field">
                                                                PRICE
                                                            </p>
                                                        </div>
                                                    </div>
                                                    <div>
                                                        <p class="data-field">
                                                            07 Days
                                                        </p>
                                                    </div>
                                                </div>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                                <!-- End testimonial item -->

                                <div class="swiper-slide">
                                    <div class="card slider-card">
                                        <ul class="list-group border-0">
                                            <li class="list-group-item">
                                                <h4 class="text-white mb-0 text-center">
                                                    3 GB - 7 Days
                                                </h4>
                                            </li>
                                            <li class="list-group-item">
                                                <div
                                                    class="d-flex align-items-center justify-content-between  flex-wrap gap-3">
                                                    <div>
                                                        <div class="d-flex gap-4 align-items-center">
                                                            <img src="{{ asset('assets/web/img/DATA.svg') }}" alt="">
                                                            <p class="label-field">
                                                                DATA
                                                            </p>
                                                        </div>
                                                    </div>
                                                    <div>
                                                        <p class="data-field">
                                                            3 GB
                                                        </p>
                                                    </div>
                                                </div>
                                            </li>
                                            <li class="list-group-item">
                                                <div
                                                    class="d-flex align-items-center justify-content-between flex-wrap gap-3">
                                                    <div>
                                                        <div class="d-flex gap-4 align-items-center">
                                                            <img src="{{ asset('assets/web/img/VALIDITY.svg') }}" alt="">
                                                            <p class="label-field">
                                                                VALIDITY
                                                            </p>
                                                        </div>
                                                    </div>
                                                    <div>
                                                        <p class="data-field">
                                                            07 Days
                                                        </p>
                                                    </div>
                                                </div>
                                            </li>
                                            <li class="list-group-item align-items-center border-bottom-0 ">
                                                <div class="d-flex justify-content-between flex-wrap gap-3">
                                                    <div>
                                                        <div class="d-flex gap-4 align-items-center">
                                                            <img src="{{ asset('assets/web/img/price.png') }}" alt="">
                                                            <p class="label-field">
                                                                PRICE
                                                            </p>
                                                        </div>
                                                    </div>
                                                    <div>
                                                        <p class="data-field">
                                                            07 Days
                                                        </p>
                                                    </div>
                                                </div>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                                <!-- End testimonial item -->

                                <div class="swiper-slide">
                                    <div class="card slider-card">
                                        <ul class="list-group border-0">
                                            <li class="list-group-item">
                                                <h4 class="text-white mb-0 text-center">
                                                    3 GB - 7 Days
                                                </h4>
                                            </li>
                                            <li class="list-group-item">
                                                <div
                                                    class="d-flex align-items-center justify-content-between  flex-wrap gap-3">
                                                    <div>
                                                        <div class="d-flex gap-4 align-items-center">
                                                            <img src="{{ asset('assets/web/img/DATA.svg') }}" alt="">
                                                            <p class="label-field">
                                                                DATA
                                                            </p>
                                                        </div>
                                                    </div>
                                                    <div>
                                                        <p class="data-field">
                                                            3 GB
                                                        </p>
                                                    </div>
                                                </div>
                                            </li>
                                            <li class="list-group-item">
                                                <div
                                                    class="d-flex align-items-center justify-content-between flex-wrap gap-3">
                                                    <div>
                                                        <div class="d-flex gap-4 align-items-center">
                                                            <img src="{{ asset('assets/web/img/VALIDITY.svg') }}" alt="">
                                                            <p class="label-field">
                                                                VALIDITY
                                                            </p>
                                                        </div>
                                                    </div>
                                                    <div>
                                                        <p class="data-field">
                                                            07 Days
                                                        </p>
                                                    </div>
                                                </div>
                                            </li>
                                            <li class="list-group-item align-items-center border-bottom-0 ">
                                                <div class="d-flex justify-content-between flex-wrap gap-3">
                                                    <div>
                                                        <div class="d-flex gap-4 align-items-center">
                                                            <img src="{{ asset('assets/web/img/price.png') }}" alt="">
                                                            <p class="label-field">
                                                                PRICE
                                                            </p>
                                                        </div>
                                                    </div>
                                                    <div>
                                                        <p class="data-field">
                                                            07 Days
                                                        </p>
                                                    </div>
                                                </div>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <div class="swiper-pagination"></div>
                        </div>
                    </div>
                </div> --}}
                <div class="container additional-info px-lg-5 px-0">
                    <div class="row g-5">
                        <div class="col-lg-6 order-lg-1">
                            <h3 class="pt-3">
                                Supported Countries
                            </h3>
                        </div>
                        <div class="col-lg-6 order-lg-2 order-3">
                            <h3 class="pt-3">Additional Information</h3>
                        </div>
                        <div class="col-lg-6 order-lg-3 order-2 d-flex align-items-stretch">
                            <div class="card w-100">
                                <div class="card-body">
                                    <ul class="list-group border-0">
                                        <li class="list-group-item">
                                            <div
                                                class="d-flex align-items-center justify-content-between flex-wrap gap-3">
                                                <div>
                                                    <p class="label-field" id="supported_country_name">UNITED KINGDOM</p>
                                                </div>
                                                <div>
                                                    <p class="data-field"><img id="supported_country_flag" src="{{ asset('assets/web/img/flag-2.svg') }}" alt="" height="40px"></p>
                                                </div>
                                            </div>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6  order-4 d-flex align-items-stretch">
                            <div class="card w-100">
                                <ul class="list-group border-0">
                                    <li class="list-group-item">
                                        <div class="d-flex align-items-center justify-content-between gap-3">
                                            <div>
                                                <p class="label-field">Network</p>
                                            </div>
                                            <div>
                                                <p class="data-field" id="additional_info_network"></p>
                                            </div>
                                        </div>
                                    </li>
                                    <li class="list-group-item">
                                        <div class="d-flex align-items-center justify-content-between flex-wrap gap-3">
                                            <div>
                                                <p class="label-field">Plan Type</p>
                                            </div>
                                            <div>
                                                <p class="data-field">Data Only</p>
                                            </div>
                                        </div>
                                    </li>
                                    <li class="list-group-item">
                                        <div class="d-flex align-items-center justify-content-between gap-3">
                                            <div>
                                                <p class="label-field">
                                                    Activation Policy
                                                </p>
                                            </div>
                                            <div>
                                                <p class="data-field">
                                                    The validity period starts when the eSIM connects to any supported
                                                    network
                                                </p>
                                            </div>
                                        </div>
                                    </li>
                                    <li class="list-group-item">
                                        <div class="d-flex align-items-center justify-content-between flex-wrap gap-3">
                                            <div>
                                                <p class="label-field">eKYC (IDENTITY VERIFICATION)</p>
                                            </div>
                                            <div>
                                                <p class="data-field">Not Required</p>
                                            </div>
                                        </div>
                                    </li>
                                    {{-- <li class="list-group-item align-items-center border-bottom-0 flex-wrap gap-3">
                                        <div class="d-flex justify-content-between">
                                            <div>
                                                <p class="label-field">TOP-UP OPTION</p>
                                            </div>
                                            <div>
                                                <p class="data-field">Available</p>
                                            </div>
                                        </div>
                                    </li> --}}
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <form action="{{ route('plans.buyNow') }}" method="POST">
                @csrf
                <input type="hidden" name="amount" id="buyNowAmount">
                <input type="hidden" name="currency" id="buyNowCurrency">
                <input type="hidden" name="package" id="buyNowPackage">
                <input type="hidden" name="packageId" id="buyNowPackageId">
                <div class="modal-footer justify-content-center">
                    <button type="submit" class="btn">Proceed</button>
                </div>
            </form>
        </div>
    </div>
</div>
