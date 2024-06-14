<?php

namespace App\Http\Controllers;

use App\jadwal;
use Illuminate\Http\Request;

class APIController extends Controller
{
    public function searchjadwal(Request $request)
    {
        $cari = $request->input('q');

        $jadwal = jadwal::where('nama','LIKE',"%$cari%")->get();
        if($jadwal->isEmpty())
        {
            return response()->json([
                                    'success'=> false,
                                    'data' =>'data tidak di temukan'
                                    ],404)->header('Access-Control-Allow-Origin','http://127.0.0.1:5501');
        }
        else
        {
            return response()->json([
                                    'success'=> true,
                                    'data' =>$jadwal
                                    ],200)->header('Access-Control-Allow-Origin','http://127.0.0.1:5501'); 
        }
    }
}
