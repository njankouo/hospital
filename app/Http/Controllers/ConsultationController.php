<?php

namespace App\Http\Controllers;

use App\Models\Consultation;
use App\Models\Patient;
use App\Models\Produit;
use App\Models\Rdv;
use Illuminate\Http\Request;
use PDF;
class ConsultationController extends Controller
{
    public function index(){
        $consultation=Consultation::withcount('patient')->get();
        $patient=Patient::all();
        $produit=Produit::all();
        return view('consultations.index',compact('consultation','patient','produit'));
    }

    public function new(){
        $patient=Patient::orderBy('id','asc')->get();
        return view('consultations.new',compact('patient'));
    }

    public function addConsultation(Request $request){

        // $request->validate([
        //     'patient_id' => 'required',
        //      'poid' => 'required',
        //      'tension' => 'required',
        //      'motif' => 'required',
        //      'responsable' => 'required',
        //      'taille' => 'required',
        //      'diagnostique' => 'required',
        //      'activite' => 'required',
        //      'antecedant' => 'required',
        // ],[
        //     'patient_id.required'=>'renseignez le patient',
        //     'poid.required'=>'renseignez le poid',
        //     'tension.required'=>'renseignez la tension',
        //     'motif.required'=>'renseignez le motif',
        //     'responsable.required'=>'renseignez le responsable de la consultation',
        //     'taille.required'=>'renseignez la taille',
        //     'diagnostique.required'=>'renseignez le diagnostique',
        //     'activite.required'=>"renseignez l'activite quotidienne",
        //     'antecedant.required'=>"renseignez l'antecedant",
        // ]);

        Consultation::create([
        // dd($request->all()),
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
            'symptomes'=>$request->symptomes,
            'medicaments'=>$request->medicaments,
            'resultats'=>$request->resultats
           // 'resultat'=>$request->resultat,
        ]);
        return back()->with('message','consultation enregistre avec success');
    }
    public function update_consultation($id){
        $consultation=Consultation::find($id);
        $consultation->delete();
        return back()->with('message','consultation finalisé avec success');
    }
    public function fichierConsultation($id){
        $consultation=Consultation::find($id);
        $pdf=PDF::LoadView('consultations.fichier',compact('consultation'));
        return $pdf->stream();
    }
    public function addRdv(Request $request){
        $request->validate([],[]);

        Rdv::create([
            'date'=>$request->date,
            'responsable'=>$request->responsable,
            'consultation_id'=>$request->consultation_id,
            'end_date'=>$request->end_date,
            'titre'=>$request->motif,
            'patient_id'=>$request->patient_id
        ]);
return back()->with('success','prochain rendez-vous etablit');
    }
    public function addPrescription($id){
        $consultations=Consultation::find($id);
        $produit=Produit::all();
        return view('consultations.addprescription',compact('consultations','produit'));
    }
}
