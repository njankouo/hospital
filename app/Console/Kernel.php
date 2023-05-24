<?php

namespace App\Console;

use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;
use Illuminate\Console\Command;
class Kernel extends ConsoleKernel
{
    /**
     * Define the application's command schedule.
     *
     * @param  \Illuminate\Console\Scheduling\Schedule  $schedule
     * @return void
     */
    protected $commands = [
        Commands\SendReminderSms::class,
    ];


/**
 *
 * cette fonction schedule execute mes tache automatiquement a l'aide de la commande
 *
 * php artisan schedule:run
 *
 * l'orsque la commande est executé, le message est envoyé directement au patient concerné
 *
 *
 */

    protected function schedule(Schedule $schedule)
    {

        $schedule->command('test:cron')->everyMinute();
    }

/**
 *
 *
 * fin de la fonction everyMinute(),daily etc.....
 * tout d'abord, l'obtention du SID et du Key de twilio est necessaire pour faire fonctionner grace
 * a une configuration qui se fait dans le fichier env *
 *
 */




    /**
     * Register the commands for the application.
     *
     * @return void
     */
    protected function commands()
    {
        $this->load(__DIR__.'/Commands');
       //Commands\SendReminderSms::class;
        require base_path('routes/console.php');
    }

}
