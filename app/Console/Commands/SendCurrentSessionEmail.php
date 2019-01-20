<?php

namespace Afraa\Console\Commands;
use Afraa\Legibra\ReusableCodes\Dashboard\RetrieveSessions;
use Illuminate\Console\Command;
use Carbon\Carbon;
use Mail;
use DB;

class SendCurrentSessionEmail extends Command
{

    use RetrieveSessions;

    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'afraa:current-session';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Notify users about current session!';

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
     * @return mixed
     */
    public function handle()
    {

        $sessions = $this->getCurrentSessions()->first(); //Trait session object
        $toAllEmails = ['chegenyejackson@gmail.com']; //Get all emails

        $from = env('MAIL_FROM_ADDRESS');
        Mail::send('emails.notify-current-sessions', ['sessionsData' => $sessions], function ($message) use ($toAllEmails, $from) {
            $message->from($from, 'African Airlines Associations');
            $message->to($toAllEmails)->subject('Sessions Notification');
        });

        // if(empty(!$sessions->isEmpty())){

        //     //Do nothing
        
        // }else{

        //             //Notify user via email
        //             // Mail::send('emails.notify-current-sessions', ['sessionsData' => $sessions], function($message) use ($allEmails) {
                        
        //             //     //$message->to(env('MAIL_FROM_ADDRESS'));

        //             //     // foreach ($allEmails as $email) {
        //             //     //     //$message->cc($email);
        //             //     //     $message->to($email);
        //             //     // }
        //             //     $message->to($allEmails);
                        
        //             //     $message->subject('Session');

        //             // });
            
        //     $from = env('MAIL_FROM_ADDRESS');
        //     Mail::send('emails.notify-current-sessions', ['sessionsData' => $sessions], function ($message) use ($toAllEmails, $from) {
        //         $message->from($from, 'African Airlines Associations');
        //         $message->to($toAllEmails)->subject('Sessions Notification');
        //     });

        // }

        //$this->info('Session successfully activated!');
        
    }
}
