<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Livraison extends Model
{
    protected $fillable=['status_paiement','produit_id','commande_id','qte','pu','status','unite','fournisseur','date_commande','date_livraison'];
    protected $table='livraisons_tabls';
    public function produit(){
        return $this->BelongsTo(Produit::class,'produit_id','id');
    }
    use HasFactory;
}
