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
    <div class="container container-theme position-relative hero-container check-container d-flex">
        <div class="row gy-5 w-100" data-aos="fade-in">
            <div class="col-12 order-2 order-lg-1 d-flex  justify-content-center align-items-end">
                <div> 
                    <h4 class="mb-0">
                        Contact Musafir Support
                    </h4>
                </div>
            </div>
        </div>
    </div>
</section>
<main id="main pt-3">
    <section class="Contact-Us">
        <div class="container">
            <div class="row g-3 pb-lg-5 mb-lg-5 mb-5">
                <div class="col-lg-6 d-lg-grid">
                    <div class="contact_us_div">
                        <h2>Contact - Us</h2>
                        <p>Email us or complete the form to learn how eSim can solve your problem.</p>
                        <div class="pb-lg-4 pb-3 email-or-num">
                            <div>
                                <a href="mailto:enquiries@musfirsolutions.com" target="_blank">enquiries@musfirsolutions.com</a>
                            </div>
                            {{-- <div>
                                <a href="#">3738-3874774-09</a>
                            </div> --}}
                        </div>
                        {{-- <a href="#" class="customer-suppport">Customer Support</a> --}}
                    </div>
                    <div class="row">
                        <div class="col-lg-6">
                            <h5>Customer Support</h5>
                            <p>Our Support team is available 24/7 to address any concerns or queries you may have.</p>
                        </div>
                        <div class="col-lg-6">
                            <h5>Feedback & Suggestions</h5>
                            <p>
                                We value your feedback and are continuously working to improve Musafir eSim. Your input is crucial in shaping the future of Musafir eSim.
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
                                <form class="quick" id="contact-us-form" action="{{ route('page.contactUs') }}" method="POST">
                                    @csrf
                                    <div class="d-flex gap-3 flex-wrap-div">
                                        <div class="mb-4 field-name">
                                            <input type="text" name="firstName" required id="" class="form-control" placeholder="First name" aria-describedby="helpId">
                                        </div>
                                        <div class="mb-4 field-name">
                                            <input type="text" name="lastName" required id="" class="form-control" placeholder="Last name" aria-describedby="helpId">
                                        </div>
                                    </div>
                                    <div class="mb-4">
                                        <input type="email" class="form-control email-message" name="email" required id="" aria-describedby="emailHelpId" placeholder="Your email">
                                    </div>
                                    <div class="mb-4">
                                        <!-- <input type="number" class="form-control" name="" id="" aria-describedby="emailHelpId" placeholder="Your email"> -->
                                        <div class="form-group">
                                            <input type="text" id="mobile_code" class="form-control" placeholder="Phone Number" name="mobile" required>
                                        </div>
                                    </div>
                                    <div class="mb-4">
                                        <textarea class="form-control" name="message" id="" rows="4" placeholder="Type your message here" required></textarea>
                                    </div>
                                    <div class="mb-0 text-center" id="submitBtn">
                                        <button type="submit" class="btn btn-primary w-50">
                                            {{-- <img src="{{ asset('assets/web/img/send.svg') }}" alt=""> --}}
                                            Submit
                                        </button>
                                    </div>
                                </form>
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
<script>
    $(document).ready(function() {
        const config = {
            spinnerContent: `
            <div class="text-center text-warning">
                <div class="spinner-border" style="width: 3rem; height: 3rem;" role="status">
                    <span class="visually-hidden">Loading...</span>
                </div>
            </div>
            `,
            submitBtnContent: '<button type="submit" class="btn btn-primary w-50">Submit</button>',
        };
        $('#contact-us-form').validate({
            errorElement: "div",
            errorPlacement: function(error, element) {
                error.addClass("invalid-feedback");
                error.insertAfter(element);
            },
            highlight: function(element, errorClass, validClass) {
                $(element).addClass("is-invalid").removeClass("is-valid");
            },
            unhighlight: function(element, errorClass, validClass) {
                $(element).addClass("is-valid").removeClass("is-invalid");
            },
            submitHandler: function(form) {
                formData = $(form).serializeArray();
                $('#submitBtn').html(config.spinnerContent);
                $.ajax({
                    type: 'POST',
                    url: "{{ route('page.contactUs') }}",
                    data: formData,
                    success: function(responce) {
                        if(responce.status){
                            toastr.success('Request submitted successfully.');
                            setTimeout(function() {
                                window.location.reload();
                            }, 3000);
                        }else{
                            toastr.warning(responce.message);
                            $('#submitBtn').html(config.submitBtnContent);
                        }
                    },
                    error: function(xhr, status, error) {
                        toastr.error('Something went wrong please try again!.');
                        $('#submitBtn').html(config.submitBtnContent);
                        console.log(error);
                    }
                });
            },
            messages: {
                firstName:{
                    required: "Please enter your first name"
                },
                lastName:{
                    required: "Please enter your last name"
                },
                email: {
                    required: "Please enter your email"
                },
                mobile: {
                    required: "Please enter your phone number"
                },
                message: {
                    required: "Please enter your message"
                }
            }
        });
    });
</script>
@endsection
