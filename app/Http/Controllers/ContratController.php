<?php

namespace App\Http\Controllers;

use App\Models\Contrat;
use App\Models\fournisseur;
use Illuminate\Http\Request;

class ContratController extends Controller
{
    //
    public function index(){
          $contrat=Contrat::all();
        return view('contrat.index',compact('contrat'));
    }
    public function vue2(){
        $fournisseur=fournisseur::all();
        $contrat=Contrat::all();
        return view('contrat.create',compact('fournisseur','contrat'));
    }
     public function store(Request $request){

        $request->validate([
            'date_debut'=>'required',
            //'date_fin'=>'required',


           'reglement'=>'required',

           'fournisseur_id'=>'required'

        ],
        [
        'date_debut.required'=>'renseignez la date du debut de contrat',
        //'date_fin.required'=>'veuillez renseigner la date de fin du contrat',

        'reglement.required'=>'veuillez renseigner le mode de reglement',
        'fournisseur_id.required'=>'veuillez renseigner le fournisseur'
        ]

    );
    Contrat::create([
        'image'=>$request->image,
         'date_debut'=>$request->date_debut,
         'date_fin'=>$request->date_fin,
         'reglement'=>$request->reglement,

         'fournisseur_id'=>$request->fournisseur_id



    ]);

    return back()->with('success','contrat enregisté avec success');
    }
    public function update($id){
        $fournisseur=fournisseur::all();
        $contrat=Contrat::find($id);
        return view('contrat.update',compact('contrat','fournisseur'));
    }
    public function updat(Request $request,Contrat $contrat){
    $request->validate([

    ],[]);
    $contrat->update([
        'image'=>$request->image,
         'date_debut'=>$request->date_debut,
         'date_fin'=>$request->date_fin,
         'reglement'=>$request->reglement,

            'fournisseur_id'=>$request->fournisseur_id,
    ]);
return back()->with('success','contrat modifié avec success');
}
}
