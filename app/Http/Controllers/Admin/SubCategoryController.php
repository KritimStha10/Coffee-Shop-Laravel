<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\SubCategoryStoreRequest;
use App\Http\Requests\SubCategoryUpdateRequest;
use App\Models\Category;
use App\Models\SubCategory;
use Illuminate\Http\Request;

class SubCategoryController extends Controller
{
    public function index()
    {
        $categories = Category::where('status','1')->get();
        // dd($categories);
        $subcategories = SubCategory::orderBy('created_at','desc')->get();
        return view('backend.subcategory.index', compact('subcategories','categories'));
    }

    public function store(SubCategoryStoreRequest $request)
    {
        $destinationpath = 'uploads/subcategories/';
        $data = $request->except('image');

        $imageFile = $request->image;
        if ($imageFile) {
            $extension = strrchr($imageFile->getClientOriginalName(), '.');
            $new_file_name = "subcategory_" . time();
            $attachment = $imageFile->move($destinationpath, $new_file_name . $extension);
            $data['image'] = isset($attachment) ? $new_file_name . $extension : NULL;
        }
        
        $subcategory = SubCategory::create($data);
        if ($subcategory) {
            return redirect()->route('admin.subcategory.index')
                ->withSuccessMessage('Subcategory is added successfully.');
        }

        return redirect()->back()
            ->withInput()
            ->withWarningMessage('Subcategory can not be added.');

    }
    public function edit(SubCategory  $subcategory)
    {
        $categories = Category::where('status','1')->get();
        return view('backend.subcategory.edit', compact('subcategory','categories'));
    }

    public function update(SubCategoryUpdateRequest $request, $id)
    {
        $destinationpath = 'uploads/subcategories/';
        $data = $request->except('_token', '_method', 'image');

        $subcategory_id = SubCategory::find($id);
        $imageFile = $request->image;

        if ($imageFile) {
            if (file_exists($destinationpath . $subcategory_id->image) &&  $subcategory_id->image != '') {
                unlink($destinationpath . $subcategory_id->image);
            }
            $extension = strrchr($imageFile->getClientOriginalName(), '.');
            $new_file_name = 'subcategory_' . time();
            $image = $imageFile->move($destinationpath, $new_file_name . $extension);
            $data['image'] = isset($image) ? $new_file_name . $extension : null;
        }
        
        $subcategory = SubCategory::where('id', $id)->update($data);
        if ($subcategory) {
            return redirect()->route('admin.subcategory.index')
                ->withSuccessMessage('subcategory is updated successfully.');
        }

        return redirect()->back()
            ->withInput()
            ->withWarningMessage('subcategory can not be updated.');

    }

    public function destroy($id)
    {
        $subcategory = SubCategory::find($id)->delete($id);

        if ($subcategory) {
            return response()->json([
                'type' => 'success',
                'message' => 'Subcategory is deleted successfully.'
            ], 200);
        }
        return response()->json([
            'type' => 'error',
            'message' => 'Subcategory can not be deleted.'
        ], 422);
    }
    
}
