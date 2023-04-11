<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Produit_Vente extends Model
{
    use HasFactory,SoftDeletes;

    public $table='vente_produits';

    protected $fillable=['produit_id','qte','pu','conditionnement','responsable','date','code'];
    public function produit(){
        return $this->belongsTo(Produit::class,'produit_id','id');
    }
}
