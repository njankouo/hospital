<?php

namespace App\Http\Controllers;

use App\Models\client;
use App\Models\commande;
use App\Models\fournisseur;
use App\Models\produit;
use App\Models\type_produit;
use App\Models\User;
use App\Models\vente;
use App\Models\VenteProduit;
use PDF;
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
        $vente=Vente::latest()->paginate(5);
        return view('vente.index',compact('client','user','vente','produit'));
    }
    public function create(Request $request){
        $request->validate([
            'responsable'=>'required',
            'client'=>'required',
            //'date_vente'=>'required'
        ],
        [
            'responsable.required'=>'renseignez le responsable de la vente',
            'client.required'=>'renseignez le nom du client',
            //'date_vente.required'=>'renseignez la date de la vente'
        ]

    );
    vente::create([
        // dd($request->all())
        'client_id'=>$request->client,
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
        $request->validate([
            'client'=>'required',
            'produit'=>'required',
            'qte'=>'required',
            'pu'=>'required',
            'code'=>'required',
            'date'=>'required',
            'unite'=>'required'

        ],[
           'client.required'=>'renseignez le client',
            'produit.required'=>'renseignez le produit',
            'qte.required'=>'renseignez la qte',
            'pu.required'=>'renseignez le pu',
            'code.required'=>'renseignez le code',
            'date.required'=>'renseignez la date',
            'unite.required'=>'renseignez l\'unite'
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
            'remise'=>$request->remise
        ]);


        return back()->with('success','vente effectuée avec success!');
        Session::flash('message','This is a flash message!');
    }
    public function listeVente(){
        $detail=VenteProduit::latest()->paginate();
        return view('vente.listVente',compact('detail'));
    }
    //  public function autocomplete(Request $request)
    // {
    //     $data = Client::select("nom")
    //             ->where("nom","LIKE","%{$request->input('query')}%")
    //             ->get();

    //     return response()->json($data);
    // }
    //  public function autocompleteSearch(Request $request)
    // {
    //       $query = $request->get('query');
    //       $filterResult = client::where('nom', 'LIKE', '%'. $query. '%')->get();
    //       return response()->json($filterResult);
    // }
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
        return $pdf->stream();
    }
    public function statistique(){
        // $vente=commande::select(DB::raw("COUNT(*) as count "))
        // ->whereYear('created_at',date('Y'))
        // ->groupBy(DB::raw("Month(created_at)"))
        // ->pluck('count');
        // $months=VenteProduit::select(DB::raw("Month(date_vente) as month"))
        // ->whereYear('date_vente',date('Y'))
        // ->groupBy(DB::raw("Month(date_vente)"))
        // ->pluck('count');
        // $datas=array(0,0,0,0,0,0,0,0,0,0,0,0);
        //     foreach($months as $index=>$month){
        //         $datas[$month]=$vente[$index];
        //     }
        //  $datas = VenteProduit::select(\DB::raw("COUNT(*) as count"))
        //             ->whereYear('created_at', date('Y'))
        //             ->groupBy(\DB::raw("Month(created_at)"))
        //             ->pluck('count');
// $categories = VenteProduit::with("produit")->get();
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
        return back()->with('success','surpression du client reussi');

    }
     public function searchDB(Request $request)
    {
          $search = $request->get('');

          $result = client::where('nom', 'LIKE', '%'. $search. '%')->get();

          return response()->json($result);

    }
}
