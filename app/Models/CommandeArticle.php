<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CommandeArticle extends Model
{

    use HasFactory;
    protected $fillable=['designation','qte','pu','dateCommande','dateLivraison'];
    public function produit(){
        return $this->belongsTo(Produit::class);
    }
}
