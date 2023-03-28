<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ApiController extends Controller
{
    public function banner()
    {
        $banners = DB::table('banners')->where('status', '1')->orderBy('id', 'desc')->take('3')->get();

        if ($banners) {
            return response()->json([
                'response_message' => 'Success',
                'response_code' => 200,
                'data'    => $banners,
            ], 200);
        } else {
            return response()->json([
                'response_message' => 'Error !! Data not found',
                'response_code' => 422,
            ], 422);
        }
    }

    public function title()
    {
        $titles = DB::table('titles')->where('status', '1')->orderBy('id', 'desc')->take('3')->get();

        if ($titles) {
            return response()->json([
                'response_message' => 'Success',
                'response_code' => 200,
                'data'    => $titles,
            ], 200);
        } else {
            return response()->json([
                'response_message' => 'Error !! Data not found',
                'response_code' => 422,
            ], 422);
        } 
    }
}
