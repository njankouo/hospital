<?php

namespace App\Http\Controllers;

use PDF;
use Cart;
use Carbon\Carbon;
use App\Models\User;
use NumberFormatter;
use App\Models\vente;
use App\Models\client;
use App\Models\produit;
//use Darryldecode\Cart\Cart;
use App\Models\commande;
use App\Models\fournisseur;
use App\Models\type_produit;
use App\Models\VenteProduit;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

class VenteController extends Controller
{
    //
    public function index(){
        $client=client::all();
        $user=User::all();
        $produit=produit::all();
        $vente=Vente::latest()->paginate();
        $carbon=\Carbon\Carbon::now();
        return view('vente.index',compact('client','user','vente','produit','carbon'));
    }
    public function create(Request $request){
        $request->validate([
            'responsable'=>'required',
           // 'client'=>'required',
            //'date_vente'=>'required'
        ],
        [
            'responsable.required'=>'renseignez le responsable de la vente',
           // 'client.required'=>'renseignez le nom du client',
            //'date_vente.required'=>'renseignez la date de la vente'
        ]

    );
    vente::create([
        // dd($request->all())
       // 'client_id'=>$request->client,
        'user_id'=>$request->responsable,
        'date_vente'=>$request->date

    ]);

    return back()->with('success','vente initialisé avec success');
    }
    public function edit($id){
        $vente=vente::find($id);
        $type=type_produit::all();
        $produit=produit::all();
        $client=client::all();
        $user=User::all();
        return view('vente.venteProduit',compact('vente','type','produit','client','user'));
    }
    public function venteProduit(Request $request){
        try {
             $request->validate([
            'client'=>'required',
            'produit'=>'required',
            'qte'=>'required',
            'pu'=>'required',
            'code'=>'required',
            'date'=>'required',
            'unite'=>'required',
            'reglement'=>'required'

        ],[
           'client.required'=>'renseignez le client',
            'produit.required'=>'renseignez le produit',
            'qte.required'=>'renseignez la qte',
            'pu.required'=>'renseignez le pu',
            'code.required'=>'renseignez le code',
            'date.required'=>'renseignez la date',
            'unite.required'=>'renseignez l\'unite',
            'reglement.required'=>'renseignez le mode de reglement'
        ]);

        VenteProduit::create([
            // dd($request->all())
            'produit_id'=>$request->produit,
            'vente_id'=>$request->code,
            'pu'=>$request->pu,
            'qte_sortie'=>$request->qte,
            'unite'=>$request->unite,
            'client'=>$request->client,
            'user'=>$request->user,
            'date_vente'=>$request->date,
            'remise'=>$request->remise,
            'reglement'=>$request->reglement
        ]);


        return back()->with('success','vente effectuée avec success!');
        Session::flash('message','This is a flash message!');
        } catch (\Throwable $th) {
            //throw $th;
            return back()->with('error','vente non effectue');
        }

    }
    public function listeVente(){
       // $detail=VenteProduit::all();
         $carbon=\Carbon\Carbon::now();
        if (request()->start_date || request()->end_date) {
        $start_date = Carbon::parse(request()->start_date)->toDateTimeString();
        $end_date = Carbon::parse(request()->end_date)->toDateTimeString();
        $detail = VenteProduit::whereBetween('date_vente',[$start_date,$end_date])->get();
    } else {
        $detail = VenteProduit::latest()->get();
    }
        return view('vente.listVente',compact('detail','carbon'));
    }

