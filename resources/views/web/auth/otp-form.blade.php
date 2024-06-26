@extends('web.layout.app')

@section('title') Musafir | Login Register @endsection

@section('content')
<section class="login">
    <div class="container-fluid">
        <div class="row pt-5">
            <div class="col-lg-12">
                <div class="pb-5 text-center">
                    <a href="{{ route('home.index') }}"><img src="{{ asset('assets/web/img/login_logout_log.png') }}" alt=""></a>
                </div>
                <div class="card pt-5 border-0">
                    <div class="card-body">
                        <div class="row justify-content-between tab-content">
                            <div class="col-12 text-center">
                                <h5>
                                    <img src="{{ asset('assets/web/img/account-varification.png') }}">
                                    <strong>Account Varification</strong>
                                </h5>
                                <p>Please enter verification code sent on registered email to verify your account</p>
                            </div>
                            <div class="">
                                <form action="{{ route('auth.verifyOtp') }}" method="POST" id="verifyOtpForm">
                                    @csrf
                                    <div class="input-group">
                                        <span class="input-group-text bg-transparent py-lg-3 border-right-0" id="basic-addon1">
                                            <img src="{{ asset('assets/web/img/account-varification.png') }}" alt="" width="22px">
                                        </span>
                                        <input type="number" class="form-control border-left-0" placeholder="OTP" aria-label="otp" aria-describedby="basic-addon1" name="otp">
                                    </div>
                                    <div id="timer" class="text-danger">00:00</div>
                                    <div class="submit-btn" id="verifyOtpBtn">
                                        <button type="submit">VERIFY OTP</button>
                                    </div>
                                    <div class="submit-btn d-none" id="resendOtpContainer">
                                        <button type="button" id="resendOtpBtn">RESEND OTP</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    <div>
    <div class="left_img">
        <img src="{{ asset('assets/web/img/left_img.png') }}" alt="">
    </div>
    <div class="center_img">
        <img src="{{ asset('assets/web/img/center_img.png') }}" alt="">
    </div>
    <div class="right_img">
        <img src="{{ asset('assets/web/img/right_img.png') }}" alt="">
    </div>
</section>
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
            timerDuration: 2 * 60,
            selectors: {
                display: '#timer',
                verifyOtpBtn: '#verifyOtpBtn',
                resendOtpBtn: '#resendOtpBtn',
                resendOtpContainer: '#resendOtpContainer',
                verifyOtpForm : '#verifyOtpForm'
            }
        };

        const $display = $(config.selectors.display);
        const $verifyOtpBtn = $(config.selectors.verifyOtpBtn);
        const $resendOtpBtn = $(config.selectors.resendOtpBtn);
        const $resendOtpContainer = $(config.selectors.resendOtpContainer);
        const $verifyOtpForm = $(config.selectors.verifyOtpForm);

        function startTimer(duration, display) {
            let timer = duration;
            const interval = setInterval(function() {
                let minutes = Math.floor(timer / 60);
                let seconds = timer % 60;

                minutes = minutes < 10 ? "0" + minutes : minutes;
                seconds = seconds < 10 ? "0" + seconds : seconds;

                display.text(minutes + ":" + seconds);
                localStorage.setItem('remainingTime', timer);

                if (--timer < 0) {
                    clearInterval(interval);
                    $verifyOtpBtn.addClass('d-none');
                    $resendOtpContainer.removeClass('d-none');
                    localStorage.setItem('otpExpired', 'true');
                    localStorage.removeItem('remainingTime');
                }
            }, 1000);
        }

        // Function to get remaining time
        function getRemainingTime() {
            let remainingTime = localStorage.getItem('remainingTime');
            if (remainingTime === null) {
                return config.timerDuration; // If no time is stored, start with full duration
            }
            return parseInt(remainingTime);
        }

        // Initialize timer based on the stored state
        if (localStorage.getItem('otpExpired') === 'true') {
            $verifyOtpBtn.addClass('d-none');
            $resendOtpContainer.removeClass('d-none');
        } else {
            let remainingTime = getRemainingTime();
            startTimer(remainingTime, $display);
        }

        // Handle resend OTP click
        $resendOtpContainer.on('click', $resendOtpBtn, function(event) {
            event.preventDefault();
            $resendOtpContainer.html(config.spinnerContent);
            $.ajax({
                type: 'POST',
                url: "{{ route('auth.sendOtp') }}",
                data: {
                    _token: $('meta[name="csrf-token"]').attr('content'),
                    email : localStorage.getItem('email'),
                    token : localStorage.getItem('token')
                },
                success: function(responce) {
                    if(responce.status){
                        toastr.success('OTP has been resent!');
                        localStorage.setItem('otpExpired', 'false');
                        $verifyOtpBtn.removeClass('d-none');
                        $resendOtpContainer.html('<button type="button" id="resendOtpBtn">RESEND OTP</button>');
                        $resendOtpContainer.addClass('d-none');
                        startTimer(config.timerDuration, $display);
                    }else{
                        toastr.warning(responce.message);
                        $resendOtpContainer.html('<button type="button" id="resendOtpBtn">RESEND OTP</button>');
                    }
                },
                error: function(xhr, status, error) {
                    toastr.error('Something went wrong please try again!.');
                    $resendOtpContainer.html('<button type="button" id="resendOtpBtn">RESEND OTP</button>');
                    console.console.log(error);
                }
            });
        });
        $verifyOtpForm.validate({
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
                formData.push({name: 'email', value: localStorage.getItem('email') || ''});
                formData.push({name: 'password', value: localStorage.getItem('password') || ''});
                formData.push({name: 'token', value: localStorage.getItem('token') || ''});
                $verifyOtpBtn.html(config.spinnerContent);
                $.ajax({
                    type: 'POST',
                    url: "{{ route('auth.verifyOtp')}}",
                    data: formData,
                    success: function(responce) {
                        if(responce.status){
                            toastr.success('Your account is varified and loged in successfully!');
                            window.location.href = "{{ route('auth.login-register')}}";
                        }else{
                            toastr.warning(responce.message);
                            $verifyOtpBtn.html('<button type="submit">VERIFY OTP</button>');
                        }
                    },
                    error: function(xhr, status, error) {
                        toastr.error('Something went wrong please try again!.');
                        $verifyOtpBtn.html('<button type="submit">VERIFY OTP</button>');
                        console.console.log(error);
                    }
                });
            },
            rules: {
                otp: {
                    required: true,
                    minlength: 6,
                    maxlength: 6,
                }
            },
            messages: {
                name: {
                    required: "Please enter varification code",
                    minlength: "Your otp must consist of 6 characters",
                    maxlength: "Your otp must consist of 6 characters",
                }
            }
        });
    });
</script>
@endsection
