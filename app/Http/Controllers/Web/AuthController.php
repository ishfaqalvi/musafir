<?php

namespace App\Http\Controllers\Web;

use Illuminate\Http\Request;
use App\Services\AuthService;
use App\Http\Controllers\Controller;

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
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function sendEmail()
    {
        $token = "eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCJ9.eyJVc2VySWQiOiI1NyIsIm5hbWUiOiJ0ZXN0ZGV2IiwiRmlyc3ROYW1lIjoiVGVzdCIsIkxhc3ROYW1lIjoiRGV2IiwiVmVyaWZpZWQiOiJGYWxzZSIsIlVzZXJJZFNTTyI6IiIsIklzU1NPIjoiRmFsc2UiLCJUeXBlU1NPIjoiIiwiZW1haWwiOiJsaW5rcGxheWVyMDYyQGdtYWlsLmNvbSIsImp0aSI6IjNiOTkyMTVmLTcxYWYtNDJjOC05Zjc3LWFkMGY3YTFiNTg1OCIsImV4cCI6MTc0OTk5MjUzNiwiaXNzIjoiRVNJTSIsImF1ZCI6IkVTSU0ifQ.2G2g950uZsesxmjEpC8q-6OZDHB7vF3REkCQ2Ka07xE";
        $data = [
            'isEmailVerification' => true,
            'email'     => 'linkplayer062@gmail.com'
        ];
        $responce = $this->authService->sendOtp($data, $token);
        dd($responce);
    }
}
