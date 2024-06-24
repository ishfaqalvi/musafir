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
        return view('web.auth.login-register.layout');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function register(Request $request)
    {
        $input = $request->all();
        $nameArray = explode(' ', $request->name);
        $input['firstName'] = $nameArray[0];
        $input['lastName'] = $nameArray[1];
        $registerResponce = $this->authService->register($input);
        if($registerResponce['status']){
            /**
             * Login user.
             */
            $input['isSSO'] = false;
            $loginResponce = $this->authService->login($input);
            if($loginResponce['status']){
                /**
                 * User is not active so send otp.
                 */
                $token = $loginResponce['data']['details']['token'];
                $data = ['isEmailVerification' => true, 'email' => $request->email];
                $otpResponce = $this->authService->sendOtp($data, $token);
                $otpResponce['token'] = $token;
                return response()->json($otpResponce);
            }
            return response()->json($loginResponce);
        }
        return response()->json($registerResponce);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function otpForm()
    {
        if(session('api_token'))
        {
            return redirect()->route('profile.accountInfo');
        }
        return view('web.auth.otp-form');
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
        $input['isSSO'] = false;
        $loginResponce = $this->authService->login($input);
        if($loginResponce['status']){
            $token = $loginResponce['data']['details']['token'];
            list($header, $payload, $signature) = explode('.', $token);

            $decodedPayload = base64_decode($payload);

            $data = json_decode($decodedPayload, true);
            if($data['Verified'] != 'False')
            {
                $data['token'] = $token;
                session(['api_token' => $data]);
                $redirectUrl = session('url.intended', route('profile.accountInfo'));
                $responce = ['status' => true, 'type' => 'login', 'data' => $data, 'redirectUrl' => $redirectUrl];
            }else{
                $data = ['isEmailVerification' => true, 'email' => $request->email];
                $otpResponce = $this->authService->sendOtp($data, $token);
                if($otpResponce['status']){
                    $data = ['email' => $request->email, 'password' => $request->password, 'token' => $token];
                    $responce = ['status' => true, 'type' => 'otp', 'data' => $data];
                }else{
                    $responce = $otpResponce;
                }
            }
            return response()->json($responce);
        }
        return response()->json($loginResponce);
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
        return response()->json($responce);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function verifyOTP(Request $request)
    {
        $otpResponce = $this->authService->varifyOtp(['otp' => $request->otp], $request->token);
        if($otpResponce['status']){
            $input = $request->all();
            unset($input['token']);
            $input['isSSO'] = false;
            $loginResponce = $this->authService->login($input);
            if($loginResponce['status']){
                $token = $loginResponce['data']['details']['token'];
                list($header, $payload, $signature) = explode('.', $token);
                $decodedPayload = base64_decode($payload);

                $data = json_decode($decodedPayload, true);
                $data['token'] = $token;
                session(['api_token' => $data]);
                $redirectUrl = session('url.intended', route('profile.accountInfo'));
                return response()->json(['status' => true, 'data' => $data, 'redirectUrl' => $redirectUrl]);
            }
            return response()->json($loginResponce);
        }
        return response()->json($otpResponce);
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
        return response()->json($responce);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function resetPasswordForm()
    {
        if(session('api_token'))
        {
            return redirect()->route('profile.accountInfo');
        }
        return view('web.auth.reset-password');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function resetPassword(Request $request)
    {
        $resetPassResponce = $this->authService->resetPassword($request->all());
        if($resetPassResponce['status']){
            $input = $request->all();
            unset($input['otp']);
            $input['isSSO'] = false;
            $loginResponce = $this->authService->login($input);
            if($loginResponce['status']){
                $token = $loginResponce['data']['details']['token'];
                list($header, $payload, $signature) = explode('.', $token);
                $decodedPayload = base64_decode($payload);

                $data = json_decode($decodedPayload, true);
                $data['token'] = $token;
                session(['api_token' => $data]);
                return response()->json($resetPassResponce);
            }
            return response()->json($loginResponce);
        }
        return response()->json($resetPassResponce);
    }
}
