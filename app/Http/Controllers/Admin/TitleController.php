<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\TitleStoreRequest;
use App\Http\Requests\TitleUpdateRequest;
use App\Models\Title;
use Illuminate\Http\Request;

class TitleController extends Controller
{
    public function index()
    {
        $titles = Title::orderBy('created_at','desc')->where('status','!=','2')->get();
        return view('backend.title.index',compact('titles'));
    }


    public function store(TitleStoreRequest $request)
    {
        // dd($request);
        $data = $request->all();

        $title = Title::create($data);

        if ($title) {
            return redirect()->route('admin.title.index')
                ->withSuccessMessage('Title is added successfully.');
        }

        return redirect()->back()
            ->withInput()
            ->withWarningMessage('Title can not be added.');
           
    }

    public function edit(Title $title)
    {
       
        return view('backend.title.edit', compact('title'));
    }

    public function update(TitleUpdateRequest $request, $id)
    {
        $data = $request->except('_token', '_method', 'image');
        $title = Title::where('id', $id)->update($data);
        if ($title) {
            return redirect()->route('admin.title.index')
                ->withSuccessMessage('Title is updated successfully.');
        }

        return redirect()->back()
            ->withInput()
            ->withWarningMessage('Title can not be updated.');
     
    }

    public function destroy($id)
    {
        $title = Title::find($id)->delete($id);

        if ($title) {
            return response()->json([
                'type' => 'success',
                'message' => 'Title is deleted successfully.'
            ], 200);
        }
        return response()->json([
            'type' => 'error',
            'message' => 'Title can not be deleted.'
        ], 422);
    }
}


