<?php

namespace App\Http\Controllers;

use App\Models\Banner;
use App\Models\Brand;
use App\Models\Count;
use App\Models\Product;
use App\Models\ProductPhoto;
use App\Models\Testimonial;
use App\Models\Title;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $banners = Banner::orderBy('created_at','desc')->where('status','1')->get();
        $titles = Title::orderBy('created_at','desc')->where('status','1')->get();
        $testimonials = Testimonial::orderBy('created_at','desc')->where('status','1')->get();
        $brands = Brand::orderBy('created_at','desc')->get();
        $counts = Count::orderBy('created_at','desc')->get();
        $products = Product::orderBy('created_at','desc')->get();

        return view('frontend.index', compact('banners','titles','testimonials','brands','counts','products'));
    }

    public function aboutUs()
    {

    }

    public function productDetails($id)
    {
        $product= Product::find($id);
        $product_mul_img = ProductPhoto::where('product_id','=', $product->id)->orderBy('created_at', 'desc')->get();
        // dd($product_mul_img);

        // dd('hereeee');
        return view('frontend.productdetails',compact('product','product_mul_img'));
    }

    
}
