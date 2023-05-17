<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Examen extends Model
{
    use HasFactory;

    public function patient(){
        return $this->belongsTo(Patient::class,'patient_id','id');
    }
    public function consultation(){
            return $this->belongsTo(Consultation::class,'consultation_id','id');
    }
    protected $fillable=['patient_id','consultation_id','date_naissance','date_examen','adresse','file','observation'];
}
