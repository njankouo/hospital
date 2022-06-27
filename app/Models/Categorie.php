<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Categorie extends Model
{
    protected $fillable=['libelle'];
    protected $table='categories';
    use HasFactory;
    public function produit(){
        return $this->hasMany(produit::class);
    }

}
