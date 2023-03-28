<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    protected $fillable=[
        'name',
        'cat_id',
        'subcat_id',
        'productbrand_id',
        'description',
        'price',
        'image',
        'discount',
        'size',
        'stock',
        'status'
    ];

    public function category(){
        return $this->hasOne(Category::class,'id','cat_id');
    }

    public function subcategory(){
        return $this->hasOne(SubCategory::class,'id','subcat_id');
    }

    public function productbrand(){
        return $this->hasOne(ProductBrand::class,'id','productbrand_id');
    }

    
}
