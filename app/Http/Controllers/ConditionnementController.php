<?php

namespace App\Http\Controllers;

use App\Models\Conditionnement;
use Illuminate\Http\Request;

class ConditionnementController extends Controller
{

    public function index(){
        $conditionnement=Conditionnement::all();
        return view('conditionnements.index',compact('conditionnement'));
    }

    public function addCondition(Request $request){
        $request->validate([],[]);

        Conditionnement::create([
            'libelle'=>$request->libelle
        ]);
        return back()->with('success','conditionnement enregistre avec success ');
    }
}
