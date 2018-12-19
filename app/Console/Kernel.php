<?php

namespace Afraa\Console;

use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;
use Afraa\Legibra\ReusableCodes\Dashboard\RetrieveSessions;
use Carbon\Carbon;

class Kernel extends ConsoleKernel
{

    use RetrieveSessions;
    
    /**
     * The Artisan commands provided by your application.
     *
     * @var array
     */
    protected $commands = [
        Commands\InitilizeApp::class,
        Commands\Permissions::class,
        Commands\SendCurrentSessionEmail::class,
    ];

    /**
     * Define the application's command schedule.
     *
     * @param  \Illuminate\Console\Scheduling\Schedule  $schedule
     * @return void
     */
    protected function schedule(Schedule $schedule)
    {
        // $schedule->command('inspire')->hourly();
        // $schedule->command('afraa:initialize')->daily();
        // $schedule->command('afraa:permissions')->daily();

        $getSchedule = $schedule->command('afraa:current-session --force')->everyMinute();

        if($getSchedule){

            $sessions = $this->CurrentSessions(); //Trait session object
            
            foreach($sessions as $session){

                //echo $session->title;
                //echo Carbon::create($session->start_time)->subMinutes(10)->format('H:i');

                //check if session already exists
                //if($session->title == $session->title){
                    //do nothing
                //}else{

                    // if('jack' == 'jack' && '12:00:00' == '12:01:00'){
                    //     echo "same";
                    // }else{
                    //     echo "not";
                    // }

                    $schedule->command('afraa:current-session')
                        ->dailyAt(Carbon::create($session->start_time)
                        //->subMinutes(2)
                        ->format('H:i'));

                //}

            }

        }
    
        // $schedule->call(function () {

        //     $sessions = $this->CurrentSessions(); //Trait session object
            
        //     foreach($sessions as $session){

        //         echo $session->title;

        //         echo Carbon::create($session->start_time)->subMinutes(10)->format('H:i');

        //         $schedule->command('afraa:current-session')->dailyAt(Carbon::create($session->start_time)->subMinutes(10)->format('H:i'));
        //         //Subtract 10 minutes before event starts

        //    }

        // })->everyMinute();

        //dd($getTime);

        // $schedule->command('afraa:current-session')
        //     ->dailyAt('09:38'); //Notify users Daily at start time
            //->timezone('America/New_York');

        //$schedule->command(RetrieveSessions::class, ['afraa:current-session'])->everyMinute();

        // $schedule->call(function () {

        //     DB::table('recent_users')->delete();
            
        // })->daily();

        // $schedule->call('Full\Namespace\YourController@method')
        //         ->hourly();

    }

    /**
     * Register the commands for the application.
     *
     * @return void
     */
    protected function commands()
    {
        $this->load(__DIR__.'/Commands');

        require base_path('routes/console.php');
    }
}
