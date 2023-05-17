<?php

namespace App\Console\Commands;

use App\Models\Rdv;
use Illuminate\Console\Command;
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
    public function handle()
    {

    $appointments = Rdv::whereBetween('date', [now(), now()->addDay()])
                               ->get();

    foreach ($appointments as $appointment) {
        $sid    = env('TWILIO_ACCOUNT_SID');
        $token  = env('TWILIO_AUTH_TOKEN');
        $twilio = new Client($sid, $token);

        $message = $twilio->messages
                          ->create($appointment->telephone, // to
                                   array(
                                       "from" => env('TWILIO_FROM'),
                                       "body" => "Reminder: Your appointment is tomorrow at " . $appointment->time
                                   )
                          );
    }
}
    }

