@extends('web.layout.app')

@section('title') Musafir | Login Register @endsection

@section('content')
<section class="login">
    <div class="container-fluid">
        <div class="row pt-5">
            <div class="col-lg-12">
                <div class="pb-5 text-center">
                    <img src="{{ asset('assets/web/img/login_logout_log.png') }}" alt="">
                </div>
                <div class="card pt-5 border-0">
                    <div class="card-body">
                        <ul class="nav nav-tabs justify-content-center border-bottom-0" id="myTab" role="tablist">
                            <li class="nav-item" role="presentation">
                                <button class="nav-link active" id="login-tab" data-bs-toggle="tab" data-bs-target="#login" type="button" role="tab" aria-controls="login" aria-selected="true">Login</button>
                            </li>
                            <li class="nav-item" role="presentation">
                                <button class="nav-link" id="register-tab" data-bs-toggle="tab" data-bs-target="#register" type="button" role="tab" aria-controls="register" aria-selected="false">Sign up</button>
                            </li>
                        </ul>
                        <div class="tab-content">
                            <div class="tab-pane active" id="login" role="tabpanel" aria-labelledby="login-tab">
                                @include('web.auth.login-register.login')
                            </div>
                            <div class="tab-pane" id="register" role="tabpanel" aria-labelledby="register-tab">
                                @include('web.auth.login-register.register')
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card-footer pb-5 border-0">
                    <div class="d-flex align-items-center justify-content-center gap-4 pb-4 pb-3">
                        <div class="d-lg-block d-md-block  d-none"> <img src="{{ asset('assets/web/img/signup-line.svg') }}" alt=""></div>
                        <div> <p class="mb-0">Or Login With</p> </div>
                        <div class="d-lg-block d-md-block d-none"> <img src="{{ asset('assets/web/img/signup-line.svg') }}" alt=""> </div>
                    </div>
                    <div class="d-flex align-items-center justify-content-center gap-3 pb-4">
                        <a href="#">
                            <img src="{{ asset('assets/web/img/google-signup.svg') }}" alt="">
                        </a>
                        <a href="#">
                            <img src="{{ asset('assets/web/img/facebook-signup.svg') }}" alt="">
                        </a>
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
            signupBtnContent: '<button type="submit">SIGN UP</button>',
            loginBtnContent: '<button type="submit">LOGIN</button>',
            routes: {
                register: '{{ route('auth.register') }}',
                login: '{{ route('auth.login') }}',
                otpForm: '{{ route('auth.otp-form') }}'
            },
            selectors: {
                registerForm: '#registerForm',
                signupBtn: '#signupBtn',
                loginForm: '#loginForm',
                loginBtn: '#loginBtn',
            }
        };

        const $registerForm = $(config.selectors.registerForm);
        const $signupBtn = $(config.selectors.signupBtn);
        const $signupBtnContent = $(config.signupBtnContent);
        const $loginBtnContent = $(config.loginBtnContent);
        const $loginForm = $(config.selectors.loginForm);
        const $loginBtn = $(config.selectors.loginBtn);

        $.validator.addMethod("customPassword", function(value, element) {
            return this.optional(element) ||
                   /[A-Z]/.test(value) && // Capital letter
                   /[a-z]/.test(value) && // Lowercase letter
                   /[0-9]/.test(value) && // Digit
                   /[^a-zA-Z0-9]/.test(value); // Special character
        }, "Password must contain at least one uppercase letter, one lowercase letter, one number, and one special character.");
        $registerForm.validate({
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
                formData.forEach(function(field) {
                    if (field.name === 'email') {
                        localStorage.setItem('email', field.value);
                    }
                    if (field.name === 'password') {
                        localStorage.setItem('password', field.value);
                    }
                });
                $signupBtn.html(config.spinnerContent);
                $.ajax({
                    type: 'POST',
                    url: config.routes.register,
                    data: formData,
                    success: function(responce) {
                        if(responce.status){
                            localStorage.setItem('token', responce.token);
                            localStorage.setItem('otpExpired', 'false');
                            localStorage.removeItem('remainingTime');
                            toastr.success('You have registed successfully! '+ responce.data.details);
                            $signupBtn.html($signupBtnContent);
                            window.location.href = config.routes.otpForm;
                        }else{
                            toastr.warning(responce.message);
                            $signupBtn.html($signupBtnContent);
                        }
                    },
                    error: function(xhr, status, error) {
                        toastr.warning('Something went wrong please try again!.');
                        $signupBtn.html($signupBtnContent);
                        console.log(error);
                    }
                });
            },
            rules: {
                name: {
                    required: true,
                    minlength: 2
                },
                userName: {
                    required: true,
                    minlength: 2
                },
                email: {
                    required: true,
                    email: true
                },
                password: {
                    required: true,
                    minlength: 8,
                    maxlength: 16,
                    customPassword : true
                },
                confirm_password: {
                    required: true,
                    equalTo: "#password"
                },
                agree: {
                    required: true
                }
            },
            messages: {
                name: {
                    required: "Please enter your name",
                    minlength: "Your name must consist of at least 2 characters"
                },
                userName: {
                    required: "Please enter your user name",
                    minlength: "Your name must consist of at least 2 characters"
                },
                email: {
                    required: "Please enter your email",
                    email: "Please enter a valid email address"
                },
                password: {
                    required: "Please provide a password",
                    minlength: "Your password must be at least 8 characters long",
                    maxlength: "Your password must be less then 16 characters long",
                },
                confirm_password: {
                    required: "Please confirm your password",
                    equalTo: "Passwords do not match"
                },
                agree: {
                    required: "Please agree terms & conditions"
                }
            }
        });
        $loginForm.validate({
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
                $loginBtn.html(config.spinnerContent);
                $.ajax({
                    type: 'POST',
                    url: config.routes.login,
                    data: formData,
                    success: function(responce) {
                        if(responce.status){
                            if(responce.data.type == 'login'){
                                toastr.success('Login successfully.');
                                window.location.href = "{{ route('profile.accountInfo') }}";
                            }else{
                                localStorage.setItem('token', responce.data.token);
                                localStorage.setItem('email', responce.data.email);
                                localStorage.setItem('password', responce.data.password);
                                localStorage.setItem('otpExpired', 'false');
                                localStorage.removeItem('remainingTime');
                                toastr.success('Your account is not varified. Otp sent to your email!');
                                $loginBtn.html($loginBtnContent);
                                // window.location.href = config.routes.otpForm;
                            }
                        }else{
                            toastr.warning(responce.message);
                            $loginBtn.html($loginBtnContent);
                        }
                    },
                    error: function(xhr, status, error) {
                        toastr.warning('Something went wrong please try again!.');
                        $loginBtn.html($loginBtnContent);
                        console.log(error);
                    }
                });
            },
            rules: {
                email: {
                    required: true,
                    email: true
                },
                password: {
                    required: true,
                }
            },
            messages: {
                email: {
                    required: "Please enter your email",
                    email: "Please enter a valid email address"
                },
                password: {
                    required: "Please provide a password"
                }
            }
        });
    });
</script>
@endsection
