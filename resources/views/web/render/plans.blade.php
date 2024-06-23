@if($perameters['type'] == 'regional')
    <div class="d-flex justify-content-center align-items-center gap-4 mb-lg-5 mb-3">
        <div class="countries-flag">
            <img src="{{ asset('assets/web/img/maps-icon.svg') }}" alt="">
        </div>
        <h4 class="mb-0 countries-heading">{{ $filterByName }}</h4>
    </div>
@else
    <div class="d-flex justify-content-center align-items-center gap-4 mb-lg-5 mb-3">
        <div class="countries-flag">
            <img src="{{ $flagImage }}" alt="Flag of {{ $countryName }}" height="35px" width="45px">
        </div>
        <h4 class="mb-0 countries-heading">{{ $countryName }}</h4>
    </div>
@endif
@if(isset($plans['bundles']) && is_array($plans['bundles']))
    <div class="row g-3 pb-3 pb-lg-5">
        @foreach ($plans['bundles'] as $key => $row)
            <div class="col-lg-4 col-md-6">
                <div class="main-div-deatil-card">
                    <div class="country-card-img text-end me-4">
                        <img src="{{ asset('assets/web/img/detail-card-img.png') }}" alt="">
                    </div>
                    <div class="card  details-card  position-relative">
                        <ul class="list-group border-0 mt-0">
                            <li class="list-group-item">
                                <h5 class="text-white United-kingdom">{{ $row['countryNavigation']['countryName'] }}</h5>
                            </li>
                            <li class="list-group-item">
                                <div class="d-flex align-items-center justify-content-between">
                                    <div>
                                        <div class="d-flex gap-lg-4 gap-2 align-items-center img-icon">
                                            <img src="{{ asset('assets/web/img/COVERAGE.svg') }}" alt="">
                                            <p class="label-field">COVERAGE</p>
                                        </div>
                                    </div>
                                    <div><p class="data-field">{{ $row['countryNavigation']['networkType'] }}</p></div>
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
                                        <p class="data-field">{{ '$ '. $row['price'].' '.$row['currency'] }}</p>
                                    </div>
                                </div>
                            </li>
                            <li class="list-group-item align-items-center border-bottom-0">
                                <a href="javascript:;" class="text-white packageDetail"
                                    data-bundleid="{{ $row['bundleId'] }}"
                                    data-bundlename="{{ $row['bundleName'] }}"
                                    data-countryname="{{ $row['countryNavigation']['countryName'] }}"
                                    data-coverage="{{ $row['countryNavigation']['networkType'] }}"
                                    data-bundledata="{{ $row['bundleData'] }}"
                                    data-period="{{ $row['period'] }}"
                                    data-periodtype="{{ $row['periodType'] }}"
                                    data-currency="{{ $row['currency'] }}"
                                    data-price="{{ $row['price'] }}">
                                    <div class="w-100 border py-2 fw-bold rounded text-white text-center">
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
                Opps! No packages available for {{ $filterByName }}
            </h4>
        </div>
    </div>
@endif
