<?php

namespace App\Http\Controllers\Web;

use Illuminate\Http\Request;
use App\Services\UserService;
use App\Services\PaymentService;
use App\Services\SubscriptionService;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Session;

class ProfileController extends Controller
{
    protected $userService;
    protected $payment;
    protected $subscription;

    public function __construct(
        UserService $userService,
        PaymentService $payment,
        SubscriptionService $subscription
    )
    {
        $this->userService = $userService;
        $this->payment = $payment;
        $this->subscription = $subscription;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function accountInfoForm()
    {
        return view('web.profile.account-info');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function accountInfo(Request $request)
    {
        $token = session('api_token')['token'];
        $responce = $this->userService->saveUser($request->all(), $token);
        if($responce['status']){
            $data = $responce['data'];
            $data['token'] = $token;
            session(['api_token' => $data]);
            return response()->json(['status' => true, 'data' => $data]);
        }
        return response()->json($responce);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function payments()
    {
        return view('web.profile.payment');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function paymentData()
    {
        $token = session('api_token')['token'];
        $records = $this->payment->getPayments($token);
        $data = view('web.render.payments', ['records' => $records])->render();
        return response()->json($data);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function subscribedBundles()
    {
        return view('web.profile.subscribed-bundles');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function usedBundles()
    {
        return view('web.profile.used-bundles');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function activateBundles()
    {
        return view('web.profile.activate-bundles');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function bundlesData(Request $request)
    {
        $token = session('api_token')['token'];
        $records = $this->subscription->subscriptionsCategory($token);
        $data = view('web.render.bundles', ['records' => $records[$request->type], 'type' => $request->type])->render();
        return response()->json($data);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function esimInfo(Request $request)
    {
        $token = session('api_token')['token'];
        $responce = $this->subscription->getEsimInfo($request->id, $token);
        return response()->json($responce);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function logout()
    {
        Session::forget('api_token');
        return redirect()->route('home.index');
    }
}
