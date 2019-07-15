<?php

namespace App\Models\DataContract;

interface IDeviceLoginAttempt {
    
    public function getId() : int;
    public function setId(int $id);
    
    public function getDeviceId() : int;
    public function setDeviceId(int $id);
    
    public function getLastToken() : string;
    public function setLastToken(string $token);
    
    public function getLastError() : string;
    public function setLastError(string $er);
    
    public function getLastLogin() : \DateTime;
    public function setLastLogin(\DateTime $date);
    
    public function getLastIp() : string;
    public function setLastIp(string $ip);
    
    
    public function asIDeviceLoginAttempt() : IDeviceLoginAttempt;
    
    public function asModel() : \Illuminate\Database\Eloquent\Model;    
    
}
