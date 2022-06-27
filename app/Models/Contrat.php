<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Contrat extends Model
{
    protected $fillable=['image','fournisseur_id','date_debut','date_fin','reglement'];
    use HasFactory;
    public function fournisseur(){
        return $this->belongsTo(fournisseur::class,'fournisseur_id','id');
    }
}
