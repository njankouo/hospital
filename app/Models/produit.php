<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class produit extends Model
{
    protected $fillable=['designation','pu','pv','rayon_id','categorie_id','grammage','qtestock','stock_seuil','status','fournisseur_id','equivalence','type_article_id','date_fabrication','date_peremption','famille_id'];
    use HasFactory;
    public function rayon(){
        return $this->belongsTo(rayon::class,'rayon_id','id');
    }
    public function produitcommande(){
        return $this->BelongsToMany(commande::class,'produit_commande','produit_id','commande_id');
    }
    public function type(){
        return $this->belongsTo(type_produit::class,'type_article_id','id');
    }
    public function produitpharmacie(){
        return $this->belongsToMany(pharmacie::class,'produit_pharmacie','produit_id','pharmacie_id');
    }
    public function fournisseur(){
        return $this->belongsTo(fournisseur::class,'fournisseur_id','id');
    }
    public function categorie(){
        return $this->belongsTo(Categorie::class,'categorie_id','id');
    }
    public function famille(){
        return $this->belongsTo(Famille::class,'famille_id','id');
    }
}
