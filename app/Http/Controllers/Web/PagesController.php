<?php

namespace App\Http\Controllers\Web;

use Illuminate\Http\Request;
use App\Services\AdminService;
use App\Http\Controllers\Controller;

class PagesController extends Controller
{
    protected $adminService;

    public function __construct(AdminService $adminService)
    {
        $this->adminService = $adminService;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function aboutUs()
    {
        return view('web.about-us.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function contactUs()
    {
        return view('web.contact-us.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function contactUsSave(Request $request)
    {
        $responce = $this->adminService->saveContactUs($request->all());
        return response()->json($responce);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function privacyPolicy()
    {
        return view('web.privacy-policy.index');
    }
}
