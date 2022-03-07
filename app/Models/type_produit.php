<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class type_produit extends Model
{
    protected $fillable=['nom'];
    public $timestamps=false;
    protected $table="type_articles";
    use HasFactory;
}
