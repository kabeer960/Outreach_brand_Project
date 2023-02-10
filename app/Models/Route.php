<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Route extends Model
{
    use HasFactory;
    protected $primaryKey = 'route_id';
    function town(){
        return $this->belongsTo(Town::class, 'town_id');
    }
}
