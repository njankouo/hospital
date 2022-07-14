<?php

namespace App\Http\Controllers;

use App\Models\CommandeArticle;
use App\Models\VenteProduit;
use Carbon\Carbon;
use PDF;
use Illuminate\Http\Request;

class CaisseController extends Controller
{
    //
    public function index()
    {
        Carbon::setLocale('fr');
        $carbon=\Carbon\Carbon::now();
        $caisse=VenteProduit::paginate();
        $commande=CommandeArticle::paginate();
        $caisses=VenteProduit::paginate();

        return view('caisse.index',compact('caisse','commande','carbon'));
    }

    public function etat(){
        $etat=VenteProduit::all();
        $carbon=\Carbon\Carbon::now();
        $pdf=PDF::loadview('caisse.etat',compact('etat','carbon'))->setOPtions(['setPaper'=>'A4']);
        return $pdf->stream();
    }
}
