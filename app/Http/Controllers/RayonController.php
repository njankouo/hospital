<?php

namespace App\Http\Controllers;

use App\Models\rayon;
use Illuminate\Http\Request;

class RayonController extends Controller
{
    //
    public function index(){
        $data=[
            'rayon'=>rayon::all()
        ];
        return view('rayon.index',$data);
    }
}
