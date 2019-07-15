<?php

namespace App\Models;

use Eloquent as Model;

final class CompanyDevice extends Model implements \App\Models\DataContract\ICompanyDevice {
    
    protected $table = 'company_devices';
    protected $hidden = ['id'];
    
    protected $casts = [
        'company_id' => 'integer',
        'device_id' => 'integer',
        'name' => 'string',
        'base_topic' => 'string',
        'is_enabled' => 'boolean'
    ];
    
    protected $fillable = [
        'company_id',
        'device_id',
        'name',
        'base_topic',
        'is_enabled'
    ];
    
    public function asICompanyDevice(): \App\Models\DataContract\ICompanyDevice {
        return $this;
    }

    public function asModel(): \Illuminate\Database\Eloquent\Model {
        return $this;
    }

    public function getBaseTopic(): string {
        return $this['base_topic'];
    }

    public function getCompanyId(): int {
        return $this['company_id'];
    }

    public function getDeviceId(): int {
        return $this['device_id'];
    }

    public function getId(): int {
        return $this['id'];
    }

    public function getIsEnabled(): bool {
        return $this['is_enabled'];
    }

    public function getName(): string {
        return $this['namec'];
    }

    public function setBaseTopic(string $topic) {
        $this['base_topic'] = $topic;
    }

    public function setCompanyId(int $companyId) {
        $this['company_id'] = $companyId;
    }

    public function setDeviceId(int $deviceId) {
        $this['device_id'] = $deviceId;
    }

    public function setId(int $id) {
        $this['id'] = $id;
    }

    public function setIsEnabled(bool $enabled) {
        $this['is_enabled'] = $enabled;
    }

    public function setName(string $name) {
        $this['name'] = $name;
    }

}
