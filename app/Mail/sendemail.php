<?php

namespace App\Mail;

use Illuminate\Http\Request;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

/**
 * Class SendContact.
 */
class sendemail extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * @var Request
     */
    public $email;
    public $mytemplate;
    /**
     * SendContact constructor.
     *
     * @param Request $request
     */
    public function __construct($email,$mytemplate)
    {
        $this->email        = $email;
        $this->mytemplate   = $mytemplate;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->to(config('mail.from.address'), config('mail.from.name'))
            ->view('mail.sendemail')
            ->subject('iilff.Com')
            ->from('iilff@gmail.com','iilff')
            ->replyTo($this->email);
    }
}
