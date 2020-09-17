<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class SendCode extends Mailable
{
    use Queueable, SerializesModels;

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
     * @return $this
     */
    public function build()

    {       

        
        $from_name = env('STORE_NAME', null);


        if(is_null($from_name)){
            $from_name = env('MAIL_USERNAME', null);
        }


        $email_standard = env('MAIL_STANDARD', null);
        
        if(is_null($email_standard)){
            $email_standard = env('MAIL_USERNAME', null);
        }

        dd($this->user->getCode(),$email_standard,  $from_name);

        return $this->from($email_standard,  $from_name)
            ->view('emails.sendcode' ,[
                "code" => $this->user->getCode(),
            ])->subject("Sua chave de Acesso");

    }
}
