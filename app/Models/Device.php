<?php

namespace Models;

use Eloquent as Model;

final class Device extends Model implements \App\Models\IDevice{
    
    protected $table = 'devices';
    protected $hidden = ['id'];
    
    protected $casts = [
        'id' => 'integer',
        'code' => 'string',
        'name' => 'string',
        'mac_address' => 'string',
        'device_id' => 'string'
    ];
    
    protected $fillable = [
        'code',
        'name',
        'mac_address',
        'device_id'
    ];
    
    public function asIDevice(): \App\Models\IDevice {
        return $this;
    }

    public function asModel(): \Illuminate\Database\Eloquent\Model {
        return $this;
    }

    public function getDeviceId(): string {
        return $this['device_id'];
    }

    public function getId(): int {
        return $this['id'];
    }

    public function getMacAddress(): string {
        return $this['mac_address'];
    }

    public function getName(): string {
        return $this['name'];
    }

    public function setDeviceId(string $id) {
        $this['device_id'] = $id;
    }

    public function setId(int $id) {
        $this['id'] = $id;
    }

    public function setMacAddress(string $ma) {
        $this['mac_address'] = $ma;
    }

    public function setName(string $name) {
        $this['name'] = $name;
    }

}
