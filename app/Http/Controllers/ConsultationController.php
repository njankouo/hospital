<?php

namespace App\Http\Controllers;

use App\Models\Consultation;
use App\Models\Patient;
use Illuminate\Http\Request;

class ConsultationController extends Controller
{
    public function index(){
        $consultation=Consultation::orderBy('id','desc')->get();
        $patient=Patient::all();
        return view('consultations.index',compact('consultation','patient'));
    }

    public function new(){
        $patient=Patient::orderBy('id','asc')->get();
        return view('consultations.new',compact('patient'));
    }

    public function addConsultation(Request $request){

        $request->validate([
            'patient_id' => 'required',
             'poid' => 'required',
             'tension' => 'required',
             'motif' => 'required',
             'responsable' => 'required',
             'taille' => 'required',
             'diagnostique' => 'required',
             'activite' => 'required',
             'antecedant' => 'required',
        ],[
            'patient_id.required'=>'renseignez le patient',
            'poid.required'=>'renseignez le poid',
            'tension.required'=>'renseignez la tension',
            'motif.required'=>'renseignez le motif',
            'responsable.required'=>'renseignez le responsable de la consultation',
            'taille.required'=>'renseignez la taille',
            'diagnostique.required'=>'renseignez le diagnostique',
            'activite.required'=>"renseignez l'activite quotidienne",
            'antecedant.required'=>"renseignez l'antecedant",
        ]);

        Consultation::create([
            // dd($request->input('note'))
            'patient_id'=>$request->patient_id,
            'poid'=>$request->poid,
            'tension'=>$request->tension,
            'motif'=>$request->motif,
            'responsable'=>$request->responsable,
            'taille'=>$request->taille,
            'diagnostique'=>$request->diagnostique,
            'activite'=>$request->activite,
            'antecedant'=>$request->antecedant,
            'allergie'=>$request->allergie,
            'add_allergie'=>$request->add_allergie,
            'antecedant'=>$request->antecedant,
            'antecedant_churirgicaux'=>$request->antecedant_churirgicaux,
            'antecedant_familliale'=>$request->antecedant_familliale,
            'autre_antecedant'=>$request->autre_antecedant,
            'note'=>$request->note,
           // 'resultat'=>$request->resultat,
        ]);
        return back()->with('message','consultation enregistre avec success');
    }
    public function update_consultation(Request $request,Consultation $consultation ){
        $request->validate([
            'status'=>'required',
        ],[
            'status.required'=>'faites la selection avant de soumettre'
        ]);
        $consultation->update([
            'status'=>$request->status,
           // dd($request->status)
        ]);
        return back()->with('message','consultation finalisé avec success');
    }
}
