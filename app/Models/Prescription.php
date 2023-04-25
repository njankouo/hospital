<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Prescription extends Model
{
    use HasFactory;
    protected $table = 'prescriptions';
    protected $fillable=['patient_id','dosage','medicament','responsable','qte','dispositif'];

    public function patient(){
        return $this->belongsTo(Patient::class,'patient_id');
    }
}
