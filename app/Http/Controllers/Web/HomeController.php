<?php

namespace App\Http\Controllers\Web;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Services\{AdminService,BundleService};

class HomeController extends Controller
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
    public function index()
    {
        return view('web.home.index');
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
     * Fetcj a listing of the resource from api.
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
            $flagImage = asset('images/country-flag/'.strtolower($row['countryCode']).'.png');
            $rightIconUrl = asset("assets/web/img/right-Icon.png");

            // Generate the HTML content
            $localEsimsData .= '
            <div class="col-lg-4 col-md-6">
                <a href="' . route('plans.index', ['type' => 'local', 'country' => $countryCode]) . '">
                    <div class="card border-0">
                        <div class="card-body d-flex justify-content-between p-4 align-items-center">
                            <div>
                                <div class="d-flex gap-3 align-items-center">
                                    <img src="' . $flagImage . '" alt="Flag of ' . $countryName . '" height="35px" width="45px">
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
                                    <img src="' . $flagImage . '" alt="Flag of ' . $countryName . '" height="35px" width="45px">
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
     * Fetcj a listing of the resource from api.
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
}
