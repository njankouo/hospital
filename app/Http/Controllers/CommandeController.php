<?php

namespace App\Http\Controllers;

use PDF;
use App\Models\Type;
use App\Models\produit;
use App\Models\commande;
use App\Models\Livraison;
use App\Models\fournisseur;
use App\Models\type_produit;
use Illuminate\Http\Request;
use App\Models\CommandeArticle;

class CommandeController extends Controller
{
    //
    public function index(){
        $fournisseur=fournisseur::all();
        $commande=Commande::latest()->paginate(5);
        return view('commande.command',compact('fournisseur','commande'));
    }
    public function save(Request $request){
        $request->validate([
            'fournisseur'=>'required',
            'date'=>'required',
            'dateLivraison'=>'required',

        ],
        [
            'fournisseur.required'=>'veuillez renseignetr le fournisseur',
            'date.required'=>'veuillez renseigner la date de commande',
            'dateLivraison.required'=>'veuillez renseigner la date de livraison',

        ]

    );
    commande::create([
        // dd($request->all());
        'fournisseur_id'=>$request->fournisseur,
        'date_commande'=>$request->date,
        'date_livraison'=>$request->dateLivraison,
        'status'=>$request->status,

    ]);
    return back()->with('success','commande crée avec success!');
    }
    public function commandeArticle($id){
        $fournisseur=fournisseur::all();
        $commande=commande::find($id);
        $produit=produit::all();
        $type=type_produit::all();
return view('commande.commandeArticle',compact('fournisseur','commande','produit','type'));
    }
    public function view2(){
        $command=CommandeArticle::all();
        return view('commande.listCommande',compact('command'));
    }
    public function command(Request $request){
        $request->validate([
            'produit'=>'required',
            'unite'=>'required',
            'pu'=>'required',
            'qte'=>'required',
            'mode'=>'required'
        ],
        [
            'produit.required'=>'renseignez le produit',
            'unite.required'=>'renseignez l\'unite',
            'pu.required'=>'renseignez le pu',
            'qte.required'=>'renseignz la qte',
            'mode.required'=>'renseignez le mode de reglement'
        ]

    );
    CommandeArticle::create([
        // dd($request->all())
        'produit_id'=>$request->produit,
        'commande_id'=>$request->code,
        'qte'=>$request->qte,
        'pu'=>$request->pu,
        'status'=>$request->status,
        'fournisseur'=>$request->fournisseur,
        'date_commande'=>$request->date,
        'unite'=>$request->unite,
        'date_livraison'=>$request->dateLivraison,
        'reglement'=>$request->mode,
        'remise'=>$request->remise,

    ]);
    return back()->with('success','commande bien validé');
    }
    public function bonCommande($id){
        $commande=CommandeArticle::find($id);
        $pdf=PDF::loadview('commande.bon',compact('commande'))->setOptions(['setPaper'=>'A4']);
       return $pdf->stream();

    }
    public function edition($id){
        $fournisseur=fournisseur::all();
        $commande=CommandeArticle::find($id);
        $produit=produit::all();
        $type=type_produit::all();
        return view('commande.edit',compact('fournisseur','commande','produit','type'));
    }
    public function edit(Request $request,CommandeArticle $commande){
        $request->validate([],[]);

            $commande->update([
                'status'=>$request->status
            ]);
            Livraison::create([
                'produit_id'=>$request->produit,
        'commande_id'=>$request->code,
        'qte'=>$request->qte,
        'pu'=>$request->pu,
        'status'=>$request->status,
        'fournisseur'=>$request->fournisseur,
        'date_commande'=>$request->date,
        'unite'=>$request->unite,
        'date_livraison'=>$request->dateLivraison,

            ]);


    return redirect('/livraison');
}
public function livraison(){
    $livraison=Livraison::all();
    return view('commande.livraison',compact('livraison'));
}
public function bonlivraison($id){
    $commande=CommandeArticle::find($id);

   $pdf= PDF::loadview('commande.bonLivraison',compact('commande'))->setOptions(['setPaper'=>'landscape']);;
   return  $pdf->stream();
}
}
