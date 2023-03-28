<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\AboutUpdateRequest;
use App\Models\About;
use Illuminate\Http\Request;

class AboutController extends Controller
{
    public function index()
    {
        $about = About::first();
        // dd($about);
        return view('backend.about.index', compact('about'));
    }

    public function edit($id)
    {
        $about_edit = About::find($id);
        return view('backend.about.edit', compact('about_edit'));
    }

    public function update(AboutUpdateRequest $request, $id)
    {
        $destinationpath = 'uploads/abouts/';
        $data = $request->except('_token', '_method', 'image');

        $imageFile = $request->image;

        if ($imageFile) {
            $extension = strrchr($imageFile->getClientOriginalName(), '.');
            $new_file_name = 'about_' . time();
            $image = $imageFile->move($destinationpath, $new_file_name . $extension);
            $data['image'] = isset($image) ? $new_file_name . $extension : null;
        }
        // dd($data);
        $about = About::where('id', $id)->update($data);
        if ($about) {
            return redirect()->route('admin.about.index')->withSuccessMessage('About us is updated successfully.');
        }
        return redirect()->back()->withInput()->withWarningMessage('About us can not be updated.');
    }
}
