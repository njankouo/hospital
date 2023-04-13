<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Patient extends Model
{
    use HasFactory;
     protected $fillable=['nom','prenom','telephone','email','sexe','lieu','tel','adresse','assurance','numAssurance','date','prevenir','profession','groupe','etat','age'];
     public function consultation(){
        return $this->hasOne(Consultation::class);
     }
     public function hospitalisation(){
        return $this->hasOne(Hospitalisation::class);
     }
     public function prescription(){
        return $this->hasMany(Prescription::class);
     }
    }
