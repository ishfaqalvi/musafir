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
    public function commingSoon()
    {
        return view('web.home.commingSoon');
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

    /**
     * Fetch a listing of the resource from api.
     *
     * @return \Illuminate\Http\Response
     */
    public function search(Request $request)
    {
        $keyword = $request->keyword;
        $countries = $this->adminService->getCountries();
        $filteredCountries = array_filter($countries, function ($country) use ($keyword) {
            return stripos($country['countryName'], $keyword) !== false;
        });
        $regions = $this->adminService->getRegions();
        $filteredRegions = array_filter($regions, function ($region) use ($keyword) {
            return stripos($region['region'], $keyword) !== false;
        });
        $data = view('web.render.search-result', ['regions' => $filteredRegions, 'countries' => $filteredCountries])->render();
        return response()->json($data);
    }
}
