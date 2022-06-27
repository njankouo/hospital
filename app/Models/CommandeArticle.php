<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class CommandeArticle extends Model
{
    protected $fillable=['qte','status','pu','date_commande','date_livraison','unite','tva','produit_id','commande_id','fournisseur','remise','reglement'];
    protected $table='produit_commande';

    use HasFactory;
    public function produit(){
    return $this->BelongsTo(Produit::class,'produit_id','id');
}
}
