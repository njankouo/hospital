<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class role extends Model
{
    use HasFactory;
    public function userRole(){
        return $this->belongsToMany(user::class,'user_role','role_id','user_id');
    }
}
