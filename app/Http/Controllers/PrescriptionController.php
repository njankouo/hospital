<?php

namespace App\Http\Controllers;

use App\Models\Consultation;
use App\Models\Patient;
use App\Models\Prescription;
use App\Models\Produit;
use BaconQrCode\Encoder\QrCode;

use Illuminate\Http\Request;
use Symfony\Contracts\Service\Attribute\Required;
use PDF;
class PrescriptionController extends Controller
{
    //
    // public function index($id){
    //     $consultation=Consultation::find($id);
    //     $produit=Produit::all();
    //     $patient=Patient::all();
    //     return view('prescription.index',compact('consultation','produit','patient'));
    // }
    public function savePrescription(Request $request){
        // $request->validate([
        //     'patient_id'=>'Required',
        //     'medicament'=>'Required',
        //     'dosage'=>'Required',

        // ],[
        //     'patient_id.required'=>'renseignez le patient',
        //     'medicament.required'=>'renseignez le medicament',
        //     'dosage.required'=>'renseignez le dosage',
        // ]);

       $prescription = new Prescription();
//dd($request->all());
if($request->input('dosage')==''|| $request->input('medicament')=='' || $request->input('qte')==''){

     $responsable = $request->input('responsable');
       $dispositif=$request->input('dispositif');
       $patient_id = $request->input('patient_id');
       $prescription->patient_id =  $patient_id;
       $prescription->dispositif=$dispositif;
       $prescription->responsable =  $responsable;
       $prescription->save();

}else{
       $dosage = $request->input('dosage');
       $medicament = $request->input('medicament');
       $responsable = $request->input('responsable');
       $patient_id = $request->input('patient_id');
       $qte = $request->input('qte');
       $prescription['dosage'] = implode(',', $request->dosage);
       $prescription->patient_id =  $patient_id;
       $prescription->medicament = implode(',', $medicament);
       $prescription->responsable =  $responsable;
       $prescription->qte = implode(',', $qte);
       $prescription->save();

}
       return redirect('/ordonance');
    }

    public function ordonance(){
        $ordonance=Prescription::orderBy('id','desc')->get();
        $produit=Produit::all();
        return view('ordonance.index',compact('ordonance','produit'));
    }
    public function ordonancePdf($id){

        $ordonance=Prescription::find($id);
        $pdf=PDF::LoadView('ordonance.pdf',compact('ordonance'));
        return $pdf->stream();


    }
    public function deleteOrdonanace($id){
        $ordonance=Prescription::find($id);
        $ordonance->delete();
        return back()->with('success','ordonance retirée avec succes');
    }
}
