<?php

namespace App\Http\Controllers;

use App\Models\Chambre;
use App\Models\Hospitalisation;
use Illuminate\Http\Request;

class ChambreController extends Controller
{
    public function index(){
        $cham=Chambre::withcount('hospitalisation')->get();
       // $hospitalisation=Hospitalisation::all();

        return view('chambres.index',compact('cham'));
    }
    public function save(Request $request){
        $request->validate([
            'numero'=>'required|unique:chambres,numero',
        ],
       [ 'numero.required'=>'renseignez le numero du lit']
    );
        Chambre::create([
            'appreciation'=>$request->appreciation,
            'numero'=>$request->numero,
            'prix'=>$request->prix,
            'nbrelit'=>$request->nbre_lit
        ]);
        return back()->with('info','chambre enregistre avec success');
    }
    public function mask($id){
        $chambre=Chambre::find($id);
        $chambre->delete();
        return back()->with('success','chambre masqué avec succes');
    }
}
