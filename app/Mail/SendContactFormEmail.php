<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Http\Request;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

/**
 * Class SendContactFormEmail
 *
 * @package App\Mail
 */
class SendContactFormEmail extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * @var string
     */
    public $from_email;
    /**
     * @var string
     */
    public $from_fullname;
    /**
     * @var string
     */
    public $from_cellphone;
    /**
     * @var string
     */
    public $subject;
    /**
     * @var string
     */
    public $message;

    /**
     * SendContactFormEmail constructor.
     *
     * @param Request $request
     */
    public function __construct(Request $request)
    {

        $this->from_fullname = $request->firstname . " " . $request->surname;
        $this->from_email = $request->email;
        $this->from_cellphone = $request->cellphone;
        $this->subject = $request->subject;
        $this->message = $request->message;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->from('thatobabusiofficial@gmail.com')
                    ->markdown('emails.contactform')
                    ->with([
                        "from_fullname" => $this->from_fullname,
                        "from_email" => $this->from_email,
                        "from_cellphone" => $this->from_cellphone,
                        "subject" => $this->subject,
                        "message" => $this->message,
                    ]);
    }
}
