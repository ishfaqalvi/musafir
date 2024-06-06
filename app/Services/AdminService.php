<?php
namespace App\Services;

class AdminService extends BaseService
{
    public function getDataBundlesCM()
    {
        return $this->get('/Admin/GetDataBundlesCM');
    }

    public function getFilterBundles()
    {
        return $this->get('/users');
    }
}
