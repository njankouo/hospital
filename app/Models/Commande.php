<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Traits\HasUuid;
class Commande extends Model
{

    use HasFactory;
    use HasUuid;
    protected $fillable=['dateLivraison','dateCommande','fournisseur','responsableCom'];
protected $table='commandes';

}
