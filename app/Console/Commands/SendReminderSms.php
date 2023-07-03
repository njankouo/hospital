<?php

namespace App\Console\Commands;

use App\Models\Rdv;
use App\Models\User;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Mail;
use Twilio\Rest\Client;

class SendReminderSms extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'test:cron';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return int
     */

    /**
     *
     * cette fonction planifit les rendez-vous de la bd une journee avant le rendez-vous du patient
     *
     * cette fonction communique avec l'executeur de tache qui se trouve dans le fichier kernel.php
     *
     * qui se trouve dans app/console/kernel.php
     */
    public function handle()
    {

    $appointments = Rdv::whereBetween('date', [now(), now()->addDay()])
                               ->get();

    foreach ($appointments as $appointment) {
        $sid    = env('TWILIO_ACCOUNT_SID');
        $token  = env('TWILIO_AUTH_TOKEN');
        $from = env('TWILIO_FROM');
        $twilio = new Client($sid, $token);

        $message = $twilio->messages
                          ->create($appointment->telephone, // to
                                   array(
                                       "from" => env('TWILIO_FROM'),
                                       "body" =>"VOUS AVEZ UN RENDEZ MEDICAL LE " . $appointment->date
                                   )
                          );
    }
    }

/***
 *
 *
 *
 *
 * fin de la fonction
 *
 *
 *
 */


    }

