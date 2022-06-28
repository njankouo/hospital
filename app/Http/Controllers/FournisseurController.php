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

public function insertion(Request $request){
    $request->validate([
        'nom'=>'required',
       // 'prenom'=>'required',
        'sexe'=>'required',
        'telephone1'=>'required|unique:fournisseurs,telephone1',
        'email'=>'required|unique:fournisseurs,email',
        'status'=>'required'

    ],
    [
        'nom.required'=>'veuillez inserer le nom svp',
       // 'prenom.required'=>'veuillez inserer le prenom',
        'sexe.required'=>'veuillez inserer le sexe',
        'telephone1.required'=>'veuillez inserer le telephone',
        'email.required'=>'veuillez inserer l\'email',
        'status.required'=>'renseignez le status svp'
    ]


);
fournisseur::create([
    // dd($request->all())
'nom'=>$request->nom,
'prenom'=>$request->prenom,
'sexe'=>$request->sexe,
'telephone1'=>$request->telephone1,
'email'=>$request->email,
'status'=>$request->status
]);
 return back()->with('success','fournisseur enregistré avec success');
}
 public function index()
    {
       $data=[
        'four'=>fournisseur::latest()->paginate(5)
       ];

        return view('fournisseur.fournisseur',$data);

}
public function pdf(){
    $fournisseur=fournisseur::all();
    $pdf=PDF::LoadView('fournisseur.pdf',compact('fournisseur'))->setOptions(['setPaper'=>'A4']);
  return  $pdf->stream();
}
public function edit($id){
    $fournisseur=Fournisseur::find($id);
    return view('fournisseur.edit',compact('fournisseur'));
}
public function editer(Request $request,fournisseur $fournisseur){
    $request->validate([],[]);
    $fournisseur->update([
'nom'=>$request->nom,
'prenom'=>$request->prenom,
'sexe'=>$request->sexe,
'telephone1'=>$request->telephone1,
'email'=>$request->email,
'status'=>$request->status

    ]);
    return back()->with('success','fournisseur mise à jour avec success');
}
}
