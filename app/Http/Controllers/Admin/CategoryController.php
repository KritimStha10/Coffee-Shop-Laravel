<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\CategoryStoreRequest;
use App\Http\Requests\CategoryUpdateRequest;
use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index()
    {
        $categories = Category::orderBy('created_at','desc')->get();
        return view('backend.category.index', compact('categories'));
    }

    public function store(CategoryStoreRequest $request)
    {
        $destinationpath = 'uploads/categories/';
        $data = $request->except('image');

        $imageFile = $request->image;
        if ($imageFile) {
            $extension = strrchr($imageFile->getClientOriginalName(), '.');
            $new_file_name = "category_" . time();
            $attachment = $imageFile->move($destinationpath, $new_file_name . $extension);
            $data['image'] = isset($attachment) ? $new_file_name . $extension : NULL;
        }
        // dd($data);
        $category = Category::create($data);
        if ($category) {
            return redirect()->route('admin.category.index')
                ->withSuccessMessage('Category is added successfully.');
        }

        return redirect()->back()
            ->withInput()
            ->withWarningMessage('Category can not be added.');

    }
    public function edit(Category $category)
    {
        // dd($banner);
        return view('backend.category.edit', compact('category'));
    }

    public function update(CategoryUpdateRequest $request, $id)
    {
        $destinationpath = 'uploads/categories/';
        $data = $request->except('_token', '_method', 'image');

        $category_id = Category::find($id);
        $imageFile = $request->image;

        if ($imageFile) {
            if (file_exists($destinationpath . $category_id->image) &&  $category_id->image != '') {
                unlink($destinationpath . $category_id->image);
            }
            $extension = strrchr($imageFile->getClientOriginalName(), '.');
            $new_file_name = 'category_' . time();
            $image = $imageFile->move($destinationpath, $new_file_name . $extension);
            $data['image'] = isset($image) ? $new_file_name . $extension : null;
        }
        // dd($data);
        $category = Category::where('id', $id)->update($data);
        if ($category) {
            return redirect()->route('admin.category.index')
                ->withSuccessMessage('category is updated successfully.');
        }

        return redirect()->back()
            ->withInput()
            ->withWarningMessage('category can not be updated.');

    }
    public function destroy($id)
    {
        $category = Category::find($id)->delete($id);

        if ($category) {
            return response()->json([
                'type' => 'success',
                'message' => 'Category is deleted successfully.'
            ], 200);
        }
        return response()->json([
            'type' => 'error',
            'message' => 'Category can not be deleted.'
        ], 422);
    }



    
}
