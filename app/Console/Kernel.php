<?php

namespace Afraa\Console;

use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;
use Afraa\Legibra\ReusableCodes\Dashboard\RetrieveSessions;

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

        //$schedule->command('afraa:current-session')
        //    ->dailyAt('03:30'); //Notify users Daily at start time
            //->between('8:00', '17:00');

        $sessions = $this->CurrentSessions(); //Trait session object
        
        //dd($sessions);

        //$schedule->command('afraa:current-session')->dailyAt('19:15','22:00');
            
            foreach($sessions as $session){
                
                $startTime = date("H:i", strtotime($session->start_time));

                echo $startTime;

                //$schedule->command('afraa:current-session')->dailyAt($startTime);

           }

        //dd($getTime);

        // $schedule->command('afraa:current-session')
        //     ->dailyAt('09:38'); //Notify users Daily at start time
            //->timezone('America/New_York');

        //$schedule->command(SendCurrentSessionEmail::class, ['afraa:current-session'])->daily();

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
