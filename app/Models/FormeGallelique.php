<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FormeGallelique extends Model
{
    use HasFactory;
    protected $fillable=['libelle'];
    public function Produit(){
         return $this->hasMany(Produit::class);
    }
}
