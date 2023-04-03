<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Consultation extends Model
{
    use HasFactory;
    protected $fillable=['montant','versement','status','note','patient_id','taille','poid','tension','responsable','motif','diagnostique','activite','allergie','add_allergie','antecedant','antecedant_churirgicaux','antecedant_familliale','autre_antecedant'];


    public function patient(){
        return $this->belongsTo(Patient::class,'patient_id','id');
    }
}
