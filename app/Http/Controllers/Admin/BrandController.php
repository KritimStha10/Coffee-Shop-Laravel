<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\BrandStoreRequest;
use App\Http\Requests\BrandUpdateRequest;
use App\Models\Brand;
use Illuminate\Http\Request;

class BrandController extends Controller
{
    public function index()
    {
        $brands = Brand::orderBy('created_at','desc')->get();
        return view('backend.brand.index', compact('brands'));
    }
    public function store(BrandStoreRequest $request)
    {
        $destinationpath = 'uploads/brands/';
        $data = $request->except('image');

        $imageFile = $request->image;
        if ($imageFile) {
            $extension = strrchr($imageFile->getClientOriginalName(), '.');
            $new_file_name = "brand_" . time();
            $attachment = $imageFile->move($destinationpath, $new_file_name . $extension);
            $data['image'] = isset($attachment) ? $new_file_name . $extension : NULL;
        }
        // dd($data);
        $brand = Brand::create($data);
        if ($brand) {
            return redirect()->route('admin.brand.index')
                ->withSuccessMessage('Brand is added successfully.');
        }

        return redirect()->back()
            ->withInput()
            ->withWarningMessage('Brand can not be added.');

    }

    public function edit(Brand $brand)
    {
        // dd($banner);
        return view('backend.brand.edit', compact('brand'));
    }

    public function update(BrandUpdateRequest $request, $id)
    {
        $destinationpath = 'uploads/brands/';
        $data = $request->except('_token', '_method', 'image');

        $brand_id = Brand::find($id);
        $imageFile = $request->image;

        if ($imageFile) {
            if (file_exists($destinationpath . $brand_id->image) &&  $brand_id->image != '') {
                unlink($destinationpath . $brand_id->image);
            }
            $extension = strrchr($imageFile->getClientOriginalName(), '.');
            $new_file_name = 'brand_' . time();
            $image = $imageFile->move($destinationpath, $new_file_name . $extension);
            $data['image'] = isset($image) ? $new_file_name . $extension : null;
        }
        // dd($data);
        $brands = Brand::where('id', $id)->update($data);
        if ($brands) {
            return redirect()->route('admin.brand.index')
                ->withSuccessMessage('Brand is updated successfully.');
        }

        return redirect()->back()
            ->withInput()
            ->withWarningMessage('Brand can not be updated.');

    }

    public function destroy($id)
    {
        $brand = Brand::find($id)->delete($id);

        if ($brand) {
            return response()->json([
                'type' => 'success',
                'message' => 'Brand is deleted successfully.'
            ], 200);
        }
        return response()->json([
            'type' => 'error',
            'message' => 'Brand can not be deleted.'
        ], 422);
    }
}
