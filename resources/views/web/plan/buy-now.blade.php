@extends('web.layout.app')

@section('title') Musafir | Plan @endsection

@section('content')
<iframe id="paymentIframe" src="{{ $url['baseurl'].'amount='.$url['amount'].'&currency='.$url['currency'].'&package='.$url['package'].'&packageId='.$url['packageId'].'&token='.$url['token'] }}" style="width:100%; height:100vh;" frameborder="0"></iframe>
@endsection

@section('script')
<script>
    $(document).ready(function() {

        window.addEventListener("message", function(event) {
            // Ensure the event comes from the expected origin
            if (event.origin !== "http://griffin26-001-site10.atempurl.com") {
                return;
            }

            var data = event.data;
            console.log("Data received from iframe:", data.payment_id);

            // if (data && data.payment_id && data.package_id && data.status) {
            //     $.ajax({
            //         url: '/process-payment', // Replace with your server endpoint
            //         method: 'POST',
            //         data: {
            //             payment_id: data.payment_id,
            //             package_id: data.package_id,
            //             status: data.status,
            //             _token: '{{ csrf_token() }}' // Include CSRF token if needed
            //         },
            //         success: function(response) {
            //             console.log('Data sent successfully:', response);
            //         },
            //         error: function(error) {
            //             console.error('Error sending data:', error);
            //         }
            //     });
            // }
        }, false);
    });
</script>
@endsection
