<?php

namespace App\Http\Controllers;

use App\Models\Consultation;
use App\Models\Patient;
use App\Models\Prescription;
use App\Models\Produit;
use Illuminate\Http\Request;

class ExamenController extends Controller
{
    //

    public function index(){
        $patient=Patient::orderBy('id','desc')->get();
        $consultation=Consultation::orderBy('id','asc')->get();
        return view('examens.index',compact('patient','consultation'));
    }

    public function option($id){
        $patient=Patient::find($id);
        $produit=Produit::all();

        return view('examens.info',compact('patient','produit'));
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
}
