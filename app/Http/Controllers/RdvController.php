<?php

namespace App\Http\Controllers;

use App\Models\Patient;
use App\Models\Rdv;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class RdvController extends Controller
{
    // protected $client;
    // public function __construct(Client $client){
    //     $this->client = $client;
    // }

    public function index(){
        $patient=Patient::all();
        $rdv=Rdv::orderBy('id','desc')->get();
        $tasks=Rdv::all();
        return view('rendez-vous.index',compact('patient','rdv','tasks'));
    }

    public function save(Request $request){
        $request->validate([
            'patient_id'=>'required',
            'date'=>'date',
            //'responsable'=>'required',
        ],[
            'patient_id.required'=>'renseignez le patient',
            'date.required'=>'renseignez la date de Rdv',
        ]);

        Rdv::create([
                'patient_id'=>$request->patient_id,
                'date'=>$request->date,
                'end_date'=>$request->end_date,
                'responsable'=>$request->responsable,
        ]);

        return back()->with('message','Rendez-Vous Creé avec succes');
    }
        public function generateTelephone(Request $request){
            $req=Patient::select('tel')->where('id',$request->id)->first();
            return response()->json($req);
        }

        public function sendCustomMessage(Request $request)
        {
           // $receiverNumber = "+15075025677";
        //     $message = "This is testing from CodeSolutionStuff.com";

        //     try {

        //         $account_sid = getenv("TWILIO_SID");
        //         $auth_token = getenv("TWILIO_TOKEN");
        //         $number = getenv("TWILIO_FROM");
        //         $client = new Client($account_sid, $auth_token);

        //         $client->messages->create('+237'.$request->number,[
        //             'from' => $number,
        //             'body' => $message
        //         ]);


        //         dd('SMS Sent Successfully.');

        //     } catch (Exception $e) {
        //         dd("Error: ". $e->getMessage());
        //     }
        try {

            $basic  = new \Nexmo\Client\Credentials\Basic(getenv("NEXMO_KEY"), getenv("NEXMO_SECRET"));
            $client = new \Nexmo\Client($basic);

            $receiverNumber = "699072561";
            $message = "This is testing from ItSolutionStuff.com";

            $message = $client->message()->send([
                'to' => $receiverNumber,
                'from' => 'Vonage APIs',
                'text' => $message
            ]);

            dd('SMS Sent Successfully.');

        } catch (Exception $e) {
            dd("Error: ". $e->getMessage());
        }


}}
