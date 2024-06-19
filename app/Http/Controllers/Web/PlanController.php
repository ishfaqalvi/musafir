<?php

namespace App\Http\Controllers\Web;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Services\{AdminService,BundleService};

class PlanController extends Controller
{
    protected $adminService;
    protected $bundleService;

    public function __construct(AdminService $adminService, BundleService $bundleService)
    {
        $this->adminService = $adminService;
        $this->bundleService = $bundleService;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $perameters = $request->all();

        return view('web.plan.index', compact('perameters'));
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function data()
    {
        $data = [
            'countries' => $this->fetchCountriesData(),
            'regions' => $this->fetchRegionsData()
        ];
        return response()->json($data);
    }

    /**
     * Fetch a listing of the resource from api.
     *
     * @return \Illuminate\Http\Response
     */
    public function packages(Request $request)
    {
        $data = $this->fetchPlansData($request->all());

        return response()->json($data);
    }

    /**
     * Fetch a listing of the resource from api.
     *
     * @return \Illuminate\Http\Response
     */
    public function fetchCountriesData()
    {
        $countries = $this->adminService->getCountries();
        $localEsimsData = '';
        $musafirPlansData = '';

        foreach ($countries as $row)
        {
            // Sanitize the data
            $countryCode = htmlspecialchars($row['countryCode'], ENT_QUOTES, 'UTF-8');
            $countryName = htmlspecialchars($row['countryName'], ENT_QUOTES, 'UTF-8');
            $flagImage = base64_encode($row['flagImage']);
            $rightIconUrl = asset("assets/web/img/right-Icon.png");

            // Generate the HTML content
            $localEsimsData .= '
            <div class="col-lg-4 col-md-6">
                <a href="' . route('plans.index', ['type' => 'local', 'country' => $countryCode]) . '">
                    <div class="card border-0">
                        <div class="card-body d-flex justify-content-between p-4 align-items-center">
                            <div>
                                <div class="d-flex gap-3 align-items-center">
                                    <img src="data:image/svg+xml;base64,' . $flagImage . '" alt="Flag of ' . $countryName . '" height="35px" width="45px">
                                    <h5>' . $countryName . '</h5>
                                </div>
                            </div>
                            <div>
                                <img src="' . $rightIconUrl . '" alt="Right Icon">
                            </div>
                        </div>
                    </div>
                </a>
            </div>';
            $musafirPlansData .= '
            <div class="col-lg-4 col-md-6">
                <a href="' . route('plans.index', ['type' => 'musafir', 'country' => $countryCode]) . '">
                    <div class="card border-0">
                        <div class="card-body d-flex justify-content-between p-4 align-items-center">
                            <div>
                                <div class="d-flex gap-3 align-items-center">
                                    <img src="data:image/svg+xml;base64,' . $flagImage . '" alt="Flag of ' . $countryName . '" height="35px" width="45px">
                                    <h5>' . $countryName . '</h5>
                                </div>
                            </div>
                            <div>
                                <img src="' . $rightIconUrl . '" alt="Right Icon">
                            </div>
                        </div>
                    </div>
                </a>
            </div>';
        }
        return ['localEsims' => $localEsimsData, 'musafirPlans' => $musafirPlansData];
    }

    /**
     * Fetch a listing of the resource from api.
     *
     * @return \Illuminate\Http\Response
     */
    public function fetchRegionsData()
    {
        $regions = $this->adminService->getRegions();
        $regionsData = '';
        foreach ($regions as $row)
        {
            // Sanitize the data
            $regionCode = htmlspecialchars($row['regionCode'], ENT_QUOTES, 'UTF-8');
            $regionName = htmlspecialchars($row['region'], ENT_QUOTES, 'UTF-8');
            $leftIconUrl = asset('assets/web/img/maps-icon.svg');
            $rightIconUrl = asset("assets/web/img/right-Icon.png");

            // Generate the HTML content
            $regionsData .= '
            <div class="col-lg-6 col-md-6">
                <a href="' . route('plans.index',['type' => 'regional', 'region' => $regionCode, 'name' => $regionName]) . '">
                    <div class="card border-0">
                        <div class="card-body d-flex justify-content-between p-4 align-items-center">
                            <div>
                                <div class="d-flex gap-3 align-items-center">
                                    <img src="' .$leftIconUrl. '" alt="">
                                    <h5>'. $regionName .'</h5>
                                </div>
                            </div>
                            <div>
                                <img src="' . $rightIconUrl . '" alt="">
                            </div>
                        </div>
                    </div>
                </a>
            </div>';
        }
        return $regionsData;
    }

    /**
     * Fetch a listing of the resource from api.
     *
     * @return \Illuminate\Http\Response
     */
    public function fetchPlansData($perameters)
    {
        $plans = $this->bundleService->getFilterBundles($perameters);
        $data = '';
        if($perameters['type'] == 'regional')
        {
            $data .= '
            <div class="d-flex justify-content-center align-items-center gap-4 mb-lg-5 mb-3">
                <div class="countries-flag">
                    <img src="'. asset('assets/web/img/maps-icon.svg'). '" alt="">
                </div>
                <h4 class="mb-0 countries-heading">'. $perameters['name'] . '</h4>
            </div>';
            $filterByName = $perameters['name'];
        }
        else
        {
            $category     = $this->adminService->getCountryByCode($perameters['country']);
            $countryName  = htmlspecialchars($category['countryName'], ENT_QUOTES, 'UTF-8');
            $flagImage    = base64_encode($category['flagImage']);
            $filterByName = $countryName;

            $data .= '
            <div class="d-flex justify-content-center align-items-center gap-4 mb-lg-5 mb-3">
                <div class="countries-flag">
                    <img src="data:image/svg+xml;base64,' . $flagImage . '" alt="Flag of ' . $countryName . '" height="35px" width="45px">
                </div>
                <h4 class="mb-0 countries-heading">'. $countryName . '</h4>
            </div>';
        }
        if(isset($plans['bundles']) && is_array($plans['bundles']))
        {
            $data .= '
            <div class="row g-3 pb-3 pb-lg-5">';
                foreach ($plans['bundles'] as $key => $row)
                {
                    $data .= '
                    <div class="col-lg-4 col-md-6">
                        <div class="main-div-deatil-card">
                            <div class="country-card-img text-end me-4">
                                <img src="'. asset('assets/web/img/detail-card-img.png').' " alt="">
                            </div>
                            <div class="card  details-card  position-relative">
                                <ul class="list-group border-0 mt-0">
                                    <li class="list-group-item">
                                        <h4 class="mb-1 text-white gif-mob">GiffGaf Mobile</h4>
                                        <h5 class="text-white United-kingdom">'. $row['bundleName'].'</h5>
                                    </li>
                                    <li class="list-group-item">
                                        <div class="d-flex align-items-center justify-content-between">
                                            <div>
                                                <div class="d-flex gap-lg-4 gap-2 align-items-center img-icon">
                                                    <img src="'. asset('assets/web/img/COVERAGE.svg').'" alt="">
                                                    <p class="label-field">COVERAGE</p>
                                                </div>
                                            </div>
                                            <div><p class="data-field">'. $row['countryNavigation']['countryName'] .'</p></div>
                                        </div>
                                    </li>
                                    <li class="list-group-item">
                                        <div class="d-flex align-items-center justify-content-between">
                                            <div>
                                                <div class="d-flex gap-lg-4 gap-2 align-items-center img-icon">
                                                    <img src="'. asset('assets/web/img/DATA.svg') .'" alt="">
                                                    <p class="label-field">DATA</p>
                                                </div>
                                            </div>
                                            <div>
                                                <p class="data-field">'. $row['bundleData'] .'</p>
                                            </div>
                                        </div>
                                    </li>
                                    <li class="list-group-item">
                                        <div class="d-flex align-items-center justify-content-between">
                                            <div>
                                                <div class="d-flex gap-lg-4 gap-2 align-items-center img-icon">
                                                    <img src="'. asset('assets/web/img/VALIDITY.svg') .'" alt="">
                                                    <p class="label-field">VALIDITY</p>
                                                </div>
                                            </div>
                                            <div>
                                                <p class="data-field">'. $row['period'].' '.$row['periodType'] .'</p>
                                            </div>
                                        </div>
                                    </li>
                                    <li class="list-group-item ">
                                        <div class="d-flex justify-content-between">
                                            <div>
                                                <div class="d-flex gap-lg-4 gap-2 align-items-center img-icon">
                                                    <img src="'. asset('assets/web/img/price.png') .'" alt="">
                                                    <p class="label-field">PRICE</p>
                                                </div>
                                            </div>
                                            <div>
                                                <p class="data-field">'. $row['currency'].' '.$row['price'] .'</p>
                                            </div>
                                        </div>
                                    </li>
                                    <li class="list-group-item align-items-center border-bottom-0 ">
                                        <a
                                            href="#" class="text-white pakageDetailModel"
                                            data-bundleId="'. $row['bundleId'].'"
                                            data-bundleName="'. $row['bundleName'].'"
                                            data-countryName="'. $row['countryNavigation']['countryName'] .'"
                                            data-bundleData="'. $row['bundleData'] .'"
                                            data-period="'. $row['period'].'"
                                            data-periodType="'.$row['periodType'] .'"
                                            data-currency="'. $row['currency'].'"
                                            data-price="'.$row['price'] .'">
                                            <div class="w-100 border py-2 fw-bold rounded text-white text-center" >
                                                BUY NOW
                                            </div>
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    ';
                }
                $data .= '
            </div>';
        }else{
            $data .= '
            <div class="row mb-md-5">
                <div class="col-sm-12 text-center">
                    <h4 class="mb-lg-3 mb-2">
                        Opps! No packages available for '. $filterByName .'
                    </h4>
                </div>
            </div>';
        }
        return $data;
    }
}
