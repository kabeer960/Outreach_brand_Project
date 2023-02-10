<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class shopsubcategory extends Model
{
    use HasFactory;
    protected $primaryKey = 'shop_subcategory_id';
    function shopcategory(){
        return $this->belongsTo(Shopcategory::class, 'shop_category_id');
    
    }
}
