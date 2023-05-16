<?php

namespace App\Http\Controllers;

use App\Models\Patient;
use App\Models\Rdv;
use App\Models\User;
use Exception;
use Illuminate\Http\Request;
use Infobip\InfobipClient;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Vonage\Message\Shortcode\Alert;
use Twilio\Rest\Client;

class RdvController extends Controller
{
    // protected $client;
    // public function __construct(Client $client){
    //     $this->client = $client;
    // }
    // protected $client;

    // public function __construct(Client $client){
    //     $this->client = $client;
    // }
    public function index(){
        $patient=Patient::all();
        $rdv=Rdv::orderBy('id','desc')->get();
        $tasks=Rdv::all();
        $user=User::all();
        return view('rendez-vous.index',compact('patient','rdv','tasks','user'));
    }

    public function save(Request $request){

            $start_time = Carbon::parse($request->date);
            $end_time = Carbon::parse($request->end_date);
            $duree = $start_time->diffInMinutes($end_time);
           // dd($duree);
          //  echo "La durée du rendez-vous est de $duree minutes.";
            // Vérifier si le nouveau rendez-vous chevauche un rendez-vous existant pour le médecin
            $user = User::findOrFail($request->user_id);
            $rdv = $user->rdv()->where(function($query) use ($start_time, $end_time) {
                $query->whereBetween('date', [$start_time, $end_time])
                      ->orWhereBetween('end_date', [$start_time, $end_time])
                      ->orWhere(function($query) use ($start_time, $end_time) {
                          $query->where('date', '<=', $start_time)
                                ->where('end_date', '>=', $end_time);
                      });
            })->get();

            if ($rdv->count() > 0) {
             return back()->with('error','plage horaire déja utilisé veuillez re-programmer le rendez-vous');
            }

            // Créer le nouveau rendez-vous
            $appointment = new Rdv;
            $appointment->date = $start_time;
            $appointment->end_date = $end_time;
            $appointment->patient_id = $request->patient_id;
            $appointment->titre = $request->titre;
            $appointment->telephone = $request->telephone;
            $appointment->user_id = $request->user_id;
        //    $appointment->duration=$duree;
            $appointment->save();

            return back()->with('message','rendez-vous crée avec succes');

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


        }

        public function softrdv($id){
            $rdv=Rdv::find($id);

            $rdv->delete();
            return back()->with('message','rendez-vous annulé avec success');
        }

        public function RdvAnule(){
            $rdv=Rdv::onlyTrashed()->get();
            return view('rendez-vous.annul',compact('rdv'));
        }
        public function restoration($id){
            Rdv::whereId($id)->restore();

            return back()->with('message','rendez-vous Restorer avec succes');
        }
 public function updating(Request $request,Rdv $rdvs)
{
    $request->validate([],[]);

    $rdvs->update([
        'date'=>$request->date,

        'titre'=>$request->titre,
      dd($request->all())
    ]);
    return back()->with('message','Rdv Mis A Jour Avec Succes');
}


/**message automatise avec infobip
 *
 */

//  public function getMessage(){
//         $rdv=Rdv::where('date','>',Carbon::now())->where('status','=',0)->get();
//         $infobip=new Infobip();
//         $infobip->setApikey(config('app.infobip_api_key'));


//         foreach($rdv as $rdvs){
//             $message=[
//                     'from'=>'Monica',
//                     'to'=>$rdvs->telephone,
//                     'text'=>'vous avez un rendz-vous demain',
//             ];

//             $response=$infobip->sendMessage($message);
//             if($response->status==200){
//                 echo 'message envoye';
//             }else{
//                 echo 'message non envoye';
//             }

//         }

//  }
//  public function sendMessage(Request $request)
//     {
//         $this->validate($request, [
//             'receiver' => 'required|max:15',
//             'message' => 'required|min:5|max:155',
//         ]);

//         try {
//             $accountSid = getenv("TWILIO_ACCOUNT_SID");
//             $authToken = getenv("TWILIO_AUTH_TOKEN");
//             $twilioNumber = getenv("TWILIO_PHONE_NUMBER");

//             $client = new Client($accountSid, $authToken);

//             $client->messages->create($request->receiver, [
//                 'from' => $twilioNumber,
//                 'body' => $request->message
//             ]);

//             return back()
//             ->with('success','Sms has been successfully sent.');

//         } catch (\Exception $e) {
//             dd($e->getMessage());
//             return back()
//             ->with('error', $e->getMessage());
//         }
//     }
}
