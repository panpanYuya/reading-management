<?php

namespace App\Mails;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class RegistVerificationMail extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($userName, $registUrl)
    {
        //
        $this->userName = $userName;
        $this->registUrl = $registUrl;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('emails.regist-verification')
        ->subject('仮登録を受け付けました。')
        ->with('userName', $this->userName)
        ->with('registUrl', $this->registUrl);
    }
}
