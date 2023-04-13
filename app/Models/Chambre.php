<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Chambre extends Model
{
    use HasFactory,SoftDeletes;
    protected $fillable=['numero','appreciation','status','prix','nbrelit'];
    public function hospitalisation(){
        return $this->hasOne(Hospitalisation::class);
    }
}
