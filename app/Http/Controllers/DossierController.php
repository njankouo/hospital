<?php

namespace App\Http\Controllers;

use App\Models\Examen;
use App\Models\Patient;
use App\Models\Rdv;
use App\Models\User;
use Illuminate\Http\Request;
use PDF;
class DossierController extends Controller
{
    //

    public function index(){
        $patient=Patient::all();
        return view('dossier.index',compact('patient'));
    }

    public function dossier($id){
        $patient=Patient::find($id);
        $consultation=$patient->consultation;
        $prescription=$patient->prescription;
        $rdv=$patient->rdv;
        $hospitalisation=$patient->hospitalisation;
        $examen=$patient->examen;
        $pdf=PDF::loadview('dossier.fichier',compact('patient','consultation','prescription','rdv','hospitalisation','examen'));
       return $pdf->stream();
        //return $pdf->download();
    }

    public function download_pdf($id){
        $patient=Patient::find($id);
        $consultation=$patient->consultation;
        $prescription=$patient->prescription;
        $rdv=$patient->rdv;
        $hospitalisation=$patient->hospitalisation;
        $examen=$patient->examen;
        $pdf=PDF::Loadview('dossier.fichier',compact('patient','consultation','prescription','rdv','hospitalisation','examen'));
       return $pdf->download();
    }
}


