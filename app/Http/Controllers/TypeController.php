<?php

namespace App\Http\Controllers;

use App\Models\Type;
use App\Models\type_produit;
use Illuminate\Http\Request;

class TypeController extends Controller
{
    //
    public function index(){


            $type=type_produit::all();

        return view('type.type',compact('type'));
    }
    public function create(Request $request){
        $request->validate([
            'nom'=>'required|unique:type_articles,nom'
        ],
    [
        'nom.required'=>'renseignez le type d\'article'
    ]
    );

    type_produit::create([
        'nom'=>$request->nom
    ]);
      return back()->with('success','enregistré avec success');
    }

}
