<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class ContactFormMail extends Mailable
{
    use Queueable, SerializesModels;
    public $details;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($details)
    {
        $this->details = $details;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('contactform')
            // ->from(auth()->user()->email,auth()->user()->name)
            ->subject('Contact Form')
            ->with([
                'name' =>$this->details['name'], 
                'phone'=>$this->details['phone'],
                'email'=>$this->details['email'],
                'service'=>$this->details['service'],
                'message'=>$this->details['message'],
            ]);
    }
}
