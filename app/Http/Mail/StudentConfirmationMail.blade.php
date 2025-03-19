<?php
namespace App\Mail;

use Illuminate\Bus\Queryable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class StudentConfirmationMail extends Mailable
{
    use Queryable, SerializesModels;

    public $tracking_code;

    public function __construct($tracking_code)
    {
        $this->tracking_code = $tracking_code;
    }

    public function build()
    {
        /*  return $this->view('emails.student_confirmation')
            ->with([
                'url' => route('students.activate', $this->tracking_code),
            ]);  */

        return $this->subject('Verifica tu correo')
            ->view('emails.verification')
            ->with([
                'url' => route('verify', $this->user->verification_token),
            ]);
    }
}
