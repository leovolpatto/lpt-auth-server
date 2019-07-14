<?php

namespace App\Models;

interface IDevice {
    
    public function getId() : int;
    public function setId(int $id);
    
    public function setName(string $name);
    public function getName() : string;
    
    public function getMacAddress() : string;
    public function setMacAddress(string $ma);
    
    public function getDeviceId() : string;
    public function setDeviceId(string $id);
 
    
    public function asIDevice() : IDevice;
    
    public function asModel() : \Illuminate\Database\Eloquent\Model;    
}
