@extends('web.layout.app')

@section('title') Musafir | Forgot Password @endsection

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
                                <button class="nav-link active" id="forgotPassword-tab" data-bs-toggle="tab" data-bs-target="#forgotPassword" type="button" role="tab" aria-controls="forgotPassword" aria-selected="true">Forgot Password</button>
                            </li>
                            <li class="nav-item" role="presentation">
                                <button class="nav-link">Login</button>
                            </li>
                        </ul>
                        <div class="tab-content">
                            <div class="tab-pane active" id="forgotPassword" role="tabpanel" aria-labelledby="forgotPassword-tab">
                                <form action="{{ route('auth.forgotPassword') }}" method="POST" id="forgotPasswordForm">
                                    @csrf
                                    <div class="input-group">
                                        <span class="input-group-text bg-transparent py-lg-3 border-right-0" id="basic-addon1">
                                            <img src="{{ asset('assets/web/img/Message.svg') }}" alt="">
                                        </span>
                                        <input type="email" class="form-control border-left-0" placeholder="Email" aria-label="email" aria-describedby="basic-addon1" name="email">
                                    </div>
                                    <div class="submit-btn" id="forgotPassBtn">
                                        <button type="submit">SEND RESET PASSWORD EMAIL</button>
                                    </div>
                                </form>
                                <form action="{{ route('auth.resetPassword') }}" method="POST" id="resetPassForm">
                                    @csrf
                                    <div class="input-group">
                                        <span class="input-group-text bg-transparent py-lg-3 border-right-0" id="basic-addon1">
                                            <img src="{{ asset('assets/web/img/Message.svg') }}" alt="">
                                        </span>
                                        <input type="number" class="form-control border-left-0" placeholder="OTP" aria-label="otp" aria-describedby="basic-addon1" name="otp">
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
                                    <div class="submit-btn" id="resetPassBtn">
                                        <button type="submit">RESET PASSWORD</button>
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
        // Spinner Content
        const spinnerContent = `
            <div class="text-center text-warning">
                <div class="spinner-border" style="width: 3rem; height: 3rem;" role="status">
                    <span class="visually-hidden">Loading...</span>
                </div>
            </div>
        `;

        // Button Templates
        const buttons = {
            forgotPass: '<button type="submit">SEND RESET PASSWORD EMAIL</button>',
            resetPass: '<button type="submit">RESET PASSWORD</button>',
        };
        $('#resetPassForm').hide();
        $('#forgotPasswordForm').submit(function(event) {
            $('#forgotPassBtn').html(spinnerContent);
            event.preventDefault();
            var formData = $(this).serialize();
            $.ajax({
                type: 'POST',
                url: "{{ route('auth.forgotPassword') }}",
                data: formData,
                success: function(responce) {
                    if(responce.status){
                        if(responce.data.status){
                            toastr.success(responce.data.data.details);
                            $('#forgotPasswordForm').hide();
                            $('#resetPassForm').show();
                        }else{
                            toastr.warning(responce.data.data.details);
                        }
                    }else{
                        toastr.warning(responce.message);
                    }
                    $('#forgotPassBtn').html(buttons.forgotPass);
                },
                error: function(xhr, status, error) {
                    toastr.warning('Something went wrong please try again!.');
                    $('#forgotPassBtn').html(buttons.forgotPass);
                    console.console.log(error);
                }
            });
        });
        $('#resetPassForm').submit(function(event) {
            $('#resetPassBtn').html(spinnerContent);
            event.preventDefault();
            var formData = $(this).serialize();
            $.ajax({
                type: 'POST',
                url: "{{ route('auth.resetPassword') }}",
                data: formData,
                success: function(responce) {
                    if(responce.status){
                        if(responce.data.status){
                            toastr.success(responce.data.data.details);
                            window.location.href = "{{ route('auth.login-register') }}";
                        }else{
                            toastr.warning(responce.data.data.details);
                        }
                    }else{
                        toastr.warning(responce.message);
                    }
                    $('#resetPassBtn').html(buttons.resetPass);
                },
                error: function(xhr, status, error) {
                    toastr.warning('Something went wrong please try again!.');
                    $('#resetPassBtn').html(buttons.resetPass);
                    console.console.log(error);
                }
            });
        });
    });
</script>
@endsection
