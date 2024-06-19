@extends('web.profile.layout')

@section('profile_content')
@php($auth = session('api_token'))
<div class="account-info-form">
    <h3>Account Information</h3>
    <form>
        <div class="mb-4">
            <input type="name" class="form-control border-0 p-3" name="" id=""  aria-describedby="helpId" placeholder="First Name" value="{{ $auth['FirstName'] }}"/>
        </div>
        <div class="mb-4">
            <input type="name" class="form-control border-0 p-3" name="" id=""  aria-describedby="helpId" placeholder="Last Name (Optional)" value="{{ $auth['LastName'] }}" />
        </div>
        <div class="mb-4">
            <input type="email" class="form-control border-0 p-3" name="" id=""  aria-describedby="helpId" placeholder="Email" value="{{ $auth['email'] }}"/>
            {{-- <div class="pt-2">
                <a href="">
                    <div class="border py-2 px-4 btn-link-account ms-auto text-center">
                        EDIT
                    </div>
                </a>
            </div> --}}
        </div>
        <div class="mb-4">
            <input type="password" class="form-control border-0 p-3" name="" id=""  aria-describedby="helpId" placeholder="Password" />
            {{-- <div class="pt-2">
                <a href="">
                    <div class="border py-2 px-4 btn-link-account ms-auto text-center">
                        CREATE
                    </div>
                </a>
            </div> --}}
        </div>
        <div class="Confirm-Purchase ">
            <button class="btn">
                Save Changes
            </button>
        </div>
    </form>
</div>
@endsection

@section('script')
{{-- <script>
    $(function () {
        var type = "{{ $perameters['type'] }}";
        let spinnerContent = `
            <div class="text-center text-warning mb-5 mt-5">
                <div class="spinner-border" style="width: 3rem; height: 3rem;" role="status">
                    <span class="visually-hidden">Loading...</span>
                </div>
            </div>`;
        $('#localEsimsCountriesList').append(spinnerContent);
        $('#regionalEsimsRegionsList').append(spinnerContent);
        $('#musafirPlansCountriesList').append(spinnerContent);
        if(type == 'local'){
            $('#localEsimPlans').append(spinnerContent);
        }else if(type == 'regional'){
            $('#regionalEsimPlans').append(spinnerContent);
        }else if(type == 'musafir'){
            $('#musafirEsimPlans').append(spinnerContent);
        }
        $.ajax({
            url: '{{ route('plans.data') }}',
            method: 'GET',
            success: function(data) {
                $('#localEsimsCountriesList').html(data.countries.localEsims);
                $('#musafirPlansCountriesList').html(data.countries.musafirPlans);
                $('#regionalEsimsRegionsList').html(data.regions);
            },
            error: function(error) {
                $('#data-container').html('<p>Error loading data.</p>');
            }
        });
        var parameters = @json($perameters);
        $.ajax({
            url: "{{ route('plans.packages', []) }}" + '?' + $.param(parameters),
            method: 'GET',
            success: function(data) {
                if(type == 'local'){
                    $('#localEsimPlans').html(data);
                }else if(type == 'regional'){
                    $('#regionalEsimPlans').html(data);
                }else if(type == 'musafir'){
                    $('#musafirEsimPlans').html(data);
                }
            },
            error: function(error) {
                $('#data-container').html('<p>Error loading data.</p>');
            }
        });
    });
</script> --}}
@endsection
