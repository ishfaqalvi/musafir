@extends('web.profile.layout')

@section('profile_content')
    <div class="account-info-form h-100">
        <h3>Used Bundles</h3>
        <div class="payment-method" id="page-content"></div>
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
            };
            $('#page-content').html(config.spinnerContent);
            $.ajax({
                url: "{{ route('profile.bundlesData') }}?type=usedBundles",
                method: 'GET',
                success: function(responce) {
                    $('#page-content').html(responce);
                },
                error: function(xhr, status, error) {
                    toastr.error('Error fetching data');
                    console.error('Error fetching data:', status, error);
                }
            });
        });
    </script>
@endsection
