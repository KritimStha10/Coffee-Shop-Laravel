<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\TestimonialStoreRequest;
use App\Http\Requests\TestimonialUpdateRequest;
use App\Models\Testimonial;
use Illuminate\Http\Request;

class TestimonialController extends Controller
{
    public function index()
    {
        $testimonials = Testimonial::orderBy('created_at','desc')->get();
        return view('backend.testimonial.index', compact('testimonials'));
    }
    public function store(TestimonialStoreRequest $request)
    {
        $destinationpath = 'uploads/testimonials/';
        $data = $request->except('image');
        $imageFile = $request->image;
        if ($imageFile) {
            $extension = strrchr($imageFile->getClientOriginalName(), '.');
            $new_file_name = "testimonial_" . time();
            $attachment = $imageFile->move($destinationpath, $new_file_name . $extension);
            $data['image'] = isset($attachment) ? $new_file_name . $extension : NULL;
        }
        //dd($data);
        $testimonials = Testimonial::create($data);
        if ($testimonials) {
            return redirect()->route('admin.testimonial.index')
                ->withSuccessMessage('Testimonials is added successfully.');
        }

        return redirect()->back()
            ->withInput()
            ->withWarningMessage('Testimonials can not be added.');
    }

    public function edit(Testimonial $testimonial)
    {
        // dd($banner);
        return view('backend.testimonial.edit', compact('testimonial'));

    }
    
    public function update(TestimonialUpdateRequest $request, $id)
    {
        $destinationpath = 'uploads/testimonials/';
        $data = $request->except('_token', '_method', 'image');
       
        $testimonial_id = Testimonial::find($id);
        $imageFile = $request->image;

        if ($imageFile) {
            if (file_exists($destinationpath . $testimonial_id->image) &&  $testimonial_id->image != '') {
                unlink($destinationpath . $testimonial_id->image);
            }
            $extension = strrchr($imageFile->getClientOriginalName(), '.');
            $new_file_name = 'testimonial_' . time();
            $image = $imageFile->move($destinationpath, $new_file_name . $extension);
            $data['image'] = isset($image) ? $new_file_name . $extension : null;
        }
        //  dd($data);
        $testimonial = Testimonial::where('id', $id)->update($data);
        if ($testimonial) {
            return redirect()->route('admin.testimonial.index')
                ->withSuccessMessage('Testimonial is updated successfully.');
        }

        return redirect()->back()
            ->withInput()
            ->withWarningMessage('Testimonial can not be updated.');

    }
    public function destroy($id)
    {
        $testimonial = Testimonial::find($id)->delete($id);

        if ($testimonial) {
            return response()->json([
                'type' => 'success',
                'message' => 'Testimonial is deleted successfully.'
            ], 200);
        }
        return response()->json([
            'type' => 'error',
            'message' => 'Testimonial can not be deleted.'
        ], 422);
    }

}
