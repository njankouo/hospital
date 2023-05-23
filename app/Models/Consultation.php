<?php

namespace App\Models;

use App\Traits\HasUuid;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Consultation extends Model
{
    use HasFactory,SoftDeletes,HasUuid;
    protected $fillable=['motifs_caisse','montant','versement','status','note','patient_id','taille','poid','tension','responsable','motif','diagnostique','activite','allergie','add_allergie','antecedant','antecedant_churirgicaux','antecedant_familliale','autre_antecedant','symptomes','medicaments','resultats'];


    public function patient(){
        return $this->belongsTo(Patient::class,'patient_id','id');
    }
    public function rdv(){
        return $this->hasMany(Rdv::class);
    }

    public function prescription(){
        return $this->hasMany(Prescription::class);
    }
    public function examen(){
        return $this->hasMany(Examen::class);
    }
}
