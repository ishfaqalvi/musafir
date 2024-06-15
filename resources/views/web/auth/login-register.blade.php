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
                                <form action="{{ route('auth.login') }}" method="POST" id="loginForm">
                                    @csrf
                                    <div class="input-group">
                                        <span class="input-group-text bg-transparent py-lg-3 border-right-0" id="basic-addon1">
                                            <img src="{{ asset('assets/web/img/Message.svg') }}" alt="">
                                        </span>
                                        <input type="email" class="form-control border-left-0" placeholder="Email" aria-label="email" aria-describedby="basic-addon1" name="email">
                                    </div>
                                    <div class="input-group">
                                        <span class="input-group-text bg-transparent py-lg-3 border-right-0" id="basic-addon1">
                                            <img src="{{ asset('assets/web/img/Lock.svg') }}" alt="">
                                        </span>
                                        <input type="Password" class="form-control border-left-0 outli" placeholder="Password" aria-label="Password" aria-describedby="basic-addon1" name="password">
                                    </div>
                                    <div class="form-check form-switch justify-content-between d-flex">
                                        <div>
                                            <input class="form-check-input me-3" type="checkbox" id="flexSwitchCheckChecked" checked>
                                            <label class="form-check-label" for="flexSwitchCheckChecked">Remember me</label>
                                        </div>
                                        <a href="#" class="forget">Forgot password?</a>
                                    </div>
                                    <div class="submit-btn" id="loginBtn">
                                        <button type="submit">LOGIN</button>
                                    </div>
                                </form>
                                <form action="{{ route('auth.verifyOtp') }}" method="POST" id="verifyOtpForm">
                                    @csrf
                                    <input type="hidden" name="token" id="verifyOtpToken">
                                    <div class="input-group">
                                        <span class="input-group-text bg-transparent py-lg-3 border-right-0" id="basic-addon1">
                                            <img src="{{ asset('assets/web/img/Message.svg') }}" alt="">
                                        </span>
                                        <input type="number" class="form-control border-left-0" placeholder="OTP" aria-label="otp" aria-describedby="basic-addon1" name="otp">
                                    </div>
                                    <div class="submit-btn" id="verifyOtpBtn">
                                        <button type="submit">VERIFY OTP</button>
                                    </div>
                                </form>
                            </div>
                            <div class="tab-pane" id="register" role="tabpanel" aria-labelledby="register-tab">
                                <form action="{{ route('auth.register') }}" method="POST" id="registerForm">
                                    @csrf
                                    <div class="input-group">
                                        <span class="input-group-text bg-transparent py-lg-3 border-right-0" id="basic-addon1">
                                            <img src="{{ asset('assets/web/img/Mail.svg') }}" alt="">
                                        </span>
                                        <input type="name" class="form-control border-left-0" placeholder="First name" aria-label="name" aria-describedby="basic-addon1" name="firstName">
                                    </div>
                                    <div class="input-group">
                                        <span class="input-group-text bg-transparent py-lg-3 border-right-0" id="basic-addon1">
                                            <img src="{{ asset('assets/web/img/Mail.svg') }}" alt="">
                                        </span>
                                        <input type="text" class="form-control border-left-0" placeholder="Last Name" aria-label="lastName" aria-describedby="basic-addon1" name="lastName">
                                    </div>
                                    <div class="input-group">
                                        <span class="input-group-text bg-transparent py-lg-3 border-right-0" id="basic-addon1">
                                            <img src="{{ asset('assets/web/img/Mail.svg') }}" alt="">
                                        </span>
                                        <input type="text" class="form-control border-left-0" placeholder="User Name" aria-label="userName" aria-describedby="basic-addon1" name="userName">
                                    </div>
                                    <div class="input-group">
                                        <span class="input-group-text bg-transparent py-lg-3 border-right-0" id="basic-addon1">
                                            <img src="{{ asset('assets/web/img/Message.svg') }}" alt="">
                                        </span>
                                        <input type="email" class="form-control border-left-0" placeholder="Email" aria-label="email" aria-describedby="basic-addon1" name="email">
                                    </div>
                                    <div class="input-group">
                                        <span class="input-group-text bg-transparent py-lg-3 border-right-0" id="basic-addon1">
                                            <img src="{{ asset('assets/web/img/Lock.svg') }}" alt="">
                                        </span>
                                        <input type="Password" class="form-control border-left-0 outli" placeholder="Password" aria-label="Password" aria-describedby="basic-addon1" name="password">
                                    </div>
                                    <div class="input-group">
                                        <span class="input-group-text bg-transparent py-lg-3 border-right-0" id="basic-addon1">
                                            <img src="{{ asset('assets/web/img/Lock.svg') }}" alt="">
                                        </span>
                                        <input type="password" class="form-control border-left-0 outli" placeholder="Confirm password" aria-label="Password" aria-describedby="basic-addon1" name="confirm_password">
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="agree" id="agree" value="yes">
                                        <label class="form-check-label" for="agree">
                                            By registering, you agree to our terms & conditions and privacy policy
                                        </label>
                                    </div>
                                    <div class="submit-btn" id="signupBtn">
                                        <button type="submit">SIGN UP</button>
                                    </div>
                                </form>
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
    $(function () {
        let spinnerContent =
            `
            <div class="text-center text-warning">
                <div class="spinner-border" style="width: 3rem; height: 3rem;" role="status">
                    <span class="visually-hidden">Loading...</span>
                </div>
            </div>
            `;
        let signupBtn = '<button type="submit">SIGN UP</button>';
        let loginBtn = '<button type="submit">LOGIN</button>';
        let verifyOtpBtn = '<button type="submit">VERIFY OTP</button>';
        $('#verifyOtpForm').hide();
        $('#registerForm').submit(function(event) {
            $('#signupBtn').html(spinnerContent);
            event.preventDefault();
            var formData = $(this).serialize();
            $.ajax({
                type: 'POST',
                url: "{{ route('auth.register') }}",
                data: formData,
                success: function(data) {
                    if(data.status){
                        if(data.data.status){
                            toastr.success('You have registed successfully!');
                            location.reload();
                        }else{
                            if(data.data.data.details){
                                toastr.warning(data.data.data.details);
                            }else{
                                toastr.warning(data.data.data.title);
                            }
                        }
                    }else{
                        toastr.warning(data.message);
                    }
                    $('#signupBtn').html(signupBtn);
                },
                error: function(xhr, status, error) {
                    toastr.warning('Something went wrong please try again!.');
                    $('#signupBtn').html(signupBtn);
                    console.console.log(error);
                }
            });
        });
        $('#loginForm').submit(function(event) {
            $('#loginBtn').html(spinnerContent);
            event.preventDefault();
            var formData = $(this).serialize();
            $.ajax({
                type: 'POST',
                url: "{{ route('auth.login') }}",
                data: formData,
                success: function(responce) {
                    if(responce.status){
                        if(responce.data.Verified === 'False'){
                            toastr.info('Please wait your account is verifying.')
                            $.ajax({
                                type: 'POST',
                                url: "{{ route('auth.sendOtp') }}",
                                data: {
                                    _token: $('meta[name="csrf-token"]').attr('content'),
                                    isEmailVerification : true,
                                    isMobileVerification : false,
                                    mobile : "",
                                    email : responce.data.email,
                                    token : responce.data.token
                                },
                                success: function(result) {
                                    if(result.status){
                                        if(result.data.status){
                                            toastr.success(result.data.data.details);
                                            $('#verifyOtpToken').val(responce.data.token);
                                            $('#loginForm').hide();
                                            $('#verifyOtpForm').show();
                                        }else{
                                            toastr.warning('Something went wrong!');
                                            $('#loginBtn').html(loginBtn);
                                        }
                                    }else{
                                        toastr.warning(result.message);
                                        $('#loginBtn').html(loginBtn);
                                    }
                                },
                                error: function(xhr, status, error) {
                                    toastr.warning('Something went wrong please try again!.');
                                    $('#loginBtn').html(loginBtn);
                                    console.console.log(error);
                                }
                            });
                        }else{
                            toaster.success('Login successfully.');
                            window.location.href = "{{ route('profile.accountInfo') }}";
                        }
                    }else{
                        toastr.warning(responce.message);
                        $('#loginBtn').html(loginBtn);
                    }
                },
                error: function(xhr, status, error) {
                    toastr.warning('Something went wrong please try again!.');
                    $('#loginBtn').html(loginBtn);
                    console.console.log(error);
                }
            });
        });
        $('#verifyOtpForm').submit(function(event) {
            $('#verifyOtpBtn').html(spinnerContent);
            event.preventDefault();
            var formData = $(this).serialize();
            $.ajax({
                type: 'POST',
                url: "{{ route('auth.verifyOtp') }}",
                data: formData,
                success: function(data) {
                    if(data.status){
                        if(data.data.status){
                            toastr.success('Your account is varified successfully!');
                            // location.reload();
                        }else{
                            if(data.data.data.details){
                                toastr.warning(data.data.data.details);
                            }
                            toastr.warning(data.data.data.title);
                            $('#signupBtn').html(signupBtn);
                        }
                    }else{
                        toastr.warning(data.message);
                        $('#signupBtn').html(signupBtn);
                    }
                },
                error: function(xhr, status, error) {
                    toastr.warning('Something went wrong please try again!.');
                    $('#verifyOtp').html(verifyOtpBtn);
                    console.console.log(error);
                }
            });
        });
    });
</script>
@endsection
