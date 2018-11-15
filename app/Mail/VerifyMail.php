<?php

namespace Afraa\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Http\Request;

class VerifyMail extends Mailable
{
    use Queueable, SerializesModels;

    public $user;
    protected $primaryKey = 'uid';

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($user)
    {
        $this->user = $user;
    }

    /**
     * Build the message.
     *
     * @author Jackson A. Chegenye
     * @return $this
     */
    public function build(Request $user)
    {

        $sender = getenv('SUPPORT_EMAIL');

        return  $this->subject('Registration | African Airlines Association')
                        ->from($sender, 'African Airlines Association' )
                        ->to($user->email, $user->name)
                        ->view('emails.auth.users.verifyUser');

    }
}
