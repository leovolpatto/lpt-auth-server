<?php

namespace App\Http\Controllers\Api\ActionControllers;

use \Illuminate\Http\Request;
use App\Http\Controllers\Api\ApiResponse;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use App\Http\Controllers\Api\ActionControllers\IApiResponsable;

abstract class BaseActionController implements IApiResponsable {
    
    /**
     * @var Request
     */
    protected $request;
    
    /**
     * @var \Symfony\Component\HttpFoundation\Response
     */
    protected $response;    
    protected $subject;    
    protected $args = array();

    public function __construct(Request $request, $args = array()) {
        $this->request = $request;
        $this->args = $args;
    }
    
    protected abstract function executeAction();
    
    protected abstract function makeResponse() : \Symfony\Component\HttpFoundation\Response;
    
    protected abstract function setSubject();

    protected abstract function validateRequest() : bool;

    public function execute(): \Symfony\Component\HttpFoundation\Response {
        try {
            $this->setSubject();
            $this->validateRequest();
            $this->executeAction();
            $this->response = $this->makeResponse();            
        } catch (ModelNotFoundException $notFound) {
            $this->response = ApiResponse::createErrorResponse(404, null, $notFound->getModel() . ' not found')->asJsonResponse();
        } catch (\Exception $ex) {
            $this->response = ApiResponse::createErrorResponse(500, $this->subject, $ex->getMessage())->asJsonResponse();
        }
        
        return $this->response;
    }    
    
}
