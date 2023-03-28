<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\BannerStoreRequest;
use App\Http\Requests\BannerUpdateRequest;
use App\Models\Banner;
use Illuminate\Http\Request;

class BannerController extends Controller
{
    public function index()
    {
        $banners = Banner::orderBy('created_at','desc')->get();
        return view('backend.banner.index', compact('banners'));
    }

    public function store(BannerStoreRequest $request)
    {
        $destinationpath = 'uploads/banners/';
        $data = $request->except('image');

        $imageFile = $request->image;
        if ($imageFile) {
            $extension = strrchr($imageFile->getClientOriginalName(), '.');
            $new_file_name = "banner_" . time();
            $attachment = $imageFile->move($destinationpath, $new_file_name . $extension);
            $data['image'] = isset($attachment) ? $new_file_name . $extension : NULL;
        }
        // dd($data);
        $banner = Banner::create($data);
        if ($banner) {
            return redirect()->route('admin.banner.index')
                ->withSuccessMessage('Banner is added successfully.');
        }

        return redirect()->back()
            ->withInput()
            ->withWarningMessage('Banner can not be added.');

    }
    public function edit(Banner $banner)
    {
        // dd($banner);
        return view('backend.banner.edit', compact('banner'));
    }

    public function update(BannerUpdateRequest $request, $id)
    {
        $destinationpath = 'uploads/banners/';
        $data = $request->except('_token', '_method', 'image');

        $banner_id = Banner::find($id);
        $imageFile = $request->image;

        if ($imageFile) {
            if (file_exists($destinationpath . $banner_id->image) &&  $banner_id->image != '') {
                unlink($destinationpath . $banner_id->image);
            }
            $extension = strrchr($imageFile->getClientOriginalName(), '.');
            $new_file_name = 'banner_' . time();
            $image = $imageFile->move($destinationpath, $new_file_name . $extension);
            $data['image'] = isset($image) ? $new_file_name . $extension : null;
        }
        // dd($data);
        $banner = Banner::where('id', $id)->update($data);
        if ($banner) {
            return redirect()->route('admin.banner.index')
                ->withSuccessMessage('Banner is updated successfully.');
        }

        return redirect()->back()
            ->withInput()
            ->withWarningMessage('Banner can not be updated.');

    }

    public function destroy($id)
    {
        $banner = Banner::find($id)->delete($id);

        if ($banner) {
            return response()->json([
                'type' => 'success',
                'message' => 'Banner is deleted successfully.'
            ], 200);
        }
        return response()->json([
            'type' => 'error',
            'message' => 'Banner can not be deleted.'
        ], 422);
    }

}
