const config = {
    spinnerContent :
        `
        <div class="text-center text-warning">
            <div class="spinner-border" style="width: 3rem; height: 3rem;" role="status">
                <span class="visually-hidden">Loading...</span>
            </div>
        </div>
        `,
    routes: {
        countries: '{{ route('home.countries.list') }}',
        regions: '{{ route('home.regions.list') }}'
    },
    selectors: {
        localCountries: '#localEsimsCountriesList',
        musafirCountries: '#musafirPlansCountriesList',
        regionsList: '#regionalEsimsRegionsList',
        localShowAllBtn: '#localShowAllCountriesBtn',
        musafirShowAllBtn: '#musafirShowAllCountriesBtn',
        localShowAllContainer: '#localShowAllCountriesContainer',
        musafirShowAllContainer: '#musafirShowAllCountriesContainer'
    }
};
