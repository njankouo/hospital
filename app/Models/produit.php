<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class produit extends Model
{
    use HasFactory;
    public function rayon(){
        return $this->belongsTo(rayon::class,'rayon_id','id');
    }
    public function produitcommande(){
        return $this->BelongsToMany(commande::class,'produit_commande','produit_id','commande_id');
    }
    public function type(){
        return $this->belongsTo(type_produit::class,'type_produit_id','id');
    }
    public function produitpharmacie(){
        return $this->belongsToMany(pharmacie::class,'produit_pharmacie','produit_id','pharmacie_id');
    }
}
