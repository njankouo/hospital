<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Hospitalisation extends Model
{
    use HasFactory,SoftDeletes;
    protected $fillable=['responsable','patient_id','note','datedebut','datefin','chambre_id','medicament','antecedant','dose'];

    public function chambre(){
        return $this->belongsTo(Chambre::class,'chambre_id','id');
    }
    public function patient(){
        return $this->belongsTo(Patient::class,'patient_id','id');
    }
}
