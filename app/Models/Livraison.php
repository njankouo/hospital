<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Livraison extends Model
{
    use HasFactory;
    protected $fillable=['produit_id','qte','pu','dateCommande','dateLivraison','status','conditionnement_id','code'];
    public function produit(){
        return $this->belongsTo(Produit::class,'produit_id','id');
    }
    public function conditionnement(){
        return $this->belongsTo(Conditionnement::class,'conditionnement_id','id');
    }
}
