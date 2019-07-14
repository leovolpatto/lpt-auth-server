<?php

namespace Models;

use Eloquent as Model;

final class Company extends Model implements \App\Models\ICompany{
    
    protected $table = 'companies';
    protected $hidden = ['id'];
    
    protected $casts = [
        'id' => 'integer',
        'name' => 'string'
    ];
    
    protected $fillable = [
        'name'
    ];
    
    public function getId(): int {
        return $this['id'];        
    }

    public function getName(): string {
        return $this['name'];
    }

    public function setId(int $id) {
        $this['id'] = $id;
    }

    public function setName(string $name) {
        $this['name'] = $name;
    }

    public function asICompany(): \App\Models\ICompany {
        return $this;
    }

    public function asModel(): \Illuminate\Database\Eloquent\Model {
        return $this;
    }

}
