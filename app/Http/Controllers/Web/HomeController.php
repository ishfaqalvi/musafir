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
        try {
            $countries = $this->adminService->getCountries();
            $regions   = $this->adminService->getRegions();

            return view('web.home.index', compact('countries','regions'));
        } catch (\Exception $e) {
            return redirect()->back()->withErrors('Error fetching data: ' . $e->getMessage());
        }
    }
}
