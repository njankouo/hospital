<?php

namespace App\Http\Controllers;

use App\Models\Patient;
use Illuminate\Http\Request;

class ExamenController extends Controller
{
    //

    public function index(){
        $patient=Patient::orderBy('id','desc')->get();
        return view('examens.index',compact('patient'));
    }

    public function option($id){
        $patient=Patient::find($id);
        return view('examens.info',compact('patient'));
    }
}
