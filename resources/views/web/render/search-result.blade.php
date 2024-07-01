<div class="text-start">
    <p class="bg-badge px-4 text-dark d-inline-block">Local</p>
</div>
@forelse ($countries as $row)
<li>
    <a href="{{ route('plans.index', ['type' => 'local', 'country' => htmlspecialchars($row['countryCode'], ENT_QUOTES, 'UTF-8'), 'page' => 1, 'pageSize' => 9]) }}#portfolio">
        <div class="d-flex justify-content-between align-items-center">
            <h6 class="mb-0">{{ htmlspecialchars($row['countryName'], ENT_QUOTES, 'UTF-8') }}</h6>
            <img src="{{ asset('images/country-flag/'.strtolower($row['countryCode']).'.png') }}" alt="" height="35px">
        </div>
    </a>
</li>
@empty
<li>
    <h6 class="mb-0">No record found!</h6>
</li> 
@endforelse
<div class="text-start mt-3">
    <p class="bg-badge px-4text-dark d-inline-block">Regional</p>
</div>
@forelse ($regions as $row)
<li>
    <a href="{{ route('plans.index',[
            'type'   => 'regional',
            'region' => htmlspecialchars($row['regionCode'], ENT_QUOTES, 'UTF-8'),
            'name'   => htmlspecialchars($row['region'], ENT_QUOTES, 'UTF-8'), 'page' => 1, 'pageSize' => 9]) }}#portfolio">
        <div class="d-flex justify-content-between align-items-center">
            <h6 class="mb-0">{{ htmlspecialchars($row['region'], ENT_QUOTES, 'UTF-8') }}</h6>
            <img src="{{ asset('assets/web/img/maps-icon.svg') }}" alt="" height="35px">
        </div>
    </a>
</li>
@empty
<li>
    <h6 class="mb-0">No record found!</h6>
</li> 
@endforelse
<div class="text-start mt-3">
    <p class="bg-badge px-4 text-dark d-inline-block">Musafir</p>
</div>
@forelse ($countries as $row)
<li>
    <a href="{{ route('plans.index', ['type' => 'musafir', 'country' => htmlspecialchars($row['countryCode'], ENT_QUOTES, 'UTF-8'), 'page' => 1, 'pageSize' => 9]) }}#portfolio">
        <div class="d-flex justify-content-between align-items-center">
            <h6 class="mb-0">{{ htmlspecialchars($row['countryName'], ENT_QUOTES, 'UTF-8') }}</h6>
            <img src="{{ asset('images/country-flag/'.strtolower($row['countryCode']).'.png') }}" alt="" height="35px">
        </div>
    </a>
</li>
@empty
<li>
    <h6 class="mb-0">No record found!</h6>
</li> 
@endforelse