<?php

namespace App\Http\Controllers\Api;

use Response;
use Illuminate\Http\JsonResponse;

class ApiResponse{
    
    protected $statusCode;
    public $data;
    protected $message;
    public $success;
    
    public function asJsonResponse() : JsonResponse{        
        $res = Response::json($this, $this->statusCode);        
        return $res;
    }
    
    public static function createSuccessResponse(int $statusCode, $data, string $msg = "") : ApiResponse{
        $r = new ApiResponse();
        $r->data = $data;
        $r->message = $msg;
        $r->success = true;
        $r->statusCode = $statusCode;
        return $r;
    }
    
    public static function createErrorResponse(int $errorStatusCode, $data, string $msg = "") : ApiResponse{
        $r = new ApiResponse();
        $r->data = $data;
        $r->message = $msg;
        $r->success = false;
        $r->statusCode = $errorStatusCode;
        return $r;
    }
}
