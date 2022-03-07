<?php

namespace App\Http\Controllers;

use App\Models\Categorie;
use App\Models\type_produit;
use Illuminate\Http\Request;

class CategorieController extends Controller
{
    //
    public function index(){
        $data=[
            'cat'=>Categorie::all(),
            'type'=>type_produit::all()
        ];
        return view('categorie.categorie',$data);
    }
    public function create(Request $request){
        // $request->validate([
        // 'libelle'=>'required|unique:categories,libelle',
        // 'type_id'=>'required|unique:type_articles,nom'
        // ],
        // [
        // 'libelle.required'=>'renseignez la categorie',
        // 'type_id.required'=>'renseignez le type de produit'
        // ]
        // );
        Categorie::create([
            'libelle'=>$request->libelle,
            'type_id'=>$request->type_id,

        ]);

        return back()->with('success','categorie enregistré avec success');
    }
}
