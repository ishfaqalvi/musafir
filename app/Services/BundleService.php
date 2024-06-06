<?php
namespace App\Services;

class BundleService extends BaseService
{
    public function getAllBundles()
    {
        return $this->get('/Bundles/GetAllBundles');
    }

    public function getFilterBundles()
    {
        return $this->get('/Bundles/GetFilteredBundles');
    }
}
