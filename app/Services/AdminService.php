<?php
namespace App\Services;

use Illuminate\Support\Facades\Cache;

class AdminService extends BaseService
{
    public function getDataBundlesCM()
    {
        return Cache::remember('getDataBundlesCM', 60, function () {
            return $this->get('/Admin/GetDataBundlesCM')['details']['dataBundles'];
        });
    }

    public function getCountries()
    {
        return Cache::remember('getCountries', 60, function () {
            return $this->get('/Admin/GetCountries')['data']['details'];
        });
    }

    public function getCountryByCode($code)
    {
        return Cache::remember('getCountryByCode'.$code, 60, function () use($code) {
            return $this->get('/Admin/GetCountryByCode/'.$code)['data']['details'];
        });
    }

    public function getCountriesByRegionCode($regionCode)
    {
        return Cache::remember('getCountriesByRegionCode'.$regionCode, 60, function () use($regionCode) {
            return $this->get('/Admin/GetCountriesByRegionCode/'.$regionCode)['details'];
        });
    }

    public function getRegions()
    {
        return Cache::remember('getRegions', 60, function () {
            return $this->get('/Admin/GetRegions')['data']['details'];
        });
    }

    public function saveContactUs($data)
    {
        $message = 'Something went wrong in saving data';
        $responce = $this->post('/Admin/SaveContactUs', $data);
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
}
