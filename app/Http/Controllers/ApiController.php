<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash; 

use App\Models\User;
use App\Models\Photo;

class ApiController extends Controller
{
    //
    //
    public function __construct()
    {
        $this->middleware('auth:sanctum');
    }

    public function photos(Request $request){

        if($request->has('id')){
            $id = $request->input('id');
            $fotos = Photo::where('id', $id)->get();
        }
        else{
            $fotos = Photo::all();
        }
        
        return response()->json($fotos);
    }
}
