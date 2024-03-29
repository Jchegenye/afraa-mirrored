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

        $sessions = $this->CurrentSessions(); //Trait session object

        $allEmails = ['chegenyejackson@gmail.com']; //Get all emails

            if(empty(!$sessions->isEmpty())){

                //Do nothing
            
            }else{

                //Notify user via email
                Mail::send('emails.notify-current-sessions', ['sessionsData' => $sessions], function($message) use ($allEmails) {
                    
                    $message->to(env('MAIL_FROM_ADDRESS'));

                    foreach ($allEmails as $email) {
                        $message->cc($email);
                    }
                    
                    $message->subject('Session');

                });

            }

        //$this->info('Session successfully activated!');
        
    }
}
