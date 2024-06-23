@extends('web.profile.layout')

@section('profile_content')
@php($auth = session('api_token'))
<div class="account-info-form">
    <h3>Account Information</h3>
    <form action="{{ route('profile.accountInfo') }}" id="accountInfo">
        @csrf
        <div class="mb-4">
            <input type="name" class="form-control border-0 p-3" name="firstName" id="firstName"  aria-describedby="helpId" placeholder="First Name" value="{{ $auth['FirstName'] ?? $auth['firstName'] }}"/>
        </div>
        <div class="mb-4">
            <input type="name" class="form-control border-0 p-3" name="lastName" id="lastName"  aria-describedby="helpId" placeholder="Last Name (Optional)" value="{{ $auth['LastName'] ?? $auth['lastName'] }}" />
        </div>
        <div class="mb-4">
            <input type="email" class="form-control border-0 p-3" name="email" id="email"  aria-describedby="helpId" placeholder="Email" value="{{ $auth['email'] }}" readonly />
        </div>
        <div class="mb-4">
            <input type="password" class="form-control border-0 p-3" name="password" id="password"  aria-describedby="helpId" placeholder="Password" />
        </div>
        <div class="mb-4">
            <input type="password" class="form-control border-0 p-3" name="confirm_password" id="confirm_password"  aria-describedby="helpId" placeholder="Confirm Password" />
        </div>
        <div class="Confirm-Purchase" id="saveChanges">
            <button class="btn">
                Save Changes
            </button>
        </div>
    </form>
</div>
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
            saveBtnContent: '<button class="btn">Save Changes</button>',
        };
        $.validator.addMethod("customPassword", function(value, element) {
            return this.optional(element) ||
                   /[A-Z]/.test(value) && // Capital letter
                   /[a-z]/.test(value) && // Lowercase letter
                   /[0-9]/.test(value) && // Digit
                   /[^a-zA-Z0-9]/.test(value); // Special character
        }, "Password must contain at least one uppercase letter, one lowercase letter, one number, and one special character.");
        $('#accountInfo').validate({
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
                $('#saveChanges').html(config.spinnerContent);
                $.ajax({
                    type: 'POST',
                    url: "{{ route('profile.accountInfo') }}",
                    data: formData,
                    success: function(responce) {
                        if(responce.status){
                            toastr.success('Your profile updated successfully!');
                            $('#saveChanges').html(config.saveBtnContent);
                        }else{
                            toastr.warning(responce.message);
                            $('#saveChanges').html(config.saveBtnContent);
                        }
                    },
                    error: function(xhr, status, error) {
                        toastr.warning('Something went wrong please try again!.');
                        $('#saveChanges').html(config.saveBtnContent);
                        console.log(error);
                    }
                });
            },
            rules: {
                firstName: {
                    required: true,
                    minlength: 2
                },
                email: {
                    required: true,
                    email: true
                },
                password: {
                    minlength: 8,
                    maxlength: 16,
                    customPassword : true
                },
                confirm_password: {
                    equalTo: "#password"
                }
            },
            messages: {
                firstName: {
                    required: "Please enter your name",
                    minlength: "Your name must consist of at least 2 characters"
                },
                email: {
                    required: "Please enter your email",
                    email: "Please enter a valid email address"
                },
                password: {
                    minlength: "Your password must be at least 8 characters long",
                    maxlength: "Your password must be less then 16 characters long",
                },
                confirm_password: {
                    equalTo: "Passwords do not match"
                }
            }
        });
    });
</script>
@endsection
