<?php

namespace App\Http\Controllers;

use App\Models\Famille;
use Illuminate\Http\Request;

class FamilleController extends Controller
{

    public function index(){
        $famille=Famille::all();
        return view('famille.index',compact('famille'));
    }


    public function creation(Request $request){
        $request->validate([
            'libelle'=>'required'
        ],
    [
        'libelle.required'=>'renseignez la famille du produit'
    ]
    );
    Famille::create([
        'libelle'=>$request->libelle
    ]);
    return back()->with('success','famille enregistré avec success');
    }
    public function supprimer($id){
        $famille=Famille::find($id);
        $nom=$famille->libelle;
        $famille->delete();
        return back()->with('success',"$nom est retiré de la liste des Familles de produit avec success");
    }
}
