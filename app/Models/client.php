<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class client extends Model
{
    protected $fillable=['nom','prenom','sexe','telephone'];
    use HasFactory;
    public function vente(){
        return $this->hasMany(vente::class);
    }
}
