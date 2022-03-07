<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class fournisseur extends Model
{
    use HasFactory;
    protected $fillable=['nom','prenom','sexe','telephone1','email'];
    public function commande(){
        return $this->hasMany(commande::class);
    }
}
