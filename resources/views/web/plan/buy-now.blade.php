@extends('web.layout.app')

@section('title') Musafir | Plan @endsection

@section('content')
<iframe id="paymentIframe" src="{{ $url['baseurl'].'amount='.$url['amount'].'&currency='.$url['currency'].'&package='.$url['package'].'&packageId='.$url['packageId'].'&token='.$url['token'] }}&method=web" style="width:100%; height:100vh;" frameborder="0">
</iframe>
@endsection

@section('script')
<script>
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
                    if (response.status) {
                        toastr.success('Your subscription completed successfully!');
                        window.location.href = "{{ route('profile.payments') }}";
                    } else {
                        toastr.warning('Your subscription is not completed!');
                        window.location.href = "{{ route('home.index') }}";
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
