<?php

namespace App\Http\Controllers;

use App\Models\Conditionnement;
use App\Models\Produit;
use App\Models\Produit_Vente;
use App\Models\Vente;
use Illuminate\Http\Request;

class VenteController extends Controller
{
    //

    public function index(){
        $vente=Vente::orderBy('id','desc')->get();
        return view('ventes.index',compact('vente'));
    }

    public function save($id){
        $produit=Produit::all();
        $conditionnement=Conditionnement::all();
        $vente=Vente::find($id);
        return view('ventes.create',compact('vente','produit','conditionnement'));
    }

    public function save_vente(Request $rquest){
    //     $rquest->validate([
    //         'date'=>'required',
    //         'responsable'=>'required',
    //         ],
    //         [
    //             'date.required'=>'renseignez la date de vente',
    //             'responsable.required'=>'renseignez le responsable de la vente',

    //         ]
    // );
   //dd($rquest->all());
         Vente::create([
            'date'=>$rquest->date_vente,
            'responsable'=>$rquest->responsable,
        //    dd($rquest->input('date_vente'))

         ]);
        return back()->with('message','code vente initialise avec succes');
    }
    public function addvente(Request $request){
        $request->validate([],[]);

        Produit_Vente::create([


        'produit_id'=>$request->designation,
        'qte'=>$request->qte,
        'pu'=>$request->pu,
        'responsable'=>$request->responsable,
        'date'=>$request->date_vente,
        'conditionnement'=>$request->conditionnement

        ]);
        return back()->with('message','produit selectionne avec succes');
    }
}
