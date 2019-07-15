<?php

namespace App\Http\Controllers\Api\ActionControllers\DeviceLogin;

use DB;
use App\Models\CompanyDevice;
use App\Http\Controllers\Api\ActionControllers\BaseActionController;

final class PostDeviceLogin extends BaseActionController {

    private $model;
    
    /**
     * @var CompanyDevice
     */
    private $companyDevice;
    
    protected function executeAction() {
        $inp = $this->request->input();
        $this->isDeviceCreated($inp['deviceId'], $inp['macAddress']);

        $this->companyDevice = CompanyDevice::where('device_id', '=', $this->subjectAsDevice()->getId())->first();
    }
    
    private function isDeviceCreated(string $deviceId, string $mac) : bool{
        $device = \App\Models\Device::where([
            ['device_id', '=', $deviceId],
            ['mac_address', '=', $mac],
        ])->firstOrFail();
        
        $this->subject = $device;
        return true;
    }
    
    private function subjectAsDevice() : \App\Models\DataContract\IDevice{
        return $this->subject;
    }

    private function createLoginAttempt(string $token){
        $login = new \App\Models\DeviceLoginAttempt();
        $login->setDeviceId($this->companyDevice->getDeviceId());
        $login->setLastError('');
        $login->setLastIp($this->request->getClientIp());
        $login->setLastLogin(new \DateTime());
        $login->setLastToken($token);
        
        $login->save();
    }
    
    protected function makeResponse(): \Symfony\Component\HttpFoundation\Response {
        if($this->companyDevice == null){
            return \App\Http\Controllers\Api\ApiResponse::createErrorResponse(403, "", "Device not associated")
                    ->asJsonResponse();
        }
        
        if(!$this->companyDevice->getIsEnabled()){
            return \App\Http\Controllers\Api\ApiResponse::createErrorResponse(401, "", "Device not enabled")
                    ->asJsonResponse();
        }
        
        $token = (string) random_int(0, 9999999);
        $this->createLoginAttempt($token);
        
        $resp = new DeviceLoginResult();
        $resp->token = $token;
        $resp->baseTopic = $this->companyDevice->getBaseTopic();
        
        return \App\Http\Controllers\Api\ApiResponse::createSuccessResponse(200, $resp)
                ->asJsonResponse();
    }

    protected function setSubject() {
        $this->subject = null;
    }

    protected function validateRequest(): bool {
        $required = ['deviceId', 'macAddress', 'token'];        
        return $this->validateInputRequiredFields($required);
    }

}

class DeviceLoginResult {
    public $token;
    public $baseTopic;
}