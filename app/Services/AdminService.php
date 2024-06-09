<?php
namespace App\Services;

class AdminService extends BaseService
{
    public function getDataBundlesCM()
    {
        return $this->get('/Admin/GetDataBundlesCM')['details']['dataBundles'];
    }

    public function getCountries()
    {
        return $this->get('/Admin/GetCountries')['details'];
    }

    public function getCountryByCode($code)
    {
        return $this->get('/Admin/GetCountryByCode/'.$code)['details'];
    }

    public function getCountriesByRegionCode($regionCode)
    {
        return $this->get('/Admin/GetCountriesByRegionCode/'.$regionCode)['details'];
    }

    public function getRegions()
    {
        return $this->get('/Admin/GetRegions')['details'];
    }
}
