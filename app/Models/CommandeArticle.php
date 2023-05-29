<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class CommandeArticle extends Model
{

    use HasFactory,SoftDeletes;
    protected $table='commande_articles';
    protected $fillable=['produit_id','qte','pu','dateCommande','dateLivraison','code','status','conditionnement_id' ];
    public function produit(){
        return $this->belongsTo(Produit::class,'produit_id','id');
    }
    public function conditionnement(){
        return $this->belongsTo(Conditionnement::class,'conditionnement_id','id');
    }
}
