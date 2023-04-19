<?php

namespace App\Http\Controllers;

use App\Models\Patient;
use App\Models\Rdv;
use Exception;
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

            $rdv=Rdv::all();

            foreach($rdv as $rdvs){
                if($rdvs->date!=$request->input('date')){

                    Rdv::create([
                        'patient_id'=>$request->patient_id,
                        'date'=>$request->date,
                        'end_date'=>$request->end_date,
                        'responsable'=>$request->responsable,
                        'titre'=>$request->titre,
                        'telephone'=>$request->telephone,
                ]);

                return back()->with('message','Rendez-Vous Creé avec succes');

                }else{
                    return back()->with('error','Cette Plage D\'horaire est deja prise');
                }
            }

    }
        public function generateTelephone(Request $request){
            $req=Patient::select('tel')->where('id',$request->id)->first();
            return response()->json($req);
        }

        // public function sendCustomMessage(Request $request)
        // {
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
        // try {

        //     $basic  = new \Nexmo\Client\Credentials\Basic(getenv("NEXMO_KEY"), getenv("NEXMO_SECRET"));
        //     $client = new \Nexmo\Client($basic);

        //     $receiverNumber = "699072561";
        //     $message = "This is testing from ItSolutionStuff.com";

        //     $message = $client->message()->send([
        //         'to' => $receiverNumber,
        //         'from' => 'Vonage APIs',
        //         'text' => $message
        //     ]);

        //     dd('SMS Sent Successfully.');

        // } catch (Exception $e) {
        //     dd("Error: ". $e->getMessage());
        // }


//}
    public function updat_rdv(Request $request,Rdv $rdv){
        $request->validate([
            'status'=>'required',
        ],
        [
            'status.required'=>'selectionnez le champ svp'
        ]

        );

        $rdv->update([
            'status'=>$request->status,
          //  dd($request->all())
        ]);
        return back()->with('message','rendez-vous archive avec succes');



    }
    public function  saveMessage(){

        try{
            $basic  = new \Vonage\Client\Credentials\Basic("eced6fc6", "XbyUsIVxXcwm5P65");
            $client = new \Vonage\Client($basic);
            $response = $client->sms()->send(
                new \Vonage\SMS\Message\SMS($_POST['telephone'], 'centre de sante du nil', $_POST['message'])
            );

    //dd($request->all());
    $message = $response->current();

    // if ($message->getStatus() == 0) {
    //     echo "The message was sent successfully\n";
    // } else {
    //     echo "The message failed with status: " . $message->getStatus() . "\n";
    // }
    return back()->with('message','message envoyé avec succes');
        }catch(Exception $e){
            return back()->with('error',"erreur survenue l'ors de l'envoie du message");
        }
        }

        public function softrdv($id){
            $rdv=Rdv::find($id);

            $rdv->delete();
            return back()->with('success','rendez-vous annulé avec success');
        }

        public function RdvAnule(){
            $rdv=Rdv::onlyTrashed()->get();
            return view('rendez-vous.annul',compact('rdv'));
        }
        public function restoration($id){
            Rdv::whereId($id)->restore();

            return back()->with('success','rendez-vous Restorer avec succes');
        }
 public function updating(Request $request,Rdv $rdv)
{
    $request->validate([],[]);

    $rdv->update([
        'date'=>$request->date,

        'titre'=>$request->titre,
      //  dd($request->all())
    ]);
    return back()->with('success','Rdv Mis A Jour Avec Succes');
}
}
