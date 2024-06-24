@extends('web.profile.layout')

@section('profile_content')
    @php($auth = session('api_token'))
    <div class="account-info-form h-100">
        <h3 class="mb-4 ms-lg-5 ps-lg-5">
            Payment History
        </h3>
        <div class="card profile-card-table">
            <div class="card-body p-lg-5" id="payment-history"></div>
        </div>
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
            $('#payment-history').html(config.spinnerContent);
            $.ajax({
                url: "{{ route('profile.paymentData') }}",
                method: 'GET',
                success: function(data) {
                    var paymentTable = $('#payment-history');
                    paymentTable.html(data);
                },
                error: function(xhr, status, error) {
                    toastr.warning('Error fetching data');
                    console.error('Error fetching data:', status, error);
                }
            });
        });
    </script>
@endsection
