<?php

namespace App\Http\Controllers;

use App\Models\fournisseur;
use Illuminate\Http\Request;
use DataTables;
use PDF;

class FournisseurController extends Controller
{
    //
    // public function index(){
    //     $data=[
    //         'four'=>fournisseur::latest()->paginate(5)
    //     ];
    //     return view('fournisseur.fournisseur',$data);
    // }
    public function inde(){
        return view('fournisseur.create');
    }

public function insert(Request $request){
    $request->validate([
        'nom'=>'required',
        'prenom'=>'required',
        'sexe'=>'required',
        'telephone1'=>'required|unique:fournisseurs,telephone1',
        'email'=>'required|unique:fournisseurs,email',

    ],
    [
        'nom.required'=>'veuillez inserer le nom svp',
        'prenom.required'=>'veuillez inserer le prenom',
        'sexe.required'=>'veuillez inserer le sexe',
        'telephone1.required'=>'veuillez inserer le telephone',
        'email.required'=>'veuillez inserer l\'email'
    ]


);
fournisseur::create([
'nom'=>$request->nom,
'prenom'=>$request->prenom,
'sexe'=>$request->sexe,
'telephone1'=>$request->telephone1,
'email'=>$request->email,
]);
 return back()->with('success','fournisseur enregistré avec success');
}
 public function index(Request $request)
    {
       $data=[
        'four'=>fournisseur::latest()->paginate(5)
       ];
        if ($request->ajax()) {
            $data = fournisseur::select('*');
            return Datatables::of($data)
                    ->addIndexColumn()
                    ->addColumn('action', function($row){

                           $btn = '<a href="javascript:void(0) " class="edit btn btn-primary btn-sm">View</a>';

                            return $btn;
                    })
                    ->rawColumns(['action'])
                    ->make(true);
        }

        return view('fournisseur.fournisseur',$data);

}
public function pdf(){
    $fournisseur=fournisseur::all();
    $pdf=PDF::LoadView('fournisseur.pdf',compact('fournisseur'));
    $pdf->stream();
}
public function edit(){
    return view('fournisseur.edit');
}

}
