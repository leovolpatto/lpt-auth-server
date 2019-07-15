<?php

namespace App\Models;

use Eloquent as Model;

final class DeviceLoginAttempt extends Model implements \App\Models\DataContract\IDeviceLoginAttempt{
    
    protected $table = 'device_login_attempt';
    protected $dates = ['last_login'];
    protected $hidden = ['id'];
    
    protected $casts = [
        'id' => 'integer',
        'device_id' => 'integer',
        'last_token' => 'string',
        'last_error' => 'string',
        'last_login' => 'datetime:c',
        'last_ip' => 'string'
    ];
    
    protected $fillable = [
        'device_id',
        'last_token',
        'last_error',
        'last_login',
        'last_ip'
    ];
    
    public function asIDeviceLoginAttempt(): \App\Models\DataContract\IDeviceLoginAttempt {
        return $this;
    }

    public function asModel(): \Illuminate\Database\Eloquent\Model {
        return $this;
    }

    public function getDeviceId(): int {
        return $this['device_id'];
    }

    public function getId(): int {
        return $this['id'];
    }

    public function getLastError(): string {
        return $this['last_error'];
    }

    public function getLastIp(): string {
        return $this['last_ip'];
    }

    public function getLastLogin(): \DateTime {
        return $this['last_login'];
    }

    public function getLastToken(): string {
        return $this['last_token'];
    }

    public function setDeviceId(int $id) {
        $this['device_id'] = $id;
    }

    public function setId(int $id) {
        $this['id'] = $id;
    }

    public function setLastError(string $er) {
        $this['last_error'] = $er;
    }

    public function setLastIp(string $ip) {
        $this['last_ip'] = $ip;
    }

    public function setLastLogin(\DateTime $date) {
        $this['last_login'] = $date;
    }

    public function setLastToken(string $token) {
        $this['last_token'] = $token;
    }

}
