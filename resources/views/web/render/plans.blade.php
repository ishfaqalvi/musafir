@if($parameters['type'] == 'regional')
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
                                <h5 class="text-white United-kingdom">
                                    <img src="{{ asset('images/country-flag/'.strtolower($row['countryNavigation']['countryCode']).'.png') }}" alt="Flag of {{ $countryName }}" height="35px" width="45px">
                                    {{ $row['countryNavigation']['countryName'] }}
                                </h5>
                            </li>
                            <li class="list-group-item">
                                <div class="d-flex align-items-center justify-content-between">
                                    <div>
                                        <div class="d-flex gap-lg-4 gap-2 align-items-center img-icon">
                                            <img src="{{ asset('assets/web/img/COVERAGE.svg') }}" alt="">
                                            <p class="label-field">COVERAGE</p>
                                        </div>
                                    </div>
                                    <div>
                                        <p class="data-field">
                                            {{ $row['countryNavigation']['networkType'] }}
                                        </p>
                                    </div>
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
                                            <img src="{{ asset('assets/web/img/vendor.png') }}" alt="">
                                            <p class="label-field">VENDOR</p>
                                        </div>
                                    </div>
                                    <div>
                                        @php($vendor = explode(':', $row['countryNavigation']['networkTypeHimsi']))
                                        <p >{{ $vendor[0] }}</p>
                                    </div>
                                </div>
                            </li>
                            <li class="list-group-item align-items-center border-bottom-0">
                                <a href="javascript:;" class="text-white packageDetail"
                                    data-auth="{{ session('api_token') ? 'Yes' : 'No'}}"
                                    data-bundleid="{{ $row['bundleId'] }}"
                                    data-bundlename="{{ $row['bundleName'] }}"
                                    data-countryname="{{ $row['countryNavigation']['countryName'] }}"
                                    data-countryflag="{{ asset('images/country-flag/'.strtolower($row['countryNavigation']['countryCode']).'.png') }}"
                                    data-tootip="{{ $row['countryNavigation']['networkTypeHimsi'] }}"
                                    data-coverage="{{ $row['countryNavigation']['networkType'] }}"
                                    data-bundledata="{{ $row['bundleData'] }}"
                                    data-period="{{ $row['period'] }}"
                                    data-periodtype="{{ $row['periodType'] }}"
                                    data-currency="{{ $row['currency'] }}"
                                    data-price="{{ $row['price'] }}"
                                    data-networktype="{{ $row['countryNavigation']['networkTypeHimsi'].' | '. $row['countryNavigation']['networkTypeVimsi']}}"
                                    >
                                    <div class="w-100 border py-2 fw-bold rounded text-white text-center">
                                        {{ 'BUY NOW ($'. $row['price'].' '.$row['currency'].')' }}
                                    </div>
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
    @if($plans['totalPages'] > 1)
    <div class="row pb-5 justify-content-center mt-lg-5">
        <div class="text-center">
            <nav aria-label="Page navigation example">
                <ul class="pagination pagination-lg justify-content-center">
                    @if($plans['currentPage'] == 1)
                        <li class="page-item disabled">
                            <a class="page-link" href="#">&laquo;</a>
                        </li>
                    @else
                        @php($parameters =['type' => $type, 'region' => $region, 'country' => htmlspecialchars($countryCode, ENT_QUOTES, 'UTF-8'), 'page' => 1, 'pageSize' => 9])
                        <li class="page-item">
                            <a class="page-link" href="{{ route('plans.index', $parameters) }}#portfolio">&laquo;</a>
                        </li>
                    @endif
                    @for($i = 1; $i <= $plans['totalPages']; $i++)
                        @php($parameters =['type' => $type, 'region' => $region, 'country' => htmlspecialchars($countryCode, ENT_QUOTES, 'UTF-8'), 'page' => $i, 'pageSize' => 9])
                        <li class="page-item {{ request('page', 1) == $i ? 'active' : '' }}">
                            <a class="page-link" href="{{ route('plans.index', $parameters) }}#portfolio">{{ $i }}</a>
                        </li>
                    @endfor
                    @if($plans['totalPages'] == $plans['currentPage'])
                        <li class="page-item disabled">
                            <a class="page-link" href="#">&raquo;</a>
                        </li>
                    @else
                        @php($parameters =['type' => $type, 'region' => $region, 'country' => htmlspecialchars($countryCode, ENT_QUOTES, 'UTF-8'), 'page' => $plans['totalPages'], 'pageSize' => 9])
                        <li class="page-item">
                            <a class="page-link" href="{{ route('plans.index', $parameters) }}#portfolio">&raquo;</a>
                        </li>
                    @endif
                </ul>
            </nav>
        </div>
    </div>
    @endif
@else
    <div class="row mb-md-5">
        <div class="col-sm-12 text-center">
            <h4 class="mb-lg-3 mb-2">
                Opps! No packages available for {{ $filterByName }}
            </h4>
        </div>
    </div>
@endif
