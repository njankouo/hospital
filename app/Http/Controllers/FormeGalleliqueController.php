<?php

namespace App\Http\Controllers;

use App\Models\FormeGallelique;
use Illuminate\Http\Request;

class FormeGalleliqueController extends Controller
{

    public function index(){
        $forme=FormeGallelique::all();
         return view('formes_gallelique.index',compact('forme'));
    }
    public function addForme(Request $request){
        $request->validate([],[]);
        FormeGallelique::create(
            [
                'libelle'=>$request->libelle
            ]
            );
            return back()->with('info','forme gallelique enregistre avec success');


    }
}
