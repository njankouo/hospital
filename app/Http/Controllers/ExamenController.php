<?php

namespace App\Http\Controllers;

use App\Models\Consultation;
use App\Models\Examen;
use App\Models\Patient;
use App\Models\Prescription;
use App\Models\Produit;
use Illuminate\Http\Request;
use PDF;
class ExamenController extends Controller
{
    //

    public function index(){
        $prescription=Prescription::orderBy('id','desc')->get();
       // $consultation=Consultation::orderBy('id','asc')->get();
        $patients=Patient::all();
        $examen=Examen::orderBy('id','asc')->get();
        return view('examens.index',compact('prescription','patients','examen'));
    }

    public function option($id){
        $patient=Examen::find($id);
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

    public function save(Request $request,$id){
        //dd($request->all());
        // $request->validate([
        //     'file'=>'required',
        //     'observation'=>'required',

        // ],[

        // ]);
       // dd($request->all());
       $fileModel = Examen::find($id);
       if($request->file()) {
           $fileName = time().'_'.$request->file->getClientOriginalName();
           $filePath = $request->file('file')->storeAs('uploads', $fileName, 'public');
           $fileModel->file = time().'_'.$request->file->getClientOriginalName();
           $fileModel->file = '/storage/' . $filePath;
           $fileModel->observation=$request->observation;
           $fileModel->traitement=$request->traitement;
          $fileModel->save();
       }
        // $patient->update([

        //    'file'=>$request->file,
           // 'date_naissance'=>$request->date_naissance,
           // 'date_examen'=>$request->date_examen,
            // 'observation'=>$request->observation,
           // 'adresse'=>$request->adresse,
            //'patient_id'=>$request->patient_id,

        //     'traitement'=>$request->traitement

        // ]);

        return redirect('examen/vue')->with('success');

}

    public function addExams(Request $request){
        Examen::create([
         'responsable'=>$request->responsable,
         'date_examen'=>$request->date_examen,
         'examen'=>$request->examen,
            'patient_id'=>$request->patient_id,
            'prescription_id'=>$request->prescription_id,
            'traitement'=>$request->traitement,
        ]);
        return back()->with('success','examen initialisé avec success');
    }
    public function viewPdf($id){
        $examen=Examen::find($id);
        $pdf=PDF::Loadview('examens.fichier',compact('examen'));
        return $pdf->stream();
    }
    public function generation(Request $request){
        $req=Prescription::select('patient_id','examen','prescription_name','responsable')->where('id',$request->id)->first();
        return response()->json($req);
    }
}
