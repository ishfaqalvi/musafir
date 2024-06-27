@extends('web.layout.app')

@section('title') Musafir | Plan @endsection

@section('content')
<div class="payment-overlay" id="payment-overlay">
    Redirecting in <span id="countdown">10</span> seconds...
</div>
<iframe id="paymentIframe" src="{{ $url['baseurl'].'amount='.$url['amount'].'&currency='.$url['currency'].'&package='.$url['package'].'&packageId='.$url['packageId'].'&token='.$url['token'] }}&method=web" style="width:100%; height:100vh;" frameborder="0">
</iframe>
@endsection

@section('script')
<script>
    $('#payment-overlay').hide();
    window.addEventListener('message', function(event) {
        console.log('Data from iframe:', event.data);
        var data = event.data;
        if (data && data.payment_id) {
            $.ajax({
                url: "{{ route('plans.subscription')}}",
                method: 'POST',
                data: {
                    _token : $('meta[name="csrf-token"]').attr('content'),
                    paymentId: data.payment_id,
                    bundleId: "{{ $url['packageId'] }}"
                },
                success: function(response) {
                    $('body').addClass('blocked');
                    $('#payment-overlay').show();
                    if (response.status) {
                        toastr.success('Your subscription completed successfully!');
                        var countdown = 10;
                        var countdownInterval = setInterval(function() {
                            countdown--;
                            $('#countdown').text(countdown);
                            if (countdown <= 0) {
                                clearInterval(countdownInterval);
                                window.location.href = "{{ route('profile.payments') }}";
                            }
                        }, 1000);
                    } else {
                        toastr.warning('Your subscription is not completed!');
                        var countdown = 10;
                        var countdownInterval = setInterval(function() {
                            countdown--;
                            $('#countdown').text(countdown);
                            if (countdown <= 0) {
                                clearInterval(countdownInterval);
                                window.location.href = "{{ route('home.index') }}";
                            }
                        }, 1000);
                    }
                },
                error: function(xhr, status, error) {
                    toastr.error('Something went wrong please try again');
                    window.location.href = "{{ route('home.index') }}";
                }
            });
        }
    }, false);
</script>
@endsection
