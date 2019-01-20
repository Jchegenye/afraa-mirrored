<?php

namespace Afraa\Console;

use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;
use Afraa\Legibra\ReusableCodes\Dashboard\RetrieveSessions;
use Carbon\Carbon;
use Mail;
use Afraa\User;

class Kernel extends ConsoleKernel
{

    use RetrieveSessions;
    
    /**
     * The Artisan commands provided by your application.
     *
     * @var array
     */
    protected $commands = [
        //Commands\InitilizeApp::class,
        //Commands\Permissions::class,
        //Commands\SendCurrentSessionEmail::class,
    ];

    /**
     * Define the application's command schedule.
     *
     * @param  \Illuminate\Console\Scheduling\Schedule  $schedule
     * @return void
     */

    public $next;
    public $current;
    public $myemail;

    protected function schedule(Schedule $schedule)
    {

        //$users = User::pluck('email');
        // $this->myemail = $users;

        //dd(json_decode($users));
        // $users = User::all();
        // foreach($users as $user){
        //     dd($user['email']);
        // }

        //Current Event
        //$currentSessionData = $this->getCurrentSessions()->first();
        if($this->getCurrentSessions()->first() !== null){

            //dd(Carbon::create($this->getCurrentSessions()->first()->start_time)->format('H:i'));

            $schedule->call('Afraa\Legibra\ReusableCodes\Dashboard\SendMails@notifyCurrentSession')
                ->dailyAt(Carbon::create($this->getCurrentSessions()->first()->start_time)->format('H:i'));

        }

        //Next Event
        //$nextSessionData = $this->getNextSessions()->first();
        if(!$this->getNextSessions() == null){

            //dd(Carbon::create($this->getNextSessions()->first()->start_time)->subMinutes(98)->format('H:i'));

            $schedule->call('Afraa\Legibra\ReusableCodes\Dashboard\SendMails@notifyNextSession')
                ->dailyAt(Carbon::create($this->getNextSessions()->first()->start_time)->subMinutes(15)->format('H:i'));
                
        }

        // if(!$this->current == null){

        //     $schedule->call(function () {
                
        //         $from = env('MAIL_FROM_ADDRESS');
        //         Mail::send('emails.notify-current-sessions', ['sessionsData' => $this->current], function ($message) use ($toAllEmails, $from) {
        //             $message->from($from, 'African Airlines Associations');
        //             $message->to($toAllEmails)->subject('Sessions Notification');
        //         });

        //     })->dailyAt('00:44');

        // }else{

        //     dd("No next event!");

        // }

        // $schedule->command('inspire')->hourly();
        // $schedule->command('afraa:initialize')->daily();
        // $schedule->command('afraa:permissions')->daily();

        //$getSchedule = $schedule->command('afraa:current-session --force')->everyMinute();

        //if($getSchedule){

            //$sessions = $this->getCurrentSessions(); //Trait session object
            //foreach($sessions as $session){

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

        // $schedule->command('afraa:current-session')
        //     ->dailyAt(Carbon::create($session->start_time)
        //     //->subMinutes(30)
        //     ->format('H:i'));

                    // $sessionTime = Carbon::create($session->start_time)->format('H:i'); //Ongoing
                    // dd($sessionTime . " - Current event");

                    // $sessionTime = Carbon::create($session->end_time)->addMinutes(15)->format('H:i'); //Ongoing
                    // dd($sessionTime . " - Next event " .  $session->title);
                    
        //$currentTime = Carbon::now()->format('H:i');

                        // dd(Carbon::create($session->start_time)
                        // ->subMinutes(1)
                        // ->format('H:i'));

                //}

    //     }

    // }
    
        // $schedule->call(function () {

        //     $sessions = $this->getCurrentSessions(); //Trait session object
            
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
