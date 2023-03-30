<?php

namespace App\Http\Controllers;

use App\Models\Consultation;
use App\Models\Hospitalisation;
use App\Models\Patient;
use App\Models\Prescription;
use Illuminate\Http\Request;

class PatientController extends Controller
{
    //
    public function index(){
        $patient=Patient::orderBy('id','desc')->get();
         return view('patients.index',compact('patient'));
    }
    public function addPatient(Request $request)
    {
        $request->validate([],[]);

        try{
         Patient::create([
                    'nom'=>$request->nom,
                    'date'=>$request->date,
                    'prenom'=>$request->prenom,
                    'telephone'=>$request->telephone,
                    'lieu'=>$request->lieu,
                    'tel'=>$request->tel,
                    'sexe'=>$request->sexe,
                    'email'=>$request->email,
                    'profession'=>$request->profession,
                    'prevenir'=>$request->prevenir,
                    'assurance'=>$request->assurance,
                    'numAssurance'=>$request->numAssurance,
                    'adresse'=>$request->adresse,
                    'groupe'=>$request->groupe,
                    'etat'=>$request->etat,
                    'age'=>$request->age,
                ]);
             return back()->with('message','patient enregistre avec success');
        }catch(\Exception $e){
         return back()->with('error',"erreur survenue l'ors de l'enregistrement");
        }



    }
    public function updatePatient($id){
        $patient=Patient::find($id);
        return view('patients.edit',compact('patient'));
    }
    public function Editpatient(Request $request,Patient $patient){
        $request->validate([],[]);
       $patient->update([
            'nom'=>$request->nom,
            'date'=>$request->date,
            'prenom'=>$request->prenom,
            'telephone'=>$request->telephone,
            'lieu'=>$request->lieu,
            'tel'=>$request->tel,
            'sexe'=>$request->sexe,
            'email'=>$request->email,
            'profession'=>$request->profession,
            'prevenir'=>$request->prevenir,
            'assurance'=>$request->assurance,
            'numAssurance'=>$request->numAssurance,
            'adresse'=>$request->adresse,
        ]);
        return back()->with('success','patient mise a jour avec success');
    }

    public function dossier($id){
        $patient=Patient::find($id);
        $consultation=Consultation::orderBy('id','desc')->get();
        $hospitalisation=Hospitalisation::orderBy('id','desc')->get();
        $prescription=Prescription::orderBy('id','desc')->get();
        return view('patients.dossier',compact('patient','consultation','hospitalisation','prescription'));
    }
}
