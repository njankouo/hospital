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
        $tasks=Rdv::all();
        return view('home',compact('tasks'));
    }
}
