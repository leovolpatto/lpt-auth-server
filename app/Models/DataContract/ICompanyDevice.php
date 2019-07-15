<?php

namespace App\Models\DataContract;

interface ICompanyDevice {
    
    public function getId() : int;
    public function setId(int $id);
    
    public function getCompanyId() : int;
    public function setCompanyId(int $companyId);
    
    public function getDeviceId() : int;
    public function setDeviceId(int $deviceId);
    
    public function getName() : string;
    public function setName(string $name);
    
    public function getBaseTopic() : string;
    public function setBaseTopic(string $topic);
    
    public function getIsEnabled() : bool;
    public function setIsEnabled(bool $enabled);
        
    public function asICompanyDevice() : ICompanyDevice;
    
    public function asModel() : \Illuminate\Database\Eloquent\Model;    
}
