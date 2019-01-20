<?php

namespace Afraa\Legibra\ReusableCodes\Dashboard;

use Afraa\Legibra\ReusableCodes\Dashboard\RetrieveSessions;
use Carbon\Carbon;
use Afraa\User;
use Mail;
use DB;

class SendMails 
{ 

    use RetrieveSessions;

    public function notifyCurrentSession(){

        $users = User::all();
        if (!empty($users)) {
            foreach ($users as $user) {
                Mail::send('emails.notify-current-sessions', ['sessionsData' => $this->getCurrentSessions(), 'users' => $user],
                    function ($message) use ($user) {
                        $message->subject('Current Sessions Notification');
                        $message->from(env('MAIL_FROM_ADDRESS'), 'African Airlines Associations');
                        $message->to($user['email']);
                    });
            }
        }

    }

    public function notifyNextSession(){

        $users = User::all();
        if (!empty($users)) {
            foreach ($users as $user) {
                Mail::send('emails.notify-next-sessions', ['sessionsData' => $this->getNextSessions(), 'users' => $user],
                    function ($message) use ($user) {
                        $message->subject('Next Sessions Notification');
                        $message->from(env('MAIL_FROM_ADDRESS'), 'African Airlines Associations');
                        $message->to($user['email']);
                    });
            }
        }

    }
    
}