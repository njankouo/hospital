<?php

namespace App\Http\Controllers;

use App\Models\Consultation;
use App\Models\Examen;
use App\Models\Patient;
use App\Models\Prescription;
use App\Models\Produit;
use Illuminate\Http\Request;

class ExamenController extends Controller
{
    //

    public function index(){
        $patient=Prescription::orderBy('patient_id','desc')->get();
        //$consultation=Consultation::orderBy('id','asc')->get();
        return view('examens.index',compact('patient'));
    }

    public function option($id){
        $patient=Prescription::find($id);
      //  $produit=Produit::all();

        return view('examens.info',compact('patient'));
    }

    public function addPprescription(Request $request){
        $request->validate([
            'produit_id'=>'required',
            'posologie'=>'required',
            'qte'=>'required'
        ],[
            'produit_id.required'=>'renseignez le produit',
            'posologie.required'=>'renseignez la posologie',
            'qte.required'=>'renseignez le quantite',
        ]);

        $prescription = new Prescription();
       // dd($request->all());
               $dosage = $request->input('dosage');
               $medicament = $request->input('produit_id');
               $responsable = $request->input('responsable');
               $patient_id = $request->input('patient_id');
               $qte = $request->input('qte');
               $prescription->dosage = implode(',', $dosage);
               $prescription->patient_id =  $patient_id;
               $prescription->medicament = implode(',', $medicament);
               $prescription->responsable =  $responsable;
               $prescription->qte = implode(',', $qte);
               $prescription->save();


               return redirect('/ordonance');
    }

    public function save(Request $request){
        //dd($request->all());
        // $request->validate([
        //     'file'=>'required',
        //     'observation'=>'required',

        // ],[
            
        // ]);
        Examen::create([
            'file'=>$request->file,
            'date_naissance'=>$request->date_naissance,
            'date_examen'=>$request->date_examen,
            'observation'=>$request->observation,
            'adresse'=>$request->adresse,
            'patient_id'=>$request->patient_id,
            'consultation_id'=>$request->consultation_id,
            'traitement'=>$request->traitement
        ]);
        return back()->with('success','examen finalisé avec success');
    }
}
