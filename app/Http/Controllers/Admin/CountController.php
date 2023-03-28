<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\CountStoreRequest;
use App\Http\Requests\CountUpdateRequest;
use App\Models\Count;
use Illuminate\Http\Request;

class CountController extends Controller
{
    public function index()
    {
        $counts = Count::orderBy('created_at','desc')->get();
        return view('backend.count.index', compact('counts'));
    }

    public function store(CountStoreRequest $request)
    {
        // dd($request);
        $data = $request->all();

        $counts = Count::create($data);

        if ($counts) {
            return redirect()->route('admin.count.index')
                ->withSuccessMessage('Count is added successfully.');
        }

        return redirect()->back()
            ->withInput()
            ->withWarningMessage('Count can not be added.');
           
    }
    public function edit(Count $count)
    {
       
        return view('backend.count.edit', compact('count'));
    }

    public function update(CountUpdateRequest $request, $id)
    {
        $data = $request->except('_token', '_method', 'image');
        $count = Count::where('id', $id)->update($data);
        if ($count) {
            return redirect()->route('admin.count.index')
                ->withSuccessMessage('Count is updated successfully.');
        }

        return redirect()->back()
            ->withInput()
            ->withWarningMessage('Count can not be updated.');
     
    }

    public function destroy($id)
    {
        $count = Count::find($id)->delete($id);

        if ($count) {
            return response()->json([
                'type' => 'success',
                'message' => 'Count is deleted successfully.'
            ], 200);
        }
        return response()->json([
            'type' => 'error',
            'message' => 'Count can not be deleted.'
        ], 422);
    }


}
