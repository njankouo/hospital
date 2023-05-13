<?php

namespace App\Http\Controllers;

use App\Models\Produit;
use App\Models\Rdv;
use Illuminate\Http\Request;
//use MaddHatter\LaravelFullcalendar\Facades\Calendar;
//use MaddHatter\LaravelFullcalendar\Calendar;
//use Redirect,Response;
use Calendar;
class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $events = [];
        $count=Rdv::where('status','=','1')->count();
        $appointments = Rdv::all();


        foreach ($appointments as $appointment) {
            if($appointment->status==0){

            }else{
                if(Auth()->user()->name==$appointment->user->name){


            $events[] = [
                'title' => $appointment->titre .' ('.$appointment->patient->nom.')'.'('.$appointment->user->name.')',
               //'start' => $appointment->created_at,
                'start' => $appointment->date,
                'end' => $appointment->end_date,
            ];
        }
    }
}
        return view('home',compact('events','count'));
    }
}
