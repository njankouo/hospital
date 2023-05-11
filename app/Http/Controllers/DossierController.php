<?php

namespace App\Http\Controllers;

use App\Models\Patient;
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
        $patient=Patient::withcount('consultation')->find($id);
        $pdf=PDF::loadview('dossier.fichier',compact('patient'));
       return $pdf->stream();
        //return $pdf->download();
    }

    public function download_pdf(){
        $pdf=PDF::Loadview('dossier.fichier');
       return $pdf->download();
    }
}


