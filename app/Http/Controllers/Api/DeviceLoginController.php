<?php

namespace App\Http\Controllers\Api;

use \Illuminate\Http\Request;
use \Symfony\Component\HttpFoundation\Response;
use App\Http\Controllers\Api\ActionControllers\Device\GetDevices;
use App\Http\Controllers\Api\ActionControllers\Device\PostDevice;
use App\Http\Controllers\Api\ActionControllers\DeviceLogin\PostDeviceLogin;

final class DeviceLoginController {
 
    public function loginDevice(Request $request) : Response{
        return (new PostDeviceLogin($request))->execute();
    }    
  
    public function postDevice(Request $request) : Response{
        return (new PostDevice($request))->execute();
    }
  
    public function getDevices(Request $request) : Response{
        return (new GetDevices($request))->execute();
    }
    
}
