<?php

namespace App\Http\Controllers\Web;

use Illuminate\Http\Request;
use App\Services\UserService;
use App\Services\PaymentService;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Session;

class ProfileController extends Controller
{
    protected $userService;
    protected $payment;

    public function __construct(
        UserService $userService,
        PaymentService $payment
    )
    {
        $this->userService = $userService;
        $this->payment = $payment;
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
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
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
        return redirect()->route('auth.login-register');
    }
}
