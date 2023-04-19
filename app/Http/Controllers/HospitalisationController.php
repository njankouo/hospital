<?php

namespace App\Http\Controllers;

use App\Models\Chambre;
use App\Models\Hospitalisation;
use App\Models\Patient;
use Illuminate\Http\Request;
use Twilio\Rest\Preview\HostedNumbers;

class HospitalisationController extends Controller
{
    //

    public function index(){
        $patient=Patient::all();
        $chambre=Chambre::withcount('hospitalisation')->get();
        $hospitalisation=Hospitalisation::orderBy('id','desc')->get();
        return view('hospitalisations.index',compact('patient','chambre','hospitalisation'));
    }


    public function hospitFinish(){
        $hospitalisation=Hospitalisation::onlyTrashed()->get();
        return view('hospitalisations.finish',compact('hospitalisation'));
    }
    public function save(Request $request){
        // $request->validate([
        //     'patient_id'=>'required',
        //     'datedebut'=>'required',
        //     'datefin'=>'required',
        //     'note'=>'required',
        //     'chambre_id'=>'required',
        // ],
        // [
        //     'patient_id.required'=>'renseignez le patient',
        //     'datedebut.required'=>'renseignez la date de debut',
        //     'datefin.required'=>'renseignez la date de fin',
        //     'note.required'=>'renseignez une note',
        //     'chambre_id.required'=>'renseignez la chambre',
        // ]
        // );

        Hospitalisation::create([
            'patient_id'=>$request->patient_id,
            'datedebut'=>$request->datedebut,
            'datefin'=>$request->datefin,
            'note'=>$request->note,
            'chambre_id'=>$request->chambre_id,
            'responsable'=>$request->responsable,

        ]);
        return back()->with('success','hospitalisation creé avec succes');
    }
    public function edit(Request $request,Hospitalisation $hospitalisation){
        $request->validate([],[]);

        $hospitalisation->update([
            'patient_id'=>$request->patient_id
        ]);
        return back()->with('success','hospitalisation terminée');
    }

    public function softHospit($id){
        $hospitalisation=Hospitalisation::find($id);
        $hospitalisation->delete();
        return back()->with('success','hospitalisation terminé');
    }

}
