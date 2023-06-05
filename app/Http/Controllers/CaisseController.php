<?php

namespace App\Http\Controllers;

use App\Models\Caisse;
use App\Models\Consultation;
use App\Models\Patient;
use Illuminate\Http\Request;

class CaisseController extends Controller
{
    //

    public function index(){
        $caisse=Caisse::all();
        $patient=Patient::all();
        return view('caisses.index',compact('caisse','patient'));
    }

    public function add_caisse(Request $request){
        // if($_POST['versement']<$_POST['montant']){
        //     return back()->with('error','le versement de la consultation est inferieur');

        // }

        // else if($_POST['versement']>$_POST['montant']){
        //     return back()->with('error','le versement de la consultation est superieur');
        // }
        // else{
           // dd($request->all());
           $consultation=Consultation::all();
            Caisse::create([

                'patient_id'=>$request->patient_id,
                'versement'=>$request->versement,
                'montant'=>$request->montant,
                'motif'=>$request->motif,
            ]);

           
        }

}
