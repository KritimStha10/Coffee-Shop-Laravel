<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\ProductStoreRequest;
use App\Http\Requests\ProductUpdateRequest;
use App\Models\Category;
use App\Models\Product;
use App\Models\ProductBrand;
use App\Models\ProductPhoto;
use App\Models\SubCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class ProductController extends Controller
{
    public function index()
    {
        $products = Product::orderBy('created_at','desc')->get();
        return view('backend.product.index',compact('products'));
    }

    public function create()
    {
        $categories = Category::where('status','1')->get();
        $subcategories = SubCategory::where('status','1')->get();
        $productbrands = ProductBrand::where('status','1')->get();
       
        return view('backend.product.create',compact('categories','subcategories','productbrands'));

    }

    public function store(ProductStoreRequest $request)
    {
        $destinationpath = 'uploads/products/';
        $data = $request->except('_token', '_method', 'image');

        $imageFile = $request->image;
        if ($imageFile) {
            $extension = strrchr($imageFile->getClientOriginalName(), '.');
            $new_file_name = "product_" . time();
            $attachment = $imageFile->move($destinationpath, $new_file_name . $extension);
            $data['image'] = isset($attachment) ? $new_file_name . $extension : NULL;
        }

     
        $size = $request->input('size');
        if ($size) {
            $data['size'] = implode(',', $size);
        } else {
            $data['size'] = '';
        }
        // dd($data);
        $product = Product::create($data);

        $destinationpath_photo = 'uploads/products/photos/';
        $photos = $request->file('attachment');

        if($photos) {
            $albumPhoto = [];
            foreach($photos as $album_photo){
                $extension = strrchr($album_photo->getClientOriginalName(), '.');
                $new_file_name = "product-photo_" . sha1(date('YmdHis') . Str::random(30));
                $attachment = $album_photo->move($destinationpath_photo, $new_file_name.$extension);
                $data_pho['attachment'] = isset($attachment) ? $new_file_name . $extension : NULL;

                $data_pho['product_id'] = $product->id;
                $albumPhoto = ProductPhoto::create($data_pho);
            }
           
        }
        if ($product || $albumPhoto) {
            return redirect()->route('admin.product.index')
                ->withSuccessMessage('Product is added successfully.');
        }

        return redirect()->back()
            ->withInput()
            ->withWarningMessage('Product can not be added.');
    }

    public function edit(Product $product)
    {
        $categories = Category::where('status','1')->get();
        $subcategories = SubCategory::where('status','1')->get();
        $productbrands = ProductBrand::where('status','1')->get();
        $items = Product::where('id', $product)->get();
        return view('backend.product.edit', compact('product','subcategories','categories','productbrands','items'));
    }

    public function update(ProductUpdateRequest $request, $id)
    {
        $destinationpath = 'uploads/products/';
        $data = $request->except('_token', '_method', 'photo');
        $product_id = Product::findOrFail($id);
        $imageFile = $request->photo;

        if ($imageFile) {
            if (file_exists($destinationpath . $product_id->photo) &&  $product_id->photo != '') {
                unlink($destinationpath . $product_id->photo);
            }
            $extension = strrchr($imageFile->getClientOriginalName(), '.');
            $new_file_name = 'product_' . time();
            $image = $imageFile->move($destinationpath, $new_file_name . $extension);
            $data['photo'] = isset($image) ? $new_file_name . $extension : null;
        }
       
        $size = $request->input('size');
        if ($size) {
            $data['size'] = implode(',', $size);
        } else {
            $data['size'] = '';
        }

        $product = Product::findOrFail($id)->update($data);
        if ($product) {
            return redirect()->route('admin.product.index')->withSuccessMessage('Product is updated successfully.');
        }
        return redirect()->back()->withInput()->withWarningMessage('Product can not be updated.');
    }

    public function destroy($id)
    {
        $product = Product::find($id)->delete($id);

        if ($product) {
            return response()->json([
                'type' => 'success',
                'message' => 'Product is deleted successfully.'
            ], 200);
        }
        return response()->json([
            'type' => 'error',
            'message' => 'Product can not be deleted.'
        ], 422);
    }

    public function show($id)
    {
        
        $product = Product::find($id);
        $product_photos = ProductPhoto::where('product_id', '=', $id)->get();
        
        return view('backend.product.show', compact('product','product_photos'));
    }


}
