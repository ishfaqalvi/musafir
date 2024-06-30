@foreach ($countries as $row)
    <div class="col-lg-4 col-md-6">
        <a href="{{ route('plans.index', ['type' => $type, 'country' => htmlspecialchars($row['countryCode'], ENT_QUOTES, 'UTF-8'), 'page' => 1, 'pageSize' => 9]) }}#portfolio">
            <div class="card border-0">
                <div class="card-body d-flex justify-content-between p-4 align-items-center">
                    <div>
                        <div class="d-flex gap-3 align-items-center">
                            <img src="{{ asset('images/country-flag/'.strtolower($row['countryCode']).'.png') }}" alt="Flag of {{ htmlspecialchars($row['countryName'], ENT_QUOTES, 'UTF-8') }}" height="35px" width="45px">
                            <h5>{{ htmlspecialchars($row['countryName'], ENT_QUOTES, 'UTF-8') }}</h5>
                        </div>
                    </div>
                    <div>
                        <img src="{{ asset("assets/web/img/right-Icon.png") }}" alt="Right Icon">
                    </div>
                </div>
            </div>
        </a>
    </div>
@endforeach
