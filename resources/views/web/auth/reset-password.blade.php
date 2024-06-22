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
                    <div class="card-body"><div class="row justify-content-between tab-content">
                        <div class="col-12 text-center">
                            <h5>
                                <img src="{{ asset('assets/web/img/reset-password.png') }}" width="50px">
                                <strong>Reset Password</strong>
                            </h5>
                            <p>Please enter verification code sent on registered email to reset the password</p>
                        </div>
                        <div class="">
                            <form action="{{ route('auth.resetPassword') }}" method="POST" id="resetPassForm">
                                @csrf
                                <div class="input-group">
                                    <span class="input-group-text bg-transparent py-lg-3 border-right-0" id="basic-addon1">
                                        <img src="{{ asset('assets/web/img/account-varification.png') }}" alt="" width="22px">
                                    </span>
                                    <input type="number" class="form-control border-left-0" placeholder="Verification Code" aria-label="otp" aria-describedby="basic-addon1" name="otp">
                                </div>
                                <div class="input-group">
                                    <span class="input-group-text bg-transparent py-lg-3 border-right-0" id="basic-addon1">
                                        <img src="{{ asset('assets/web/img/Lock.svg') }}" alt="">
                                    </span>
                                    <input type="Password" class="form-control border-left-0 outli" placeholder="New Password" aria-label="Password" aria-describedby="basic-addon1" name="password" id="password">
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
        const spinnerContent = `
            <div class="text-center text-warning">
                <div class="spinner-border" style="width: 3rem; height: 3rem;" role="status">
                    <span class="visually-hidden">Loading...</span>
                </div>
            </div>
        `;
        $.validator.addMethod("customPassword", function(value, element) {
            return this.optional(element) ||
                   /[A-Z]/.test(value) && // Capital letter
                   /[a-z]/.test(value) && // Lowercase letter
                   /[0-9]/.test(value) && // Digit
                   /[^a-zA-Z0-9]/.test(value); // Special character
        }, "Password must contain at least one uppercase letter, one lowercase letter, one number, and one special character.");
        $('#resetPassForm').validate({
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
                formData.push({name: 'email', value: localStorage.getItem('forgot-password-email') || ''});
                $('#resetPassBtn').html(spinnerContent);
                $.ajax({
                    type: 'POST',
                    url: "{{ route('auth.resetPassword') }}",
                    data: formData,
                    success: function(responce) {
                        if(responce.status){
                            localStorage.removeItem('forgot-password-email')
                            toastr.success(responce.data.details);
                            window.location.href = "{{ route('auth.login-register') }}";
                        }else{
                            toastr.warning(responce.message);
                            $('#resetPassBtn').html('<button type="submit">RESET PASSWORD</button>');
                        }
                    },
                    error: function(xhr, status, error) {
                        toastr.warning('Something went wrong please try again!.');
                        $('#resetPassBtn').html('<button type="submit">RESET PASSWORD</button>');
                        console.log(error);
                    }
                });
            },
            rules: {
                otp: {
                    required: true,
                    minlength: 6,
                    maxlength: 6
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
            },
            messages: {
                otp: {
                    required: "Please enter varification code",
                    minlength: "Your otp must consist of 6 characters",
                    maxlength: "Your otp must consist of 6 characters"
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
            }
        });
    });
</script>
@endsection
