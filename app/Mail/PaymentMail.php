<?php

namespace Afraa\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class PaymentMail extends Mailable
{
    use Queueable, SerializesModels;
    public $user;
    public $amount;
    public $event;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($user, $amount, $event)
    {
        $this->user = $user;
        $this->amount = $amount;
        $this->event = $event;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('emails.paymentsuccess');
    }
}
