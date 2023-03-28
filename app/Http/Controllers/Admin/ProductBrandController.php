<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\ProductBrandStoreRequest;
use App\Http\Requests\ProductBrandUpdateRequest;
use App\Models\Category;
use App\Models\ProductBrand;
use App\Models\SubCategory;
use Illuminate\Http\Request;

class ProductBrandController extends Controller
{
    public function index()
    {
        $categories = Category::where('status','1')->get();
        $subcategories = SubCategory::where('status','1')->get();
        $productbrands = ProductBrand::orderBy('created_at','desc')->get();
        return view('backend.productbrand.index', compact('productbrands','categories','subcategories'));
    }

    public function store(ProductBrandStoreRequest $request)
    {
        $destinationpath = 'uploads/productbrands/';
        $data = $request->except('image');

        $imageFile = $request->image;
        if ($imageFile) {
            $extension = strrchr($imageFile->getClientOriginalName(), '.');
            $new_file_name = "productbrand_" . time();
            $attachment = $imageFile->move($destinationpath, $new_file_name . $extension);
            $data['image'] = isset($attachment) ? $new_file_name . $extension : NULL;
        }
        
        $productbrand = ProductBrand::create($data);
        if ($productbrand) {
            return redirect()->route('admin.productbrand.index')
                ->withSuccessMessage('Product Brand is added successfully.');
        }

        return redirect()->back()
            ->withInput()
            ->withWarningMessage('Product Brand can not be added.');

    }

    public function edit(ProductBrand  $productbrand)
    {
        $categories = Category::where('status','1')->get();
        $subcategories = SubCategory::where('status','1')->get();
        return view('backend.productbrand.edit', compact('productbrand','subcategories','categories'));
    }

    public function update(ProductBrandUpdateRequest $request, $id)
    {
        $destinationpath = 'uploads/productbrands/';
        $data = $request->except('_token', '_method', 'image');

        $productbrand_id = ProductBrand::find($id);
        $imageFile = $request->image;

        if ($imageFile) {
            if (file_exists($destinationpath . $productbrand_id->image) &&  $productbrand_id->image != '') {
                unlink($destinationpath . $productbrand_id->image);
            }
            $extension = strrchr($imageFile->getClientOriginalName(), '.');
            $new_file_name = 'productbrand_' . time();
            $image = $imageFile->move($destinationpath, $new_file_name . $extension);
            $data['image'] = isset($image) ? $new_file_name . $extension : null;
        }
        
        $productbrand = ProductBrand::where('id', $id)->update($data);
        if ($productbrand) {
            return redirect()->route('admin.productbrand.index')
                ->withSuccessMessage('Product Brand is updated successfully.');
        }

        return redirect()->back()
            ->withInput()
            ->withWarningMessage('Product Brand can not be updated.');

    }

    public function destroy($id)
    {
        $productbrand = ProductBrand::find($id)->delete($id);

        if ($productbrand) {
            return response()->json([
                'type' => 'success',
                'message' => 'Product Brand is deleted successfully.'
            ], 200);
        }
        return response()->json([
            'type' => 'error',
            'message' => 'Product Brand can not be deleted.'
        ], 422);
    }

}
