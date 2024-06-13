<?php
namespace App\Services;

use Illuminate\Support\Facades\Cache;

class BundleService extends BaseService
{
    public function getAllBundles()
    {
        return Cache::remember('getAllBundles', 60, function () {
            return $this->get('/Bundles/GetAllBundles')['details'];
        });
    }

    public function getFilterBundles($params)
    {
        $filter = '';
        foreach($params as $str)
        {
            $filter = $filter.$str;
        }
        return Cache::remember('getFilterBundles'.$filter, 60, function () use($params){
            return $this->get('/Bundles/GetFilteredBundles', $params)['details'];
        });
    }
}
