@extends('web.layout.app')

@section('title') Musafir | Plan @endsection

@section('content')
<iframe id="paymentIframe" src="{{ $url['baseurl'].'amount='.$url['amount'].'&currency='.$url['currency'].'&package='.$url['package'].'&packageId='.$url['packageId'].'&token='.$url['token'] }}" style="width:100%; height:100vh;" frameborder="0"></iframe>
@endsection

@section('script')
<script>
    window.addEventListener('load', function() {
        // Parse URL parameters
        const urlParams = new URLSearchParams(window.location.search);
        const paymentId = urlParams.get('payment_id');
        const packageId = urlParams.get('package_id');
        const status = urlParams.get('status');

        // Create data object
        const data = {
            payment_id: paymentId,
            package_id: packageId,
            status: status
        };
        window.parent.postMessage(data, '*');
    });
    // setInterval(function() {
    //     try {
    //         const generatedUrl = $('#paymentIframe').attr('src');
    //         window.parent.postMessage({ url: generatedUrl }, '*');

    //     } catch (error) {
    //         // This will fail if the iframe is from a different origin
    //         console.log('Error accessing iframe content:', error);
    //     }
    // }, 1000);
</script>
<script>
    window.addEventListener('message', function(event) {
      // For security reasons, you should check the origin of the event
      // if (event.origin !== 'https://your-iframe-origin.com') return;

      if (event.data) {
        const iframeUrl = event.data.package_id;
        console.log('URL from iframe:', iframeUrl);

        // Process the URL further as needed
        // For example, you can make an AJAX call to send this URL to your server
      }
    });
  </script>
{{-- <script>
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
</script> --}}
@endsection
