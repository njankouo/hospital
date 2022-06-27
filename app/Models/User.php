<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;
    protected $fillable = ['nom','prenom','email','sexe','telephone1','numeroPieceIdentite','pieceIdentite','status','role_id','password'];

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $table="users";

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    public function role(){
        return $this->belongsTo(role::class,'role_id','id');
    }
    public function userRole(){
        return $this->belongsTo(role::class,'role_id','id');
    }
    public function vente(){
        return $this->hasMany(vente::class);
    }
     public function hasRole($role){
        return $this->userRole()->where('nom',$role)->first()!==null;
    }
    public function hasAnyRoles($roles){
        return $this->userRole()->whereIn('nom',$roles)->first()!==null;

    }
}
