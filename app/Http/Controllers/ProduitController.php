<?php

namespace App\Http\Controllers;

use App\Models\Conditionnement;
use App\Models\Famille;
use App\Models\FormeGallelique;
use App\Models\Produit;
use Illuminate\Http\Request;
use PDF;

class ProduitController extends Controller
{
    //
    public function index(){
        $conditionnement=Conditionnement::all();
        $forme=FormeGallelique::all();
        $famille=Famille::all();
        $produit=Produit::orderBy('id','desc')->get();
        return view('produits.index',compact('conditionnement','forme','famille','produit'));
    }
    public function addProduct(Request $request){
        $request->validate([
            'designation'=>'required|unique:produits,designation',
            //'equivalence'=>'required',
            'famille_id'=>'required',
            'forme_id'=>'required',
            'conditionnement_id'=>'required',
            'pu'=>'required',
            'qteSeuil'=>'required',
            'qteStock'=>'required',
        ],[
            'designation.required'=>'renseignez votre designation',
            //'designation.required'=>'designation',
            'famille_id.required'=>'renseignez la famille du produit',
            'forme_id.required'=>'renseignez la forme du produit',
            'conditionnement_id.required'=>'renseignez le conditionnement du produit',
            'pu.required'=>'renseignez votre pu',
            'qteSeuil.required'=>'renseignez votre qteSeuil',
            'qteStock.required'=>'renseignez votre qteStock',

        ]);

        Produit::create([
            'designation'=>$request->designation,
            'equivalence'=>$request->equivalence,
            'famille_id'=>$request->famille_id,
            'forme_id'=>$request->forme_id,
            'conditionnement_id'=>$request->conditionnement_id,
            'pu'=>$request->pu,
            'qteSeuil'=>$request->qteSeuil,
            'qteStock'=>$request->qteStock,
            'file'=>$request->file

        ]);
       // dd($request->all());
        return back()->with('message','produit enregistre avec success');
    }
    public function edit($id){
        $produit=Produit::find($id);
        $conditionnement=Conditionnement::all();
        $famille=Famille::all();
        $forme=FormeGallelique::all();
        return view('produits.edit',compact('produit','conditionnement','famille','forme'));
    }
    public function editProduit(Request $request,Produit $produit){
        $request->validate([
            'designation'=>'required|unique:produits,designation',
            //'equivalence'=>'required',
            'famille_id'=>'required',
            'forme_id'=>'required',
            'conditionnement_id'=>'required',
            'pu'=>'required',
            'qteSeuil'=>'required',
            'qteStock'=>'required',
        ],[
        'designation.required'=>'renseignez votre designation',
        //'designation.required'=>'designation',
        'famille_id.required'=>'renseignez la famille du produit',
        'forme_id.required'=>'renseignez la forme du produit',
        'conditionnement_id.required'=>'renseignez le conditionnement du produit',
        'pu.required'=>'renseignez votre pu',
        'qteSeuil.required'=>'renseignez votre qteSeuil',
        'qteStock.required'=>'renseignez votre qteStock',

        ]);

        $produit->update([
            'designation'=>$request->designation,
            'equivalence'=>$request->equivalence,
            'famille_id'=>$request->famille_id,
            'forme_id'=>$request->forme_id,
            'conditionnement_id'=>$request->conditionnement_id,
            'pu'=>$request->pu,
            'qteSeuil'=>$request->qteSeuil,
            'qteStock'=>$request->qteStock,
            'file'=>$request->file

        ]);
       // dd($request->all());
        return back()->with('success','produit enregistre avec success');


    }
    public function pdf(){
        $produit=Produit::orderby('id','desc')->get();
        $pdf=PDF::loadView('Produits.pdf',compact('produit'));
        return $pdf->stream();
    }
    public function softProduct($id){
        $produit=Produit::find($id);
        $produit->delete();
        return back()->with('success','produits archivé avec succes');
    }
}
