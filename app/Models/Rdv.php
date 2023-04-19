<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Rdv extends Model
{

    use HasFactory,SoftDeletes;
    protected $table='rendez_vous';
    protected $fillable=['patient_id','responsable','date','status','end_date','titre','telephone','deleted_at','consultation_id'];
    public function patient(){
        return $this->belongsTo(Patient::class,'patient_id','id');
    }
    public function consultation(){
        return $this->belongsTo(Consultation::class,'consultation_id','id');
    }
}
