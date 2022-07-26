<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class fournisseur extends Model
{
    use HasFactory;
    protected $fillable=['nom','prenom','sexe','telephone1','email','status'];
    public function commande(){
        return $this->hasMany(commande::class);
    }
    public function produit(){
        return $this->hasMany(produit::class);
    }
    public function contrat(){
        return $this->hasMany(Contrat::class);
    }
}
