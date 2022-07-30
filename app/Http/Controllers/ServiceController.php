<?php

namespace App\Http\Controllers;

use App\Models\Service;
use Illuminate\Http\Request;

class ServiceController extends Controller
{
    public function index()
    {
        $service=Service::all();
        return view('service.index',compact('service'));
    }
    public function creation(Request $request){
        $request->validate([
            'nom'=>'required'
        ],
        [
            'nom.required'=>'renseignez le service'
        ]
        );
        Service::create([
            'nom'=>$request->nom
        ]);
        return back()->with('success','service crée avec success');
    }
    public function supprimer($id){
        $service=Service::find($id);
        $nom=$service->nom;
        $service->delete();
        return back()->with('success',"$nom  retiré de la liste des services");
    }
}
