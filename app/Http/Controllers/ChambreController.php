<?php

namespace App\Http\Controllers;

use App\Models\Chambre;
use App\Models\Hospitalisation;
use Illuminate\Http\Request;

class ChambreController extends Controller
{
    public function index(){
        $chambre=Chambre::orderBy('id','desc')->get();
        $hospitalisation=Hospitalisation::all();
        return view('chambres.index',compact('chambre','hospitalisation'));
    }
    public function save(Request $request){
        $request->validate([]);
        Chambre::create([
            'appreciation'=>$request->appreciation,
            'numero'=>$request->numero
        ]);
        return back()->with('info','chambre enregistre avec success');
    }
}
