<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Caisse extends Model
{
    use HasFactory;

    protected $fillable=['patient_id','montant','versement','motif'];

    public function patient(){
        return $this->belongsTo(Patient::class,'patient_id','id');
    }
}
