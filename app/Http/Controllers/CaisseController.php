<?php

namespace App\Http\Controllers;

use PDF;
use Carbon\Carbon;
use App\Models\VenteProduit;
use Illuminate\Http\Request;
use App\Models\CommandeArticle;
use Illuminate\Support\Facades\DB;

class CaisseController extends Controller
{
    //
    public function index()
    {
        Carbon::setLocale('fr');
        $carbon=\Carbon\Carbon::now();
        $caisse=VenteProduit::all();
        $commande=CommandeArticle::paginate();
        $caisses=VenteProduit::all();

        return view('caisse.index',compact('caisse','commande','carbon'));
    }

    public function etat(){
        $etat=VenteProduit::all();
        $carbon=\Carbon\Carbon::now();

        $pdf=PDF::loadview('caisse.etat',compact('etat','carbon'))->setOPtions(['setPaper'=>'A4']);
        $pdf->SetPaper('A4','landscape');
        return $pdf->stream();

    }


    /**CE BOUT DE CODE EST UNITILISABLE */
  public  function fetch_data(Request $request)
    {
     if($request->ajax())
     {
      if($request->from_date != '' && $request->to_date != '')
      {
       $data = DB::table('vente_produits')
         ->whereBetween('date', array($request->from_date, $request->to_date))
         ->get();
      }
      else
      {
       $data = DB::table('vente_produits')->orderBy('date', 'desc')->get();
      }
      echo json_encode($data);
     }
    }
}