     public function autocomplete(Request $request)
    {
        $data = Client::select("nom")
                ->where("nom","LIKE","%{$request->query}%")
                ->get();

        return response()->json($data);
    }
    public function facture($id){
        $vente=VenteProduit::find($id);
        $pdf=PDF::loadview('vente.facture',compact('vente'))->setOptions(['setPaper'=>'A4']);
        return $pdf->stream('facture.pdf');
    }
    public function statistique(){
  $users = VenteProduit::select(DB::raw("COUNT(*) as count"), DB::raw("MONTHNAME(date_vente) as month_name"))
                    ->whereYear('date_vente', date('Y'))
                    ->groupBy(DB::raw("Month(date_vente)"))
                    ->pluck('count', 'month_name');

        $labels = $users->keys();
        $data = $users->values();
    	return view('statistics.statistic',compact('labels', 'data'));


    }
    public function updateVente($id){
        $vent=VenteProduit::find($id);
        $client=Client::all();
        $produit=Produit::all();
        $unite=type_produit::all();
        $user=User::all();
        $type=type_produit::all();
        return view('vente.update',compact('vent','client','produit','unite','user','type'));
    }
    public function updateView(Request $request,VenteProduit $vent){
$vent->update([
            // dd($request->all())
            'produit_id'=>$request->produit,

            'pu'=>$request->pu,
            'qte_sortie'=>$request->qte,
            'unite'=>$request->unite,
            'client'=>$request->client,
            'user'=>$request->user,
            'date_vente'=>$request->date,
            'remise'=>$request->remise
        ]);

        return redirect('/liste/vente');

    }
    public function deleteVente($id){
          $details=VenteProduit::find($id);
        $details->delete();
        return back()->with('success','vente rétiré avec success!!!!!');

    }
     public function searchDB(Request $request)
    {
          $search = $request->get('');

          $result = client::where('nom', 'LIKE', '%'. $search. '%')->get();

          return response()->json($result);

    }
    public function addCart($id){

$vente = VenteProduit::findOrFail($id);

        $cart = session()->get('cart', []);

        if(isset($cart[$id])) {
            // $cart[$id]['qte_sortie']++;
        } else {
            $cart[] = [
                "produit_id" => $vente->produit->designation,
                "qte_sortie" => $vente->qte_sortie,
                    "unite" => $vente->unite,
                "pu" => $vente->pu,
                "unite" => $vente->unite,
                "remise"=>$vente->remise

            ];
        }

        session()->put('cart', $cart);
        return redirect()->back()->with('success', 'facture crée avec success!');
    }
public function Ventegroup(){
    $cartItems = \Cart::getContent();
    return view('vente.cart',compact('cartItems'));
}
public function factureGroupe(){
    $details= venteProduit::all();
    $cartItems = \Cart::getContent();
  //  $digit = new NumberFormatter("en", NumberFormatter::SPELLOUT);
    $pdf=PDF::loadview('vente.facture',compact('details','cartItems'))->setOptions(['setPaper'=>'A4']);
    $pdf->setPaper('A4','landscape');
    return $pdf->stream();
}




/**cette partie du code est non utilisable dans ce projet neamoins sa surppression peut engendrer des bugs dans l'application */
public function updated(Request $request){
          if($request->id && $request->qte_sortie){
            $cart = session()->get('cart');
            $cart[$request->id]["qte_sortie"] = $request->qte_sortie;
            session()->put('cart', $cart);
            return back()->flash('success', 'Cart updated successfully');
        }
    }

 public function remov(Request $request)
    {
        if($request->id) {
            $cart = session()->get('cart');
            if(isset($cart[$request->id])) {
                unset($cart[$request->id]);
                session()->put('cart', $cart);
            }
            session()->flash('success', 'Product removed successfully');
        }
    }

/**cette partie du code est non utilisable dans ce projet neamoins sa surppression peut engendrer des bugs dans l'application */








//cette partie regroupe l'ajout au panier et la surppression au panier//


public function clearAllCart()
    {
        Cart::clear();

        session()->flash('success', 'toutes les ventes retiré avec success!');

        return redirect()->route('vente.group');
    }
     public function addToCart(Request $request)
    {
        \Cart::add([
            'id' => $request->id,
            'name' => $request->name,
            'price' => $request->pu,
            'quantity' => $request->qte_sortie,
            'attributes' => array(
                'remise' => $request->remise,
                'unite'=>$request->unite,
                'client'=>$request->client,
                'user'=>$request->user,
            )
        ]);
        session()->flash('success', 'ventes ajouté avec success !');

        return redirect()->route('vente.group');
    }
//utilisation de la bibliotheque cart et adaptation au projet de vente//

 public function deleteOne(Request $request)
    {
        \Cart::remove($request->id);
        session()->flash('success', 'Item Cart Remove Successfully !');

        return redirect()->route('vente.group');
    }

}
