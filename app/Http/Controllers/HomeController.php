<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\client;
use App\Models\Contrat;
use App\Models\produit;
use App\Models\VenteProduit;
use Illuminate\Http\Request;
use App\Models\CommandeArticle;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

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
  public function showChangePasswordForm(){
        return view('auth.changepassword');
    }
        public function changePassword(Request $request){

        if (!(Hash::check($request->get('current-password'), Auth::user()->password))) {
            // The passwords matches
            return redirect()->back()->with("error","Votre mot de passe actuel ne correspond pas au mot de passe que vous avez fourni. Veuillez réessayer.");
        }

        if(strcmp($request->get('current-password'), $request->get('new-password')) == 0){
            //Current password and new password are same
            return redirect()->back()->with("error","Le nouveau mot de passe ne peut pas être le même que votre mot de passe actuel. Veuillez choisir un autre mot de passe.");
        }

        $validatedData = $request->validate([
            'current-password' => 'required',
            'new-password' => 'required|string|min:6|confirmed',
        ]);

        //Change Password
        $user = Auth::user();
        $user->password = bcrypt($request->get('new-password'));
        $user->save();

        return redirect()->back()->with("success","mot de passe changé avec success!");

    }
    public function info(){
        return view('infos.index');
    }
}
