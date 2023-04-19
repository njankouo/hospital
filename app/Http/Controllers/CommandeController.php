<?php

namespace App\Http\Controllers;

use App\Models\Commande;
use App\Models\CommandeArticle;
use App\Models\Conditionnement;
use App\Models\Livraison;
use App\Models\Produit;
use Illuminate\Http\Request;

class CommandeController extends Controller
{

    public function index(){
        $commande=Commande::orderBy('id','desc')->get();
        return view('commandes.index',compact('commande'));
    }
    public function addCommande(Request $request){
        $request->validate([],[]);

        Commande::create([
            'dateCommande'=>$request->dateCommande,
            'dateLivraison'=>$request->dateLivraison,
            'fournisseur'=>$request->fournisseur,
            'responsableCom'=>$request->responsableCom
        ]);
        return back()->with('success','commande cree avec success');
    }
    public function valide($id){
        $produit=Produit::all();
        $commande=Commande::find($id);
        $conditionnement=Conditionnement::all();
        return view('commandes.commndeArticle',compact('commande','produit','conditionnement'));
    }
    public function generatePrice(Request $request)
{
   $req=Produit::select('pu')->where('id',$request->id)->first();
    return response()->json($req);
}

public function saveProduit(){
    $commande=CommandeArticle::orderBy('id','desc')->get();
    return view('commandes.commandeliste',compact('commande'));
}
public function ValidCommande(Request $request){
    $request->validate([],[]);
    CommandeArticle::create([
        'produit_id'=>$request->produit,
        'qte'=>$request->qteCommande,
        'pu'=>$request->pu,
        'dateCommande'=>$request->dateCommande,
        'dateLivraison'=>$request->dateLivraison,
        'code'=>$request->code,
        'conditionnement_id'=>$request->conditionnement_id,
    ]);
    return back()->with('success');
}
public function addLivraison(Request $request, CommandeArticle $commande){
    $request->validate([],[]);
    Livraison::create([
        'produit_id'=>$request->produit_id,
        'qte'=>$request->qte,
        'pu'=>$request->pu,
        'dateCommande'=>$request->dateCommande,
        'dateLivraison'=>$request->dateLivraison,
        'conditionnement_id'=>$request->conditionnement_id,
        'code'=>$request->code,
       // dd($request->all())

   ]);
   $commande->update([
    'status'=>$request->status
   ]);

  // dd($request->input('status'));
    return back()->with('success');
}
public function softcommande($id){
    $commande=CommandeArticle::find($id);
    $commande->delete();
    return back()->with('success','commande annulé avec succes');
}

public function restored(){
    $commande=CommandeArticle::onlyTrashed()->get();
    return view('commandes.commandeSoft',compact('commande'));
}
}
