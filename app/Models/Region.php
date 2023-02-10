<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Region extends Model
{
    use HasFactory;
    protected $primaryKey = 'region_id';
    function zone(){
        return $this->belongsTo(Zone::class, 'zone_id');
    }
}
