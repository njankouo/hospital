<?php

namespace App\Http\Controllers;

use App\Models\Livraison;
use Illuminate\Http\Request;

class LivraisonController extends Controller
{
    //

    public function index(){
        $livraison=Livraison::orderBy('id','desc')->get();
        return view('livraisons.index',compact('livraison'));
    }
}
