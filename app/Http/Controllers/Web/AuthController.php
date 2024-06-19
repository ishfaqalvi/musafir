<?php

namespace App\Http\Controllers\Web;

use Illuminate\Http\Request;
use App\Services\AuthService;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Session;

class AuthController extends Controller
{
    protected $authService;

    public function __construct(AuthService $authService)
    {
        $this->authService = $authService;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function loginRegisterForm ()
    {
        if(session('api_token'))
        {
            return redirect()->route('profile.accountInfo');
        }
        return view('web.auth.login-register');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function register(Request $request)
    {
        $responce = $this->authService->register($request->all());
        if(!is_null($responce)){
            return response()->json(['status' => true, 'data' => $responce]);
        }else{
            return response()->json(['status' => false, 'message' => 'Something went wrong!']);
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function login(Request $request)
    {
        $input = $request->all();
        $input['isSSO'] = true;
        $responce = $this->authService->login($input);
        if(!is_null($responce)){
            $token = $responce['data']['details']['token'];
            list($header, $payload, $signature) = explode('.', $token);

            $decodedPayload = base64_decode($payload);

            $data = json_decode($decodedPayload, true);
            $data['token'] = $token;
            if($data['Verified'] != 'False')
            {
                session(['api_token' => $data]);
            }
            return response()->json(['status' => true, 'data' => $data]);
        }else{
            return response()->json(['status' => false, 'message' => 'Something went wrong!']);
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function sendOtp(Request $request)
    {
        $data = ['isEmailVerification' => true, 'email' => $request->email];
        $responce = $this->authService->sendOtp($data, $request->token);
        if(!is_null($responce)){
            return response()->json(['status' => true, 'data' => $responce]);
        }else{
            return response()->json(['status' => false, 'message' => 'Something went wrong!']);
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function verifyOTP(Request $request)
    {
        $responce = $this->authService->varifyOtp(['otp' => $request->otp], $request->token);
        if(!is_null($responce)){
            return response()->json(['status' => true, 'data' => $responce]);
        }else{
            return response()->json(['status' => false, 'message' => 'Something went wrong!']);
        }
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function forgotPasswordForm()
    {
        if(session('api_token'))
        {
            return redirect()->route('profile.accountInfo');
        }
        return view('web.auth.forgot-password');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function forgotPassword(Request $request)
    {
        $responce = $this->authService->forgotPassword($request->all());
        if(!is_null($responce)){
            return response()->json(['status' => true, 'data' => $responce]);
        }else{
            return response()->json(['status' => false, 'message' => 'Something went wrong!']);
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function resetPassword(Request $request)
    {
        $responce = $this->authService->resetPassword($request->all());
        if(!is_null($responce)){
            return response()->json(['status' => true, 'data' => $responce]);
        }else{
            return response()->json(['status' => false, 'message' => 'Something went wrong!']);
        }
    }
}
