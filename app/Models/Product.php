<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    protected $primaryKey = 'product_id';
    function category(){
        return $this->belongsTo(Category::class, 'category_id');
    }
    function subcategory(){
        return $this->belongsTo(subcategory::class, 'subcategory_id');
    }
}
