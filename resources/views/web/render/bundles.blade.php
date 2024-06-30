@forelse ($records as $row)
<div class="payment-method-container position-relative mb-5 ms-auto">
    <div class="width-row ms-auto mb-4">
        <div class="row justify-content-end py-2 ps-md-4 ps-2">
            <div class="col-lg-9 col-md-9 mb-3">
                <h4 class="mb-1 text-white gif-mob">
                    {{ $row['bundle']['bundleName'] }}
                </h4>
                <h5 class="mb-4 text-white United-kingdom">
                    {{ $row['bundle']['countryNavigation']['countryName'] }}
                </h5>
            </div>
            <div class="col-lg-9 col-md-9">
                <div>
                    <ul class="list-group border-0">
                        <li class="list-group-item pt-0">
                            <div class="d-flex align-items-center justify-content-between">
                                <div>
                                    <div class="d-flex gap-4 align-items-center">
                                        <img src="{{ asset('assets/web/img/iccid.png') }}" alt="">
                                        <p class="label-field">
                                            ICCID
                                        </p>
                                    </div>
                                </div>
                                <div>
                                    <p class="data-field">{{ $row['userIccid'] }}</p>
                                </div>
                            </div>
                        </li>
                        <li class="list-group-item">
                            <div class="d-flex align-items-center justify-content-between">
                                <div>
                                    <div class="d-flex gap-4 align-items-center">
                                        <img src="{{ asset('assets/web/img/COVERAGE.svg') }}" alt="">
                                        <p class="label-field">
                                            COVERAGE
                                        </p>
                                    </div>
                                </div>
                                <div>
                                    <p class="data-field">{{ $row['bundle']['countryNavigation']['networkType'] }}</p>
                                </div>
                            </div>
                        </li>
                        <li class="list-group-item">
                            <div class="d-flex align-items-center justify-content-between">
                                <div>
                                    <div class="d-flex gap-4 align-items-center">
                                        <img src="{{ asset('assets/web/img/DATA.svg') }}" alt="">
                                        <p class="label-field">
                                            DATA
                                        </p>
                                    </div>
                                </div>
                                <div>
                                    <p class="data-field">{{ $row['bundle']['bundleData'] }}</p>
                                </div>
                            </div>
                        </li>
                        @if($type == 'activatedBundles')
                        <li class="list-group-item">
                            <div class="d-flex align-items-center justify-content-between">
                                <div>
                                    <div class="d-flex gap-4 align-items-center">
                                        <img src="{{ asset('assets/web/img/DATA.svg') }}" alt="">
                                        <p class="label-field">
                                            REMAINING DATA
                                        </p>
                                    </div>
                                </div>
                                <div>
                                    <p class="data-field">{{ $row['remainFlowCM'] }}</p>
                                </div>
                            </div>
                        </li>
                        @endif
                        <li class="list-group-item">
                            <div class="d-flex align-items-center justify-content-between">
                                <div>
                                    <div class="d-flex gap-4 align-items-center">
                                        <img src="{{ asset('assets/web/img/VALIDITY.svg') }}" alt="">
                                        <p class="label-field">
                                            VALIDITY
                                        </p>
                                    </div>
                                </div>
                                <div>
                                    <p class="data-field">{{ $row['bundle']['period'].' '.$row['bundle']['periodType'] }}</p>
                                </div>
                            </div>
                        </li>
                        @if($type == 'activatedBundles')
                        <li class="list-group-item">
                            <div class="d-flex align-items-center justify-content-between">
                                <div>
                                    <div class="d-flex gap-4 align-items-center">
                                        <img src="{{ asset('assets/web/img/VALIDITY.svg') }}" alt="">
                                        <p class="label-field">
                                            REMAINING TIME
                                        </p>
                                    </div>
                                </div>
                                <div>
                                    <p class="data-field">{{ $row['remainTimeCM'] }}</p>
                                </div>
                            </div>
                        </li>
                        @endif
                        <li class="list-group-item">
                            <div class="d-flex align-items-center justify-content-between">
                                <div>
                                    <div class="d-flex gap-4 align-items-center">
                                        <img src="{{ asset('assets/web/img/price.png') }}" alt="">
                                        <p class="label-field">
                                            PRICE
                                        </p>
                                    </div>
                                </div>
                                <div>
                                    <p class="data-field">{{ '$'. $row['bundle']['price'].' '.$row['bundle']['currency'] }}</p>
                                </div>
                            </div>
                        </li>
                        <li class="list-group-item">
                            <div class="d-flex align-items-center justify-content-between">
                                <div>
                                    <div class="d-flex gap-4 align-items-center">
                                        <img src="{{ asset('assets/web/img/subscription-icon.png') }}" alt="">
                                        <p class="label-field">
                                            SUBSCRIBED DATE
                                        </p>
                                    </div>
                                </div>
                                <div>
                                    <p class="data-field">{{ Carbon\Carbon::parse($row['createTimeCM'])->format('d-m-Y') }}</p>
                                </div>
                            </div>
                        </li>
                        <li class="list-group-item border-bottom-0">
                            <div class="d-flex align-items-center justify-content-between">
                                <div>
                                    <div class="d-flex gap-4 align-items-center">
                                        <img src="{{ asset('assets/web/img/expire-icon.png') }}" alt="">
                                        <p class="label-field">
                                            VALID TILL
                                        </p>
                                    </div>
                                </div>
                                <div>
                                    <p class="data-field">{{ $row['endTimeCM'] }}</p>
                                </div>
                            </div>
                        </li>
                        @if($type == 'subscribedBundles')
                        <li class="list-group-item align-items-center border-bottom-0 mt-2">
                            <a href="javascript:;" class="text-white activePackage" data-id="{{ $row['userSubId'] }}">
                                <div class="border py-2 fw-bold rounded text-white text-center">
                                    Activate Now
                                </div>
                            </a>
                        </li>
                        @endif
                    </ul>
                </div>
            </div>
        </div>
        <div class="checkout-card position-absolute">
            <img src="{{ asset('assets/web/img/busniess-card.png') }}" alt="">
        </div>
    </div>
</div>
@empty
<div class="row mt-lg-5 pt-lg-5">
    <div class="col-lg-5">
        <div class="saved_img">
            <img src="{{ asset('assets/web/img/no-record-found.png') }}" class="img-fluid" alt="">
        </div>
    </div>
    <div class="col-lg-7">
        <div class="pt-lg-0 pt-5">
            <h4 class="mb-lg-3 mb-2">Package Not Found!</h4>
            <p>We're sorry, but we couldn't find any packages.. If you need further assistance, feel free to contact our support team.</p>
        </div>
        <div class="Confirm-Purchase add_new_card text-center">
            <a href="{{ route('home.index') }}" class="btn">PURCHASED NOW</a>
        </div>
    </div>
</div>
@endforelse
