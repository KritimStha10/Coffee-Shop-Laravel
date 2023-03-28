<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductBrand extends Model
{
    use HasFactory;
    protected $fillable=[
        'name',
        'cat_id',
        'subcat_id',
        'image',
        'status'
    ];

    public function category(){
        return $this->hasOne(Category::class,'id','cat_id');
    }

    public function subcategory(){
        return $this->hasOne(SubCategory::class,'id','subcat_id');
    }

    public function product(){
        return $this->belongsTo(Product::class,'id','productbrand_id');
    }
}
