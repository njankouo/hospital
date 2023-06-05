<?php

namespace App\Http\Controllers;

use App\Models\Conditionnement;
use App\Models\Produit;
use App\Models\Produit_Vente;
use App\Models\Vente;
use Illuminate\Http\Request;

class VenteController extends Controller
{
    //

    public function index(){
        $vente=Vente::orderBy('id','desc')->get();
        return view('ventes.index',compact('vente'));
    }

    public function save($id){
        $produit=Produit::all();
        $conditionnement=Conditionnement::all();
        $vente=Vente::find($id);
        return view('ventes.create',compact('vente','produit','conditionnement'));
    }

    public function save_vente(Request $rquest){
    //     $rquest->validate([
    //         'date'=>'required',
    //         'responsable'=>'required',
    //         ],
    //         [
    //             'date.required'=>'renseignez la date de vente',
    //             'responsable.required'=>'renseignez le responsable de la vente',

    //         ]
    // );
   //dd($rquest->all());
         Vente::create([
            'date'=>$rquest->date_vente,
            'responsable'=>$rquest->responsable,
        //    dd($rquest->input('date_vente'))

         ]);
        return back()->with('message','code vente initialise avec succes');
    }
    public function addvente(Request $request){
        $request->validate([],[]);

        // $produit=Produit::where('id','qte')->get();
        // $vente=Produit_Vente::all();

        // if($produit->qte<$_POST['qte'] || $produit->id==$vente->id)
        // {
        //     return back()->with('error','cette quantite ne peut sortie en stock');
        // }else{
        // Produit_Vente::create([


        // 'produit_id'=>$request->designation,
        // 'qte'=>$request->qte,
        // 'pu'=>$request->pu,
        // 'responsable'=>$request->responsable,
        // 'date'=>$request->date_vente,
        // 'code'=>$request->code,
        // 'conditionnement'=>$request->conditionnement

        // ]);
        // return back()->with('message','produit selectionne avec succes');
        $commande = new Produit_Vente();
        $commande->produit_id = $request->input('nomProduit');
        $commande->qte = $request->input('quantite');
        $commande->pu = $request->input('prix');
        $commande->conditionnement_id = $request->input('conditionnement');
        $commande->code = $request->input('code');
        $commande->responsable = $request->input('responsable');
        $commande->save();

        return response()->json([
            'success' => true,
            'message' => 'Commande ajoutée avec succès.',
            'commande' => $commande
        ]);
    }



    public function listeVente(){
        $vente=Produit_Vente::orderBy('id','asc')->get();
        return view('ventes.list',compact('vente'));
    }

    public function addToCart($id)
    {
        $product = Produit_Vente::findOrFail($id);

        $cart = session()->get('cart', []);

        if(isset($cart[$id])) {
            $cart[$id]['qte']++;
        } else {
            $cart[$id] = [
                "produit_id" => $product->produit_id,
                "qte" => 1,
                "pu" => $product->pu,
                "conditionnement" => $product->conditionnement
            ];
        }

        session()->put('cart', $cart);
        return redirect()->back()->with('success', 'Product added to cart successfully!');
    }

    public function softVente($id){
        $vente=Produit_Vente::find($id);
        $vente->forcedelete();
        return back()->with('success','vente annulé avec succes');
    }
}
