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
        try {
            $perameters = $request->all();
            $countries  = $this->adminService->getCountries();
            $regions    = $this->adminService->getRegions();
            $plans      = $this->bundleService->getFilterBundles($perameters);

            if($perameters['type'] == 'regional')
            {
                $filterBy = ['region' => $request->name];
            }else
            {
                $filterBy = $this->adminService->getCountryByCode($perameters['country']);
            }
            // dd($plans);
            // dd($perameters,$filterBy, $plans);
            return view('web.plan.index', compact('countries','regions','plans','perameters','filterBy'));
        } catch (\Exception $e) {
            return redirect()->back()->withErrors('Error fetching users: ' . $e->getMessage());
        }

    }
}
