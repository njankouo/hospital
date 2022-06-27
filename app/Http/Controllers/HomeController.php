<?php

namespace App\Http\Controllers;

use App\Models\client;
use App\Models\Contrat;
use App\Models\produit;
use App\Models\VenteProduit;
use Illuminate\Http\Request;
use App\Models\CommandeArticle;
use App\Models\User;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $contrat=Contrat::all();
        $produit=produit::all();
        $vente=VenteProduit::all();
        $commande=CommandeArticle::all();
        $client=client::all();
        $user=User::all();
        return view('home',compact('user','client','contrat','produit','vente','commande'));
    }

}
