<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Produit extends Model
{
    use HasFactory,SoftDeletes;
    public function Famille(){
        return $this->belongsTo(Famille::class,'famille_id');
    }
    public function Conditionnement(){
        return $this->belongsTo(Conditionnement::class,'conditionnement_id');

    }
    public function Forme(){
        return $this->belongsTo(FormeGallelique::class,'forme_id');
    }
    public function commande(){
        return $this->hasMany(Commande::class);
    }

    protected $fillable=['designation','equivalence','qteStock','qteSeuil','famille_id','forme_id','conditionnement_id','file','pu'];
}
