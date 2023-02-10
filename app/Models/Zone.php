<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Zone extends Model
{
    use HasFactory;
    protected $primaryKey = 'zone_id';
    function City(){
        return $this->belongsTo(City::class, 'city_id');
    }

}
