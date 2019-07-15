<?php

namespace App\Helpers;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Collection;

final class NamingCaseHelper {
    
    private $object;
    
    public function __construct($subject) {
        $this->object = $subject;
    }

    private function objectToArray($object) : array {
        if($object instanceof Model){
            return $object->toArray();
        }
        
        return get_object_vars($object);
    }
    
    private function arrayToCamelCasedArray(array $array) : array{
        $camelArray = array();
        foreach ($array as $name => $value) {
            if (is_array($value)) {
                $camelArray[camel_case($name)] = $this->arrayToCamelCasedArray($value);
                continue;
            }
            
            if(is_object($value)){
                if($value instanceof Collection || $value instanceof Model){
                    $value = $value->toArray();
                    $camelArray[camel_case($name)] = $this->arrayToCamelCasedArray($value);
                }
                else{
                    $camelArray[camel_case($name)] = $this->arrayToCamelCasedArray($this->objectToArray($value));
                }
                continue;                
            }
            
            $camelArray[camel_case($name)] = $value;
        }
        return $camelArray;
    }
    
    public function toCamelCasedArray() {
        if (is_object($this->object)) {
            return $this->arrayToCamelCasedArray($this->objectToArray($this->object));
        }
        
        if(is_array($this->object)){        
            return $this->arrayToCamelCasedArray($this->object);
        }
        
        return $this->object;
    }

}
