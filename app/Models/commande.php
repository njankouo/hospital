<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class commande extends Model
{
    use HasFactory;
    protected $fillable=['status','date_commande','date_livraison','fournisseur_id'];
    public function fournisseur(){
        return $this->belongsTo(fournisseur::class,'fournisseur_id','id');
    }
    public function commandeproduit(){
        return $this->BelongsToMany(produit::class,'produit_commande','commande_id','produit_id');
    }
    public function pharmacie(){
        return $this->BelongsTo(pharmacie::class,'pharmacie_id','id');
    }
}
