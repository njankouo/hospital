<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Categorie extends Model
{
    protected $fillable=['libelle','type_id'];
    protected $table='categories';
    use HasFactory;
    public function type(){
        return $this->belongsTo(type_produit::class);
    }
}
