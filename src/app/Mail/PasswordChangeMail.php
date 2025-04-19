<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class PasswordChangeMail extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($restaurant_owner)
    {
        $this->restaurant_owner = $restaurant_owner;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('mail.passwordChange_mail')->from('mail@rese')->subject('メールアドレス変更')->with('restaurant_owner', $this->restaurant_owner);
    }
}
