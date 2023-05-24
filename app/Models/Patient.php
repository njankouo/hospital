<?php

namespace App\Models;

use App\Traits\HasUuid;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Patient extends Model
{
    use HasFactory,HasUuid;
     protected $fillable=['taille','antecedant','antecedant_churirgicaux','antecedant_familliale','nom','prenom','telephone','email','sexe','lieu','tel','adresse','assurance','numAssurance','date','prevenir','profession','groupe','etat','age'];
     public function consultation(){
        return $this->hasMany(Consultation::class);
     }
     public function hospitalisation(){
        return $this->hasMany(Hospitalisation::class);
     }
     public function prescription(){
        return $this->hasMany(Prescription::class);
     }
     public function examen(){
        return $this->hasMany(Examen::class);
     }

     public function rdv(){
        return $this->hasMany(Rdv::class);
     }

    }
