<?php

namespace App\Http\Controllers;

use App\Models\Famille;
use Illuminate\Http\Request;

class FamilleController extends Controller
{


    public function index(){
        $famille=Famille::all();
        return view('familles.index',compact('famille'));


    }

    public function addFamille(Request $request){

        $request->validate([],[]);

        Famille::create(

            [
                'libelle'=>$request->libelle
            ]
            );
            return back()->with('success','familles enregistre avec success');
    }
}
