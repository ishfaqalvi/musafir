@extends('web.profile.layout')

@section('profile_content')
    <div class="account-info-form h-100">
        <h3>Subscribed Bundles</h3>
        <div class="payment-method" id="page-content"></div>
    </div>
    <div class="modal fade" id="activateEsim" tabindex="-1" aria-labelledby="exampleModalLabel4" aria-hidden="true">
        <div class="modal-dialog qr-modal">
            <div class="modal-content">
                <div class="modal-header bg-transparent border-0 ">
                    <h1 class="modal-title fs-5 w-100 text-center" id="exampleModalLabel4">Scan QR</h1>
                    <button type="button" class="btn-close rounded-circle p-2 border border-dark" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body text-center">
                    <div>
                        <img src="assets/img/Qr-code.svg" alt="" id="qrcodesource">
                    </div>
                    <p>Scan This QR Code to activate your eSim in your mobile Phone.</p>
                </div>
            </div>
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
            };
            $('#page-content').html(config.spinnerContent);
            $.ajax({
                url: "{{ route('profile.bundlesData') }}?type=subscribedBundles",
                method: 'GET',
                success: function(responce) {
                    $('#page-content').html(responce);
                },
                error: function(xhr, status, error) {
                    toastr.error('Error fetching data');
                    console.error('Error fetching data:', status, error);
                }
            });
            $('#page-content').on('click', '.activePackage', function(){
                var id = $(this).data('id');
                $.ajax({
                    url: "{{ route('profile.esimInfo') }}?id="+ id,
                    method: 'GET',
                    success: function(responce) {
                        $('#qrcodesource').attr('src', responce.qrCode);
                        $('#activateEsim').modal('show');
                    },
                    error: function(xhr, status, error) {
                        toastr.error('Error fetching data');
                        console.error('Error fetching data:', status, error);
                    }
                });
            });
        });
    </script>
@endsection
