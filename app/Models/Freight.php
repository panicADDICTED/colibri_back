<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Freight extends Model
{
    use HasFactory;
    
    public function client()
    {
        return $this->hasOne(User::class,'id', 'client_id');
    }
    public function material()
    {
        return $this->hasOne(Material::class,'id', 'material_id');
    }

    public function vehicle()
    {
        return $this->hasOne(Vehicle::class,'id', 'vehicle_id');
    }
}


