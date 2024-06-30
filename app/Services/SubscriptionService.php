<?php
namespace App\Services;

class SubscriptionService extends BaseService
{
    public function subscriptionsCategory($token)
    {
        return $this->get('/Subscription/GetUserSubscriptionsCategory', [], $token)['data']['details'];
    }

    public function getEsimInfo($id, $token)
    {
        return $this->get('/Subscription/GetEsimInfo/'.$id, [], $token)['data']['details'];
    }

    public function subscribePackage($data, $token)
    {
        $message = 'Something went wrong in subscribing package!';
        $responce = $this->post('/Subscription/SubscribePackage', $data, $token);
        if(!is_null($responce) && $responce['status'])
        {
            return $responce;
        }else{
            if(isset($responce['data']['details'])){
                $message = $responce['data']['details'];
            }
            return ['status' => false, 'message' => $message];
        }
    }
}
