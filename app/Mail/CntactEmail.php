<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class CntactEmail extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public $data;
    public function __construct($data)
    {
        $this->data = $data;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        $subject = "New Contact Mesasge ";
        return $this->from('non-reply@foodhutti.com')
                ->subject($subject)
                ->view('mail.mail');

                $this->withSwiftMessage(function ($message) {
                    $message->getHeaders()
                            ->addTextHeader('Content-Type', 'text/html; charset=iso-8859-1');
                });
    }
}
