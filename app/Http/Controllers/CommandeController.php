<?php

namespace App\Http\Controllers;

use PDF;
use Cart;
use notify;
use App\Models\Type;
use App\Models\produit;
use App\Models\commande;
use App\Models\Livraison;
use App\Models\fournisseur;
use App\Models\type_produit;
use Illuminate\Http\Request;
use App\Models\CommandeArticle;
use PhpOffice\PhpSpreadsheet\Reader\Xls\RC4;

class CommandeController extends Controller
{
    //
    public function index(){
        $fournisseur=fournisseur::all();
        $commande=Commande::latest()->paginate(5);
        $produit=produit::all();
        $unite=type_produit::all();
        return view('commande.command',compact('fournisseur','commande','produit','unite'));
    }
    public function save(Request $request){
        $request->validate([
            'fournisseur'=>'required',
            'date'=>'required',
            'dateLivraison'=>'required',
            // 'pu'=>'required',
            // 'unite'=>'required',
            // 'produit'=>'required',
            // 'qte'=>'required'

        ],
        [
            'fournisseur.required'=>'veuillez renseignetr le fournisseur',
            'date.required'=>'veuillez renseigner la date de commande',
            'dateLivraison.required'=>'veuillez renseigner la date de livraison',
            // 'pu.required'=>'veuillez renseigner le pu',
            // 'unite.required'=>"veuillez renseigner l\'unite",
            // 'produit.required'=>"veuillez renseigner le produit",
            // 'qte.required'=>"veuillez renseigner la qte"

        ]

    );
    commande::create([
        // dd($request->all());
        'fournisseur_id'=>$request->fournisseur,
        'date_commande'=>$request->date,
        'date_livraison'=>$request->dateLivraison,
        'status'=>$request->status,
        // 'pu'=>$request->pu,
        // 'qte'=>$request->qte,
        // 'produit'=>$request->produit,
        // 'unite'=>$request->unite

    ]);
      session()->put('success','Item is successfully created.');
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
        //dd($request->all())
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
             try {
                //code...

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
     } catch (\Throwable $th) {
             return back()->with('error','une erreur à s\'est dans le système veuillez contacter le concepteur');

            }
}
public function livraison(){
    $livraison=Livraison::latest()->paginate();
    return view('commande.livraison',compact('livraison'));
}
public function bonlivraison($id){
    $commande=CommandeArticle::find($id);

   $pdf= PDF::loadview('commande.bonLivraison',compact('commande'))->setOptions(['setPaper'=>'landscape']);;
   return  $pdf->stream();
}
  public function addToCart($id)
    {
        $commandes = CommandeArticle::findOrFail($id);

        $cart = session()->get('cart', []);

        if(isset($cart[$id])) {
            $cart[$id]['qte']++;
        } else {
            $cart[] = [
                "produit_id" => $commandes->produit->designation,
                "qte" => $commandes->qte,
                    "unite" => $commandes->unite,
                "pu" => $commandes->pu,
                "unite" => $commandes->unite,
                "remise"=>$commandes->remise

            ];
        }

        session()->put('cart', $cart);
        return redirect()->back()->with('success', 'commande placé avec success!');
    }




    public function cart(){
         $cartItems = \Cart::getContent();
        return view('commande.cart',compact('cartItems'));
    }










public function factureGroup(){
      $cartItems = \Cart::getContent();
    $pdf=PDF::loadview('commande.facture',compact('cartItems'))->setOptions(['setPaper'=>'A4']);
  $pdf->setPaper('A4','landscape');

    return $pdf->stream();
}
public function livraisonGroup(){
    $cartItems = \Cart::getContent();
    $pdf=PDF::loadview('commande.LivraisonGroup',compact('cartItems'))->setOptions(['setPaper'=>'A4']);
    $pdf->setPaper('A4','landscape');
    return $pdf->stream();
}






 public function ToCart($id)
    {
        $livraisons = Livraison::findOrFail($id);

        $cart = session()->get('cart', []);

        if(isset($cart[$id])) {
            $cart[$id]['qte']++;
        } else {
            $cart[] = [
                "produit_id" => $livraisons->produit->designation,
                "qte" => $livraisons->qte,
                    "unite" => $livraisons->unite,
                "pu" => $livraisons->pu,
                "unite" => $livraisons->unite,
                "remise"=>$livraisons->remise

            ];
        }
        session()->put('cart', $cart);
        return redirect()->back()->with('success', 'facture crée avec success!');
    }

      public function remove(Request $request)
    {
        if($request->id) {
            $cart = session()->get('cart');
            if(isset($cart[$request->id])) {
                unset($cart[$request->id]);
                session()->put('cart', $cart);
            }
            session()->flash('success', 'commande rétiré avec success');
        }
}







    public function GroupLivraison(){
         $cartItems = \Cart::getContent();
        return view('commande.cartLivraison',compact('cartItems'));
    }
public function clearAllCart()
    {
        Cart::clear();

        session()->flash('success', 'toutes les commandes retiré avec success!');

        return redirect()->route('cart');
    }
     public function addCart(Request $request)
    {
        Cart::add([
            'id' => $request->id,
            'name' => $request->name,
            'price' => $request->pu,
            'quantity' => $request->qte,

            'attributes' => array(
                'remise' => $request->remise,
                'unite'=>$request->unite,
                 //'produit' => $request->produit,
                  //'pu' => $request->pu,
                  //'qte' => $request->qte,
                  'reglement' => $request->reglement,
            )
        ]);
        session()->flash('success', 'commande ajouté avec success !');

        return redirect()->route('cart');
    }
//utilisation de la bibliotheque cart et adaptation au projet de vente//

public function generatePrice(Request $request)
{
   $req=Produit::select('pu')->where('id',$request->id)->first();
    return response()->json($req);
}}

