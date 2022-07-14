<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\client;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
class ClientController extends Controller
{
    //

    public function index(){
           Carbon::setLocale('fr');
        $data=[
            'client'=>client::latest()->paginate(5)
        ];
        return view('client.client',$data);

    }
    public function indes(){
        return view('client.create');
    }

    public function create(Request $request){
        $request->validate([
            'nom'=>'required',
            //'prenom'=>'required',
            'sexe'=>'required',
           // 'email'=>'required|unique:clients,email',
            'adresse'=>'required',
           // 'numeroCNI'=>'required|unique:clients,numeroCNI',
            'telephone'=>'required|unique:clients,telephone'
        ],
    [

         'nom.required'=>'veuillez renseigner le nom svp',
              // 'prenom.required'=>'veuillez renseigner le prenom svp',
                  'sexe.required'=>'veuillez renseigner le sexe svp',
                     'telephone.required'=>'veuillez renseigner le telephone svp',
                     'adresse.required'=>'renseignez l\'adresse',
                    // 'numeroCNI.required'=>'renseignez le numero de cni',
                    // 'email.required'=>'renseignez l\'email'
    ]
    );
    client::create([
         'nom'=>$request->nom,
            'prenom'=>$request->prenom,
            'sexe'=>$request->sexe,
            'telephone'=>$request->telephone,
            'email'=>$request->email,
            'adresse'=>$request->adresse,
            'numeroCNI'=>$request->numeroCNI,
           // 'status'=>$request->status
    ]);

    return redirect('/client');
    Session::flash('flash_message', 'It has been saved!');


    }
}
