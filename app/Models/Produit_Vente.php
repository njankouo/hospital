<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Produit_Vente extends Model
{
    use HasFactory;

    public $table='vente_produits';

    protected $fillable=['produit_id','qte','pu','conditionnement','responsable','date'];
}
