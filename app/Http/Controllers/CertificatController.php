<?php

namespace App\Http\Controllers;

use App\Models\Patient;
use Illuminate\Http\Request;
use PDF;
class CertificatController extends Controller
{
    public function index($id){
        $patient=Patient::find($id);

        $pdf=PDF::loadView('certificats.aptitude',compact('patient'));
        return $pdf->stream();

    }

    public function index2($id){
        $patient=Patient::find($id);

        $pdf=PDF::loadView('certificats.vaccination',compact('patient'));
        return $pdf->stream();
    }

    public function index3($id){
        $patient=Patient::find($id);

        $pdf=PDF::loadView('certificats.travail',compact('patient'));
        return $pdf->stream();
    }
}
