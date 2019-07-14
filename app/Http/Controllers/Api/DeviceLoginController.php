<?php

namespace App\Http\Controllers\Api;

use \Illuminate\Http\Request;
use \Symfony\Component\HttpFoundation\Response;
use App\Http\Controllers\Api\ActionControllers\DeviceLogin\PostDeviceLogin;

final class DeviceLoginController {
 
    public function loginDevice(Request $request) : Response{
        return (new PostDeviceLogin($request))->execute();
    }    
    
}
