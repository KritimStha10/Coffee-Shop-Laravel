<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SubCategory extends Model
{
    use HasFactory;
    protected $table = 'subcategories';
    protected $fillable=[
        'name',
        'cat_id',
        'image',
        'status'
    ];

    public function category(){
        return $this->hasOne(Category::class,'id','cat_id');
    }
    
    public function productbrand(){
        return $this->belongsTo(ProductBrand::class,'id','subcat_id');
    }

    public function product(){
        return $this->belongsTo(Product::class,'id','productbrand_id');
    }


   
}
