<?php

namespace App\Http\Controllers;

use App\Models\rayon;
use Illuminate\Http\Request;

class RayonController extends Controller
{
    //
    public function index(){
        $data=[
            'rayon'=>rayon::latest()->paginate()
        ];
        return view('rayon.index',$data);
    }
    public function newCreate(Request $request){
        $request->validate([],[]);
        rayon::create([

            'libelle'=>$request->nom
        ]);
        return back()->with('success','rayon cree avec success');
    }
}
