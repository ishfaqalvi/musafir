@extends('web.layout.app')

@section('title') Musafir | Plan @endsection

@section('content')
<iframe id="paymentIframe" src="{{ $url['baseurl'].'amount='.$url['amount'].'&currency='.$url['currency'].'&package='.$url['package'].'&packageId='.$url['packageId'].'&token='.$url['token'] }}" style="width:100%; height:100vh;" frameborder="0"></iframe>
@endsection

@section('script')
<script>
    // Function to handle messages from iframe
    function handleMessage(event) {
        // Verify the origin of the message for security
        if (event.origin !== 'http://your-iframe-url.com') { // Replace with actual iframe URL
            console.warn('Origin not allowed:', event.origin);
            return;
        }

        // Get the message data
        const data = event.data;

        // Check if data is sent and log it
        if (data) {
            console.log('Data received from iframe:', data);
        } else {
            console.log('No data sent from iframe.');
        }
    }

    // Add event listener for messages
    window.addEventListener('message', handleMessage, false);
</script>

{{-- <script>
    // Create the message to send to the parent window
    const data = {
        payment_id: 'payment-id',
        package_id: 'package-id',
        status: ''
    };

    // Post message to parent window
    window.parent.postMessage(message, '*'); // Replace '*' with specific origin for security
</script> --}}

<script>




    window.addEventListener('message', function(event) {
      // For security reasons, you should check the origin of the event
      // if (event.origin !== 'https://your-iframe-origin.com') return;
        console.log(event.data);
    //   if (event.data) {
    //     const iframeUrl = event.data.package_id;
    //     console.log('URL from iframe:', iframeUrl);
    //   }
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
