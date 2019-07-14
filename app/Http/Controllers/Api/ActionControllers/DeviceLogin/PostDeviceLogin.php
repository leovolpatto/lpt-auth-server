<?php

namespace App\Http\Controllers\Api\ActionControllers\DeviceLogin;

use App\Http\Controllers\Api\ActionControllers\BaseActionController;

final class PostDeviceLogin extends BaseActionController {

    protected function executeAction() {
        
    }

    protected function makeResponse(): \Symfony\Component\HttpFoundation\Response {
        return \App\Http\Controllers\Api\ApiResponse::createSuccessResponse(200, 'teste')
                ->asJsonResponse();
    }

    protected function setSubject() {
        $this->subject = 'leo';
    }

    protected function validateRequest(): bool {
        return true;
    }

}
