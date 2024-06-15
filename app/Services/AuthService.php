<?php
namespace App\Services;

use Illuminate\Support\Facades\Cache;

class AuthService extends BaseService
{
    public function register($data)
    {
        return $this->post('/Auth/register', $data);
    }

    public function login($data)
    {
        return $this->post('/Auth/token', $data);
    }

    public function sendOtp($data, $token)
    {
        return $this->post('/Auth/send-otp', $data, $token);
    }

    public function varifyOtp($data, $token)
    {
        return $this->post('/Auth/verify-otp', $data, $token);
    }
}
