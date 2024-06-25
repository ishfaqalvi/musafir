@extends('web.layout.app')

@section('title')
    Musafir | Contact Us
@endsection

@section('header')
    @include('web.layout.header')
@endsection

@section('footer')
    @include('web.layout.footer')
@endsection

@section('content')
<section id="hero" class="hero check-hero mb-5">
    <div class="container container-theme position-relative hero-container check-container d-flex"></div>
</section>
<main id="main pt-3">
    <section class="Contact-Us">
        <div class="container">
            <div class="row g-3 pb-lg-5 mb-lg-5 mb-5">
                <div class="col-lg-6 d-lg-grid">
                    <div class="contact_us_div">
                        <h2>Contact - Us</h2>
                        <p>Email, call, or complete the form to learn how eSim can solve your problem.</p>
                        <div class="pb-lg-4 pb-3 email-or-num">
                            <div>
                                <a href="#">info@musafireSim.com</a>
                            </div>
                            <div>
                                <a href="#">3738-3874774-09</a>
                            </div>
                        </div>
                        <a href="#" class="customer-suppport">Customer Support</a>
                    </div>
                    <div class="row pt-3">
                        <div class="col-lg-6">
                            <h5>Customer Support</h5>
                            <p>Our Support team is available around the clock to address any concerns or queries you may have</p>
                        </div>
                        <div class="col-lg-6">
                            <h5>Feedback & Suggestions</h5>
                            <p>
                                We value your feedback and are continuously working to improve Musafir eSim. your input
                                is crucial in shaping the future of Musafir.e
                            </p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 ps-lg-5">
                    <div class="card">
                        <div class="card-body">
                            <h6>Get In Touch</h6>
                            <p>You can reach us anytime</p>
                            <div class="pt-lg-4">
                                <from class="quick">
                                    <div class="d-flex gap-3 flex-wrap-div">
                                        <div class="mb-4 field-name">
                                            <input type="text" name="" id="" class="form-control"
                                                placeholder="First name" aria-describedby="helpId">
                                        </div>
                                        <div class="mb-4 field-name">
                                            <input type="text" name="" id="" class="form-control"
                                                placeholder="Last name" aria-describedby="helpId">
                                        </div>
                                    </div>
                                    <div class="mb-4">
                                        <input type="email" class="form-control email-message" name=""
                                            id="" aria-describedby="emailHelpId" placeholder="Your email">
                                    </div>
                                    <div class="mb-4">
                                        <!-- <input type="number" class="form-control" name="" id="" aria-describedby="emailHelpId" placeholder="Your email"> -->
                                        <div class="form-group">
                                            <input type="text" id="mobile_code" class="form-control"
                                                placeholder="Phone Number" name="name">
                                        </div>
                                    </div>
                                    <div class="mb-4">
                                        <textarea class="form-control" name="" id="" rows="6" placeholder="Type your message here"></textarea>
                                    </div>
                                    <div class="mb-0 text-center">
                                        <button type="submit" class="btn btn-primary w-50">
                                            <img src="{{ asset('assets/web/img/send.svg') }}" alt="">
                                            Submit
                                        </button>
                                    </div>
                                </from>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</main>
@endsection

@section('script')
@endsection
