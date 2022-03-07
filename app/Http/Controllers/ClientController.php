<?php

namespace App\Http\Controllers;

use App\Models\client;
use Illuminate\Http\Request;

class ClientController extends Controller
{
    //
    public function index(){
        $data=[
            'client'=>client::latest()->paginate(5)
        ];
        return view('client.client',$data);

    }

    public function create(Request $request){
        $request->validate([
            'nom'=>'required',
            'prenom'=>'required',
            'sexe'=>'required',
            'telephone'=>'required|unique:clients,telephone'
        ],
    [

         'nom.required'=>'veuillez renseigner le nom svp',
               'prenom.required'=>'veuillez renseigner le prenom svp',
                  'sexe.required'=>'veuillez renseigner le sexe svp',
                     'telephone.required'=>'veuillez renseigner le telephone svp',
    ]
    );
    client::create([
         'nom'=>$request->nom,
            'prenom'=>$request->prenom,
            'sexe'=>$request->sexe,
            'telephone'=>$request->telephone,
    ]);
    return back()->with('success','client enregistre avec success');

    }
}
