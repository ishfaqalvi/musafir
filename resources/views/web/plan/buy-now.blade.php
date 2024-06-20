@extends('web.layout.app')

@section('title') Musafir | Plan @endsection

@section('header') @include('web.layout.header') @endsection

@section('footer') @include('web.layout.footer') @endsection

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
<iframe src="{{ $iframeUrl }}" style="width:100%; height:100vh;" frameborder="0"></iframe>
@endsection

@section('script')

@endsection
