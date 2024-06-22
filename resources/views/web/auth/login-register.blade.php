


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





@section('script')
<script>
    $(function () {

        let loginBtn = '<button type="submit">LOGIN</button>';
        let verifyOtpBtn = '<button type="submit">VERIFY OTP</button>';
        $('#verifyOtpForm').hide();
        $('#registerForm').submit(function(event) {

            
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
                            toastr.success('Login successfully.');
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
                            location.reload();
                        }else{
                            if(data.data.data.details){
                                toastr.warning(data.data.data.details);
                            }
                            toastr.warning(data.data.data.title);
                            $('#verifyOtpBtn').html(verifyOtpBtn);
                        }
                    }else{
                        toastr.warning(data.message);
                        $('#verifyOtpBtn').html(verifyOtpBtn);
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
