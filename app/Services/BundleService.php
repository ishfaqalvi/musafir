<?php
namespace App\Services;

class BundleService extends BaseService
{
    public function getAllBundles()
    {
        return $this->get('/Bundles/GetAllBundles')['details'];
    }

    public function getFilterBundles($params)
    {
        return $this->get('/Bundles/GetFilteredBundles', $params)['details'];
    }
}
