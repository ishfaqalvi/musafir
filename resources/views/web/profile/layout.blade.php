@extends('web.layout.app')

@section('title') Musafir | Profile @endsection

@section('header') @include('web.layout.header') @endsection

@section('footer') @include('web.layout.footer') @endsection

@section('content')
<section id="hero" class="hero check-hero mb-5">
    <div class="container container-theme position-relative hero-container check-container d-flex">
        <div class="row gy-5 w-100" data-aos="fade-in">
            <div class="col-12 order-2 order-lg-1 d-flex  justify-content-center align-items-end">
                <div>
                    <h4 class="mb-0">Profile</h4>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- End Hero Section -->
<main id="main pt-3">
    <section class="profile pb-lg-5 mb-4">
        <div class="container-fluid profile-container">
            <div class="row g-lg-3">
                <div class="col-lg-3 mb-lg-0 mb-5">
                    <div class="profile-list card border-0">
                        <div class="card-header text-center bg-transparent py-3">
                            <h5>{{ authName() }}</h5>
                            {{-- <span>Traveler</span> --}}
                        </div>
                        <div class="card-body">
                            <ul>
                                <li><a href="{{ route('profile.accountInfo') }}" class="{{ request()->routeIs('profile.accountInfo*') ? 'active' : ''}}">Account Information</a></li>
                                <li><a href="{{ route('profile.payments')}}" class="{{ request()->routeIs('profile.payments*') ? 'active' : ''}}">Payment History</a></li>
                                <li><a href="{{ route('profile.subscribedBundles') }}" class="{{ request()->routeIs('profile.subscribedBundles*') ? 'active' : ''}}">Subscribed Bundles</a></li>
                                <li><a href="{{ route('profile.activateBundles') }}" class="{{ request()->routeIs('profile.activateBundles*') ? 'active' : ''}}">Activated Bundles</a></li>
                                <li><a href="{{ route('profile.usedBundles') }}" class="{{ request()->routeIs('profile.usedBundles*') ? 'active' : ''}}">Expired Bundles</a></li>
                                <li class="d-flex justify-content-between align-items-center">
                                    <a href="{{ route('profile.logout') }}">Logout</a>
                                    <img src="{{ asset('assets/web/img/logout.png') }}" alt="">
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-lg-9">
                    @yield('profile_content')
                </div>
            </div>
        </div>
    </section>
    <!-- ======= Donwload Section ======= -->
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
                    <img src="{{ asset('assets/web/img/donload-img-main.png') }}" alt="">
                </div>
            </div>
        </div>
    </section>
    <!-- End Donwload Section -->
</main>
@endsection

@section('script')
{{-- <script>
    $(function () {
        var type = "{{ $perameters['type'] }}";
        let spinnerContent = `
            <div class="text-center text-warning mb-5 mt-5">
                <div class="spinner-border" style="width: 3rem; height: 3rem;" role="status">
                    <span class="visually-hidden">Loading...</span>
                </div>
            </div>`;
        $('#localEsimsCountriesList').append(spinnerContent);
        $('#regionalEsimsRegionsList').append(spinnerContent);
        $('#musafirPlansCountriesList').append(spinnerContent);
        if(type == 'local'){
            $('#localEsimPlans').append(spinnerContent);
        }else if(type == 'regional'){
            $('#regionalEsimPlans').append(spinnerContent);
        }else if(type == 'musafir'){
            $('#musafirEsimPlans').append(spinnerContent);
        }
        $.ajax({
            url: '{{ route('plans.data') }}',
            method: 'GET',
            success: function(data) {
                $('#localEsimsCountriesList').html(data.countries.localEsims);
                $('#musafirPlansCountriesList').html(data.countries.musafirPlans);
                $('#regionalEsimsRegionsList').html(data.regions);
            },
            error: function(error) {
                $('#data-container').html('<p>Error loading data.</p>');
            }
        });
        var parameters = @json($perameters);
        $.ajax({
            url: "{{ route('plans.packages', []) }}" + '?' + $.param(parameters),
            method: 'GET',
            success: function(data) {
                if(type == 'local'){
                    $('#localEsimPlans').html(data);
                }else if(type == 'regional'){
                    $('#regionalEsimPlans').html(data);
                }else if(type == 'musafir'){
                    $('#musafirEsimPlans').html(data);
                }
            },
            error: function(error) {
                $('#data-container').html('<p>Error loading data.</p>');
            }
        });
    });
</script> --}}
@endsection
