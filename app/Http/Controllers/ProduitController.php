<?php

namespace App\Http\Controllers;

use PDF;
use Throwable;
use App\Models\Type;
use App\Models\rayon;
use App\Models\Famille;
use App\Models\produit;
use App\Models\Categorie;
use App\Models\fournisseur;
use App\Models\type_produit;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;


class ProduitController extends Controller
{
    //
    public function index(){
        $produit=Produit::all();
        return view('produit.produit',compact('produit'));
    }
    public function create(){
         $data=[
            'categorie'=>Categorie::all(),
            'rayon'=>rayon::all(),
            'type'=>type_produit::all(),
            'fournisseur'=>fournisseur::all(),
            'famille'=>Famille::all(),

        ];
        return view('produit.create',$data);
    }
    public function save(Request $request){



        $request->validate([
            'designation'=>'required|unique:produits,designation',
           // 'categorie_id'=>'required',
            'qte'=>'required',
           // 'grammage'=>'required',
            'qteseuil'=>'required',
           // 'unite_id'=>'required',
            'pa'=>'required',
            'pv'=>'required',
           // 'rayon_id'=>'required',
            //'fournisseur_id'=>'required',


        ],
        [
            'designation.required'=>'renseignez le produit',
           // 'categorie_id.required'=>'renseignez la categorie',
            'qte.required'=>'renseignez la qte en stock',
           // 'grammage.required'=>'renseignez le grammage',
            'qteseuil.required'=>'renseignez la qte seuil',
           // 'unite_id.required'=>'renseignez le conditionnement',
            'pa.required'=>'renseignez le prix d\'achat',
            'pv.required'=>'renseignez le prix de vente',
           // 'rayon_id.required'=>'renseignez le rayon',
           // 'fournisseur_id.required'=>'renseignez le fournisseur',

        ]

    );
   try{
            produit::create([
               // print_r($request->all())
               'designation'=>$request->designation,
               'categorie_id'=>$request->categorie_id,
               'qtestock'=>$request->qte,
               'grammage'=>$request->grammage,
               'stock_seuil'=>$request->qteseuil,
               'pu'=>$request->pa,
               'pv'=>$request->pv,
               'rayon_id'=>$request->rayon_id,
               'fournisseur_id'=>$request->fournisseur_id,
               'equivalence'=>$request->equivalence,
               'type_article_id'=>$request->unite_id,
                'date_fabrication'=>$request-> fabrication,
               'date_peremption'=>$request->expiration,
               'famille_id'=>$request->famille_id

            ]);
            return redirect('/produit')->with('info','produit enregistré avec success');

             }

            catch(Throwable $th){
return back()->with('error','renseignez bien vos champs');
            }
        }
    public function inventairePDF(){
        $produit=Produit::all();
        $pdf=PDF::loadView('produit.pdf',compact('produit'))->setOptions(['setPaper'=>'A4','landscape']);
        $pdf->setPaper('A4', 'landscape');
       return $pdf->Stream();

    }
    public function update($id){
            $produits=Produit::find($id);
            $categorie=Categorie::all();
                $type=type_produit::all();
            $rayon=rayon::all();
            $famille=Famille::all();
            $fournisseur=fournisseur::all();
        return view('produit.update',compact('produits','categorie','type','fournisseur','rayon','famille'));
    }
    public function updat(Request $request,Produit $produits){

              $request->validate([

    ],[]);
        $produits->update([

           // dd($request->all())
                'designation'=>$request->designation,
               'categorie_id'=>$request->categorie_id,
               'qtestock'=>$request->qte,
               'grammage'=>$request->grammage,
               'stock_seuil'=>$request->qteseuil,
               'pu'=>$request->pa,
               'pv'=>$request->pv,
               'rayon_id'=>$request->rayon_id,
               'famille_id'=>$request->famille_id,
               'fournisseur_id'=>$request->fournisseur_id,
               'equivalence'=>$request->equivalence,
               'type_article_id'=>$request->unite_id,
                'date_fabrication'=>$request-> fabrication,
               'date_peremption'=>$request->expiration


        ]);
           return redirect('/produit')->with('info','produit mise à jour avec success');
    }
}
