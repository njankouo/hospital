<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Hospitalisation extends Model
{
    use HasFactory;
    protected $fillable=['responsable','patient_id','note','datedebut','datefin','chambre_id'];

    public function chambre(){
        return $this->belongsTo(Chambre::class,'chambre_id','id');
    }
    public function patient(){
        return $this->belongsTo(Patient::class,'patient_id','id');
    }
}
