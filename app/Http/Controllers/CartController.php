<?php

namespace App\Http\Controllers;

use Cart;
use Illuminate\Http\Request;

class CartController extends Controller
{

public function addLivraison(Request $request){

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

        return redirect()->route('group.livraison');

}
public function deleteL(){
      Cart::clear();

        session()->flash('success', 'toutes les livraisons retiré avec success!');

        return redirect()->route('group.livraison');

}
public function supprimeOne(Request $request){
\Cart::remove($request->id);
        session()->flash('success', 'Item Cart Remove Successfully !');

        return redirect()->route('group.livraison');
}
}
