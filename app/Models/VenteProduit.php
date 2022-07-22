<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class VenteProduit extends Model
{
    protected $table='vente_produits';
    protected $fillable=['reglement','remise','qte_sortie','produit_id','pu','tva','date_vente','vente_id','client','unite','user'];
    use HasFactory;
    public function produit(){
        return $this->belongsTo(produit::class,'produit_id','id');
    }
}
