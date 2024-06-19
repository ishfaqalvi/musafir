<?php
namespace App\Services;

use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;

class BaseService
{
    protected $baseUrl;

    public function __construct()
    {
        $this->baseUrl = env('API_BASE_URL');
    }

    protected function get($endpoint, $params = [])
    {
        try {
            $response = Http::get($this->baseUrl . $endpoint, $params);
            return $this->handleResponse($response);
        } catch (\Exception $e) {
            return $this->handleException($e);
        }
    }

    protected function post($endpoint, $data = [], $token = null) {
        try {
            if(!is_null($token)){
                $response = Http::withHeaders([
                    'Authorization' => 'Bearer ' . $token,
                ])->post($this->baseUrl . $endpoint, $data);
            }else{
                $response = Http::post($this->baseUrl . $endpoint, $data);
            }
            return $this->handleResponse($response);
        } catch (\Exception $e) {
            return $this->handleException($e);
        }
    }


    private function handleResponse($response)
    {
        if ($response->successful()) {
            return ['status' => true, 'data' => $response->json()];
        } else {
            Log::error('API error: ' . $response->body());
            return ['status' => false, 'data' => json_decode($response->body(), true)];
        }
    }

    private function handleException($e)
    {
        Log::error('API exception: ' . $e->getMessage());
        return null;
    }
}
