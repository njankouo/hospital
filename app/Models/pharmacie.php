<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class pharmacie extends Model
{
    use HasFactory;
    public function pharmacieproduit(){
        return $this->belongsToMany(produit::class,'produit_pharmacie','pharmacie_id','produit_id');
    }
}
