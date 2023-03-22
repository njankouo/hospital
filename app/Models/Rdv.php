<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Rdv extends Model
{
    
    use HasFactory;
    protected $table='rendez_vous';
    protected $fillable=['patient_id','responsable','date','status'];
    public function patient(){
        return $this->belongsTo(Patient::class,'patient_id','id');
    }
}
