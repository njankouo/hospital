<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class vente extends Model
{
    use HasFactory;
    protected $fillable=['service','beneficiaire','poste','user_id','date_vente'];
    public function produit(){

            return $this->belongsTo(produit::class,'produit_id','id');

    }
    public function user(){
        return $this->belongsTo(user::class,'user_id','id');
    }
    public function client(){
            return $this->belongsTo(client::class,'client_id','id');

    // }
    // public function paiement(){
    //     return $this->belongsTo(paiement::class,'paiement_id','id');
    // }
    // public function pharmacie(){
    //     return $this->belongsTo(pharmacie::class,'pharmacie_id','id');
     }
}
