<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Prescription extends Model
{
    use HasFactory,SoftDeletes;
    protected $table = 'prescriptions';
    protected $fillable=['patient_id','dosage','medicament','responsable','qte','dispositif','consultation_id','examen','prescription_name'];

    public function patient(){
        return $this->belongsTo(Patient::class,'patient_id');
    }
    public function consultation(){
        return $this->belongsTo(Consultation::class,'consultation_id','id');
    }
}
