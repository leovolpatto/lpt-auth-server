<?php

namespace App\Http\Controllers\Api\ActionControllers;

interface IApiResponsable {
    
    public function execute() : \Symfony\Component\HttpFoundation\Response;
    
}
