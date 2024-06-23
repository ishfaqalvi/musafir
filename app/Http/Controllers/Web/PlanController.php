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
     * Display data into iframe.
     *
     * @return \Illuminate\Http\Response
     */
    public function buyNow(Request $request)
    {
        $amount = $request->input('amount');
        $currency = $request->input('currency');
        $package = $request->input('package');
        $packageId = $request->input('packageId');
        $token = session('api_token')['token'];
        $url = [
            'baseurl' => "http://griffin26-001-site10.atempurl.com/checkout.html?",
            'amount' => urlencode($amount),
            'currency' => urlencode($currency),
            'package' => urlencode($package),
            'packageId' => urlencode($packageId),
            'token' => urlencode($token)
        ];
        // $link = $url['baseurl'].'amount='.$url['amount'].'&currency='.$url['currency'].'&package='.$url['package'].'&packageId='.$url['packageId'].'&token='.$url['token'];
        // return redirect()->to($link);
        return view('web.plan.buy-now', compact('url'));
    }

    /**
     * Fetch a listing of the resource from api.
     *
     * @return \Illuminate\Http\Response
     */
    public function fetchPlansData($perameters)
    {
        $plans = $this->bundleService->getFilterBundles($perameters);
        if($perameters['type'] != 'regional')
        {
            $category     = $this->adminService->getCountryByCode($perameters['country']);
            $countryName  = htmlspecialchars($category['countryName'], ENT_QUOTES, 'UTF-8');
            $flagImage    = asset('images/country-flag/'.strtolower($category['countryCode']).'.png');
        }
        $data = view('web.render.plans', [
            'perameters' => $perameters,
            'type' => $perameters['type'],
            'name' => $parameters['name'] ?? '',
            'countryName' => $countryName ?? '',
            'flagImage' => $flagImage ?? '',
            'plans' => $plans,
            'filterByName' => $countryName ?? $perameters['name']
        ])->render();
        return $data;
    }

    /**
     * Fetch a listing of the resource from api.
     *
     * @return \Illuminate\Http\Response
     */
    public function countriesList(Request $request)
    {
        $countries = $this->adminService->getCountries();
        $list = $request->page == 'first' ? array_slice($countries, 0, 12) : array_slice($countries, 12);
        $data = view('web.render.countries', ['countries' => $list, 'type' => $request->type])->render();
        return response()->json($data);
    }

    /**
     * Fetch a listing of the resource from api.
     *
     * @return \Illuminate\Http\Response
     */
    public function regionsList()
    {
        $regions = $this->adminService->getRegions();
        $data = view('web.render.regions', ['regions' => $regions])->render();
        return response()->json($data);
    }
}
