@foreach ($regions as $row)
    <div class="col-lg-6 col-md-6">
        <a href="{{ route('plans.index',[
            'type'   => 'regional',
            'region' => htmlspecialchars($row['regionCode'], ENT_QUOTES, 'UTF-8'),
            'name'   => htmlspecialchars($row['region'], ENT_QUOTES, 'UTF-8')]) }}#portfolio">
            <div class="card border-0">
                <div class="card-body d-flex justify-content-between p-4 align-items-center">
                    <div>
                        <div class="d-flex gap-3 align-items-center">
                            <img src="{{ asset('assets/web/img/maps-icon.svg') }}" alt="">
                            <h5>{{ htmlspecialchars($row['region'], ENT_QUOTES, 'UTF-8') }}</h5>
                        </div>
                    </div>
                    <div>
                        <img src="{{ asset("assets/web/img/right-Icon.png") }}" alt="">
                    </div>
                </div>
            </div>
        </a>
    </div>
@endforeach
