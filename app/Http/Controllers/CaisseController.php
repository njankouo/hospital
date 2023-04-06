<?php

namespace App\Http\Controllers;

use App\Models\Consultation;
use Illuminate\Http\Request;

class CaisseController extends Controller
{
    //

    public function index(){
        $consultation=Consultation::all();
        return view('caisses.index',compact('consultation'));
    }

    public function update_caisse(Request $request,Consultation $consultation){
        if($_POST['versement']<$_POST['montant']){
            return back()->with('error','le versement de la consultation est inferieur');

        }

        else if($_POST['versement']>$_POST['montant']){
            return back()->with('error','le versement de la consultation est superieur');
        }
        else{
            $consultation->update([
                'versement'=>$request->versement,
                'montant'=>$request->montant,
                'motifs_caisse'=>$request->motifs_caisse,
            ]);
            return back()->with('message','paiement realise avec success');
        }
        }

}
