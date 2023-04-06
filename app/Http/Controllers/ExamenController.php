<?php

namespace App\Http\Controllers;

use App\Models\Consultation;
use App\Models\Patient;
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
        return view('examens.info',compact('patient'));
    }
}
