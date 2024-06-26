@extends('web.layout.app')

@section('title') Musafir | Forgot Password @endsection

@section('content')
<section class="login">
    <div class="container-fluid">
        <div class="row pt-5">
            <div class="col-lg-12">
                <div class="pb-5 text-center">
                    <a href="{{ route('home.index') }}"><img src="{{ asset('assets/web/img/login_logout_log.png') }}" alt=""></a>
                </div>
                <div class="card pt-5 border-0">
                    <div class="card-body"><div class="row justify-content-between tab-content">
                        <div class="col-12 text-center">
                            <h5>
                                <img src="{{ asset('assets/web/img/forgot-password.png') }}" width="36px">
                                <strong>Forgot Password</strong>
                            </h5>
                            <p>We can reset your password by entering your email down below. We’ll then send you an email with a link to reset your password.</p>
                        </div>
                        <div class="">
                            <form action="{{ route('auth.verifyOtp') }}" method="POST" id="forgotPassForm">
                                @csrf
                                <div class="input-group">
                                    <span class="input-group-text bg-transparent py-lg-3 border-right-0" id="basic-addon1">
                                        <img src="{{ asset('assets/web/img/Message.svg') }}" alt="" width="22px">
                                    </span>
                                    <input type="email" class="form-control border-left-0" placeholder="Email" aria-label="email" aria-describedby="basic-addon1" name="email">
                                </div>
                                <div class="submit-btn" id="submitBtn">
                                    <button type="submit">Continue</button>
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
        $('#forgotPassForm').validate({
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
                        localStorage.setItem('forgot-password-email', field.value);
                    }
                });
                $('#submitBtn').html(spinnerContent);
                $.ajax({
                    type: 'POST',
                    url: "{{ route('auth.forgotPassword') }}",
                    data: formData,
                    success: function(responce) {
                        if(responce.status){
                            toastr.success(responce.data.details);
                            window.location.href = "{{ route('auth.resetPassword') }}";
                        }else{
                            toastr.warning(responce.message);
                            $('#submitBtn').html('<button type="submit">Continue</button>');
                        }
                    },
                    error: function(xhr, status, error) {
                        toastr.error('Something went wrong please try again!.');
                        $('#submitBtn').html('<button type="submit">Continue</button>');
                        console.log(error);
                    }
                });
            },
            rules: {
                email: {
                    required: true,
                    email: true
                }
            },
            messages: {
                email: {
                    required: "Please enter your email",
                    email: "Please enter a valid email address"
                }
            }
        });
    });
</script>
@endsection
