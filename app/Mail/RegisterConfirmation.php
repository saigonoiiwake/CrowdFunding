<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;
use App\User;

class RegisterConfirmation extends Mailable
{
    use Queueable, SerializesModels;

    
    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('emails.registered')
                    ->subject('【SeeEDU】註冊成功通知');;
        
    }
}
