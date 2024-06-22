<?php
namespace App\Services;

use Illuminate\Support\Facades\Cache;

class AuthService extends BaseService
{
    public function register($data)
    {
        $message = 'Something went wrong in register';
        $responce = $this->post('/Auth/register', $data);
        if(!is_null($responce) && $responce['status'])
        {
            return $responce;
        }else{
            if(isset($responce['data']['details'])){
                $message = $responce['data']['details'];
            }
            if(isset($responce['data']['title'])){
                $message = $responce['data']['title'];
            }
            return ['status' => false, 'message' => $message];
        }
    }

    public function login($data)
    {
        $message = 'Something went wrong in login';
        $responce = $this->post('/Auth/token', $data);
        if(!is_null($responce) && $responce['status'])
        {
            return $responce;
        }else{
            if(isset($responce['data']['details'])){
                $message = $responce['data']['details'];
            }
            return ['status' => false, 'message' => $message];
        }
    }

    public function sendOtp($data, $token)
    {
        $message = 'Something went wrong in sending otp';
        $responce = $this->post('/Auth/send-otp', $data, $token);
        if(!is_null($responce) && $responce['status'])
        {
            return $responce;
        }else{
            if(isset($responce['data']['details'])){
                $message = $responce['data']['details'];
            }
            return ['status' => false, 'message' => $message];
        }
    }

    public function varifyOtp($data, $token)
    {
        $message = 'Something went wrong in varifying otp';
        $responce = $this->post('/Auth/verify-otp', $data, $token);
        if(!is_null($responce) && $responce['status'])
        {
            return $responce;
        }else{
            if(isset($responce['data']['details'])){
                $message = $responce['data']['details'];
            }
            return ['status' => false, 'message' => $message];
        }
    }

    public function forgotPassword($data)
    {
        $message = 'Something went wrong in forgot password';
        $responce = $this->post('/Auth/forgot-password', $data);
        if(!is_null($responce) && $responce['status'])
        {
            return $responce;
        }else{
            if(isset($responce['data']['details'])){
                $message = $responce['data']['details'];
            }
            return ['status' => false, 'message' => $message];
        }
    }

    public function resetPassword($data)
    {
        $message = 'Something went wrong in reset password';
        $responce = $this->post('/Auth/reset-password', $data);
        if(!is_null($responce) && $responce['status'])
        {
            return $responce;
        }else{
            if(isset($responce['data']['details'])){
                $message = $responce['data']['details'];
            }
            return ['status' => false, 'message' => $message];
        }
    }
}
