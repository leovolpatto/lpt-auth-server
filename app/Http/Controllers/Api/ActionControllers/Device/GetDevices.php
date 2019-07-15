<?php

namespace App\Http\Controllers\Api\ActionControllers\Device;

use App\Http\Controllers\Api\ActionControllers\BaseActionController;

final class GetDevices extends BaseActionController {
        
    protected function executeAction() {
        $this->subject = \App\Models\Device::all();
    }
    
    protected function makeResponse(): \Symfony\Component\HttpFoundation\Response {        
        return \App\Http\Controllers\Api\ApiResponse::createSuccessResponse(200, $this->subject->toArray())
                ->asJsonResponse();
    }

    protected function setSubject() {
        $this->subject = null;
    }

    protected function validateRequest(): bool {
        return true;
    }

}
