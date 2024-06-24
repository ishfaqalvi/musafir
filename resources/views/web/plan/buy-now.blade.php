@extends('web.layout.app')

@section('title') Musafir | Plan @endsection

@section('content')
<iframe id="paymentIframe" src="{{ $url['baseurl'].'amount='.$url['amount'].'&currency='.$url['currency'].'&package='.$url['package'].'&packageId='.$url['packageId'].'&token='.$url['token'] }}" style="width:100%; height:100vh;" frameborder="0">
</iframe>
@endsection

@section('script')
<script>
    function handleMessage(event) {

        const data = event.data;

        // Check if data is sent and log it
        if (data && typeof data === 'object') {
            console.log('Data received from iframe:', data);
        } else {
            console.log('No data or invalid format sent from iframe.');
        }
    }

    // Add event listener for messages
    window.addEventListener('message', handleMessage, false);
</script>
@endsection
