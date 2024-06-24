<?php
namespace App\Services;

use Illuminate\Support\Facades\Cache;

class PaymentService extends BaseService
{
    public function savePaymentInfo($data, $token)
    {
        return $this->post('/Payment/SavePaymentInfo', $data, $token)['details']['dataBundles'];
    }

    public function getPayments($token)
    {
        return $this->get('/Payment/GetUserSubscriptionsPayments', [], $token)['data']['details'];
    }
}
