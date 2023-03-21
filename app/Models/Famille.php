<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Famille extends Model
{
    use HasFactory;

    protected $fillable=['libelle'];
    public function produit(){
         return $this->hasMany(Produit::class);
    }
}
