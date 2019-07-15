<?php

namespace App\Http\Controllers\Api\ActionControllers\Device;

use App\Http\Controllers\Api\ActionControllers\BaseActionController;

final class PostDevice extends BaseActionController {
    
    private $alreadyExists = false;
        
    protected function executeAction() {
        $inp = $this->request->input();
        try{
            $this->alreadyExists = $this->isDeviceCreated($inp['deviceId'], $inp['macAddress']);
        } catch (\Exception $ex) {
            $this->createDevice();
        }
    }
    
    private function createDevice(){
        $inp = $this->request->input();
        
        $d = new \App\Models\Device();
        $d->setDeviceId($inp['deviceId']);
        $d->setMacAddress($inp['macAddress']);
        $d->setName('');
        
        $this->subject = $d;
        
        $d->save();
    }
    
    private function isDeviceCreated(string $deviceId, string $mac) : bool{
        $device = \App\Models\Device::where([
            ['device_id', '=', $deviceId],
            ['mac_address', '=', $mac],
        ])->firstOrFail();
        
        $this->subject = $device;
        return true;
    }
    
    protected function makeResponse(): \Symfony\Component\HttpFoundation\Response {
        return \App\Http\Controllers\Api\ApiResponse::createSuccessResponse(200, "")
                ->asJsonResponse();
    }

    protected function setSubject() {
        $this->subject = null;
    }

    protected function validateRequest(): bool {
        $required = ['deviceId', 'macAddress'];        
        return $this->validateInputRequiredFields($required);
    }

}