<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Town extends Model
{
    use HasFactory;
    protected $primaryKey = 'town_id';
    function area(){
        return $this->belongsTo(Area::class, 'area_id');
    }
}
