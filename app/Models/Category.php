<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;
    protected $table = 'category';
    protected $fillable=[
        'name',
        'image',
        'status'
    ];

    public function subCategory(){
        return $this->belongsTo(SubCategory::class,'cat_id','id');
    }

    public function productbrand(){
        return $this->belongsTo(ProductBrand::class,'id','subcat_id');
    }

    public function product(){
        return $this->belongsTo(Product::class,'id','productbrand_id');
    }

}
