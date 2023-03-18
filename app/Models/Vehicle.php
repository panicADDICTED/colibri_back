<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Vehicle extends Model
{
    use HasFactory;
    

    public function user()
    {
        $this->belongsTo('App\User','vehicle_id','id');
    }
    public function conductor()
    {
        return $this->hasOne(User::class,'vehicle_id', 'id');
    }

    public function freights()
    {
        return $this->hasMany(Freight::class,'vehicle_id', 'id');
    }
}
