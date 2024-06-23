@extends('web.layout.app')

@section('title') Musafir | Plan @endsection

@section('content')
<iframe id="iframe" src="{{ $url['baseurl'].'amount='.$url['amount'].'&currency='.$url['currency'].'&package='.$url['package'].'&packageId='.$url['packageId'].'&token='.$url['token'] }}" style="width:100%; height:100vh;" frameborder="0"></iframe>
@endsection

@section('script')
<script>
    $(document).ready(function() {
        // Function to get query parameters from URL
        function getQueryParams(url) {
            const params = {};
            const parser = new URL(url);
            parser.searchParams.forEach((value, key) => {
                params[key] = value;
            });
            return params;
        }

        // Function to handle parameters
        function handleParams(params) {
            console.log(params);
            if (params.status === 'success') {
                const paymentId = params.payment_id;
                const packageId = params.package_id;

                console.log(`Payment ID: ${paymentId}`);
                console.log(`Package ID: ${packageId}`);

                // Call your API with paymentId and packageId
                // $.post('https://example.com/api/your-endpoint', {
                //     payment_id: paymentId,
                //     package_id: packageId
                // }).done(function(response) {
                //     console.log('API call successful:', response);
                // }).fail(function(error) {
                //     console.error('API call failed:', error);
                // });
            } else {
                console.error('Payment was not successful.');
            }
        }

        // Function to get URL from iframe and handle query parameters
        function getIframeParams() {
            const iframe = $('#iframe');
            const iframeWindow = iframe.contentWindow;
            const iframeDoc = iframeWindow.document;
            const iframeUrl = iframeDoc.URL;

            if (iframeUrl) {
                const params = getQueryParams(iframeUrl);
                handleParams(params);
            } else {
                console.error('Iframe URL not found.');
            }
        }

        // Wait for iframe to load and then get query parameters
        $('#iframe').on('load', function() {
            setTimeout(getIframeParams, 1000);
        });
    });
</script>
@endsection
