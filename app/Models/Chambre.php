<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Chambre extends Model
{
    use HasFactory;
    protected $fillable=['numero','appreciation','status'];
    public function hospitalisation(){
        return $this->hasMany(Hospitalisation::class);
    }
}
