<?php

namespace App\Models\DataContract;

interface ICompany {
    public function getId() : int;
    public function setId(int $id);
    
    public function getName() : string;
    public function setName(string $name);
    
    public function asICompany() : ICompany;
    
    public function asModel() : \Illuminate\Database\Eloquent\Model;
}
