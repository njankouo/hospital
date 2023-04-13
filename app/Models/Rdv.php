<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Rdv extends Model
{

    use HasFactory,SoftDeletes;
    protected $table='rendez_vous';
    protected $fillable=['patient_id','responsable','date','status','end_date','titre','telephone'];
    public function patient(){
        return $this->belongsTo(Patient::class,'patient_id','id');
    }
}
