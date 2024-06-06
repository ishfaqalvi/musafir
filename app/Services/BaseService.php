<?php
namespace App\Services;

use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;

class BaseService
{
    protected $baseUrl;

    public function __construct()
    {
        $this->baseUrl = config('services.api_base_url');
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

    protected function post($endpoint, $data = [])
    {
        try {
            $response = Http::post($this->baseUrl . $endpoint, $data);
            return $this->handleResponse($response);
        } catch (\Exception $e) {
            return $this->handleException($e);
        }
    }

    private function handleResponse($response)
    {
        if ($response->successful()) {
            return $response->json();
        } else {
            Log::error('API error: ' . $response->body());
            return null; // or throw an exception
        }
    }

    private function handleException($e)
    {
        Log::error('API exception: ' . $e->getMessage());
        return null; // or throw an exception
    }
}
