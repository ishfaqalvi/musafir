<?php
namespace App\Services;

use Illuminate\Support\Facades\Cache;

class UserService extends BaseService
{
    public function saveUser($data, $token)
    {
        $message = 'Something went wrong in saving user';
        $responce = $this->post('/User', $data, $token);
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
